<?php
declare(strict_types = 1);

namespace BoundedContext\Property\Domain\Entity;

use BoundedContext\Property\Domain\Vo\OwnerEmail;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use JsonSerializable;

#[Entity]
#[Table('owners')]
class Owner implements JsonSerializable
{
    #[Id, Column, GeneratedValue]
    private int|null $id = null;

    #[Column(name: 'email', type: 'string', length: 64)]
    private string|null $ownerEmail = null;

    #[Column(name: 'created_at', type: 'datetime')]
    private DateTime $createdAt;

    #[Column(name: 'seller_id')]
    private ?int $sellerId;

    #[OneToMany(mappedBy: 'owner', targetEntity: OwnerProperty::class, cascade: ['persist', 'remove'])]
    private Collection $properties;

    public function __construct()
    {
        $this->properties = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     * @return self
     */
    public function setCreatedAt(DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return int
     */
    public function getSellerId(): int
    {
        return $this->sellerId;
    }

    /**
     * @param int $sellerId
     * @return self
     */
    public function setSellerId(int $sellerId): self
    {
        $this->sellerId = $sellerId;
        return $this;
    }

    /**
     * @return Collection<OwnerProperty>
     */
    public function getProperties(): Collection
    {
        return $this->properties ?? new ArrayCollection();
    }

    /**
     * @param Collection $properties
     * @return self
     */
    public function setProperties(Collection $properties): self
    {
        $this->properties = $properties;
        return $this;
    }

    /**
     * @return OwnerEmail
     */
    public function getOwnerEmail(): OwnerEmail
    {
        return new OwnerEmail($this->ownerEmail);
    }

    /**
     * @param string|null $ownerEmail
     * @return Owner
     */
    public function setOwnerEmail(?string $ownerEmail): Owner
    {
        $this->ownerEmail = $ownerEmail;
        return $this;
    }

    /**
     * @param OwnerProperty $property
     * @return self
     */
    public function addProperty(OwnerProperty $property): self
    {
        if (!$this->properties->contains($property)) {
            $this->properties->add($property);
            $property->setOwner($this);
        }
        return $this;
    }

    /**
     * @param OwnerProperty $property
     * @return $this
     */
    public function removeProperty(OwnerProperty $property): self
    {
        if ($this->properties->contains($property)) {
            $this->properties->removeElement($property);
            if ($property->getOwner() === $this) {
                $property->setOwner(null);
            }
        }
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->getId(),
            'seller_id' => $this->getSellerId(),
            'created_at' => $this->getCreatedAt(),
            'email' => $this->getOwnerEmail(),
        ];
    }
}