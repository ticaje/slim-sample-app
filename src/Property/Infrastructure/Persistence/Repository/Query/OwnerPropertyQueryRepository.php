<?php
declare(strict_types=1);

namespace BoundedContext\Property\Infrastructure\Persistence\Repository\Query;

use BoundedContext\Property\Domain\Entity\Owner;
use BoundedContext\Property\Domain\Entity\OwnerProperty;
use BoundedContext\Property\Domain\Repository\Query\OwnerPropertyQueryRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class OwnerPropertyQueryRepository implements OwnerPropertyQueryRepositoryInterface
{
    /**
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(private readonly EntityManagerInterface $entityManager){}

    /**
     *
     * @param Owner $owner
     * @return OwnerProperty[]
     */
    public function findAllByOwner(Owner $owner): array
    {
        $repository = $this->entityManager->getRepository(OwnerProperty::class);
        return $repository->createQueryBuilder('o')
        ->where('o.owner = :owner')
        ->setParameter('owner', $owner)
        ->getQuery()
        ->getResult();
    }
}
