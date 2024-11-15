<?php

declare(strict_types = 1);

namespace BoundedContext\Property\Domain\Entity;

use BoundedContext\Property\Domain\Vo\Currency;
use BoundedContext\Property\Domain\Vo\Price;
use Datetime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use JsonSerializable;

;

#[Entity]
#[Table('owner_properties')]
class OwnerProperty implements JsonSerializable
{
    #[Id]
    #[Column, GeneratedValue]
    private int $id;

    #[Column(name: 'created_at', type: 'datetime')]
    private DateTime $createdAt;

    #[Column(name: 'acquisition_date', type: 'datetime')]
    private DateTime $acquisitionDate;

    #[Column(name: 'owner_id')]
    private int $ownerId;

    #[Column(name: 'acquisition_price', type: Types::DECIMAL, precision: 10, scale: 2)]
    private float $acquisitionPrice;

    #[Column(name: 'currency', type: Types::STRING, length: 3)]
    private string $currency;

    #[ManyToOne(targetEntity: Owner::class, inversedBy: 'properties')]
    private ?Owner $owner = null;

    /**
     * @return Datetime
     */
    public function getAcquisitionDate(): Datetime
    {
        return $this->acquisitionDate;
    }

    /**
     * @param Datetime $acquisitionDate
     * @return self
     */
    public function setAcquisitionDate(Datetime $acquisitionDate): self
    {
        $this->acquisitionDate = $acquisitionDate;
        return $this;
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
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
    public function getOwnerId(): int
    {
        return $this->ownerId;
    }

    /**
     * @param string $currency
     * @return self
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     *
     * @return Currency
     */
    public function getCurrency() : Currency
    {
        return new Currency($this->currency);
    }

    /**
     * @param int $ownerId
     * @return self
     */
    public function setOwnerId(int $ownerId): self
    {
        $this->ownerId = $ownerId;
        return $this;
    }

    /**
     * @return Price
     */
    public function getAcquisitionPrice(): Price
    {
        return new Price($this->acquisitionPrice, $this->getCurrency());
    }

    /**
     * @param float $acquisitionPrice
     * @return self
     */
    public function setAcquisitionPrice(float $acquisitionPrice): self
    {
        $this->acquisitionPrice = $acquisitionPrice;
        return $this;
    }

    /**
     * @return ?Owner
     */
    public function getOwner(): ?Owner
    {
        return $this->owner;
    }

    /**
     * @param ?Owner $owner
     * @return self
     */
    public function setOwner(?Owner $owner): self
    {
        $this->owner = $owner;
        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->getId(),
            'owner' => $this->getOwner(),
            'created_at' => $this->getCreatedAt(),
            'acquisition_price' => $this->getAcquisitionPrice(),
            'acquisition_date' => $this->getAcquisitionDate()
        ];
    }
}