<?php
declare(strict_types=1);

namespace BoundedContext\Property\Infrastructure\Persistence\Repository\Query;

use BoundedContext\Property\Domain\Entity\Owner;
use BoundedContext\Property\Domain\Exception\EntityNotFoundException;
use BoundedContext\Property\Domain\Repository\Query\OwnerQueryRepositoryInterface;
use BoundedContext\Property\Domain\Vo\OwnerEmail;
use Doctrine\ORM\EntityManagerInterface;
use Fig\Http\Message\StatusCodeInterface;

class OwnerQueryRepository implements OwnerQueryRepositoryInterface
{
    public function __construct(private readonly EntityManagerInterface $entityManager){}

    /**
     * @param OwnerEmail $ownerEmail
     * @return Owner
     */
    public function findByEmail(OwnerEmail $ownerEmail): Owner
    {
        return $this->entityManager->getRepository(Owner::class)->findOneBy(['email' => $ownerEmail]);
    }

    /**
     * @param int $ownerId
     * @return Owner
     */
    public function findById(int $ownerId): Owner
    {
        $owner = $this->entityManager->getRepository(Owner::class)->find($ownerId);
        if (!$owner) {
            throw new EntityNotFoundException("Owner" , StatusCodeInterface::STATUS_NOT_FOUND);
        }
        return $owner;
    }

    public function findAll(): array
    {
        $owners = $this->entityManager->getRepository(Owner::class)->findAll();
        return $owners;
    }
}
