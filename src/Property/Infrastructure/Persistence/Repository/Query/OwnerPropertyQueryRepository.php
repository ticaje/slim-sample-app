<?php
declare(strict_types=1);

namespace BoundedContext\Property\Infrastructure\Persistence\Repository\Query;

use BoundedContext\Property\Domain\Entity\Owner;
use BoundedContext\Property\Domain\Entity\OwnerProperty;
use BoundedContext\Property\Domain\Repository\Query\OwnerPropertyQueryRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

class OwnerPropertyQueryRepository extends EntityRepository implements OwnerPropertyQueryRepositoryInterface
{
    /**
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(private readonly EntityManagerInterface $entityManager){
        parent::__construct($entityManager, new ClassMetadata(OwnerProperty::class));
    }

    /**
     *
     * @param Owner $owner
     * @return OwnerProperty[]
     */
    public function findAllByOwner(Owner $owner): array
    {
        return $this->createQueryBuilder('o')
        ->where('o.owner = :owner')
        ->setParameter('owner', $owner)
        ->getQuery()
        ->getResult();
    }
}
