<?php
declare(strict_types = 1);

namespace BoundedContext\Property\Application\Handler;

use BoundedContext\Infrastructure\UseCase\Interfaces\CommandQueryInterface;
use BoundedContext\Infrastructure\UseCase\Interfaces\HandlerInterface;
use BoundedContext\Property\Application\Query\ListOwnerPropertiesQuery;
use BoundedContext\Property\Domain\Entity\Owner;
use BoundedContext\Property\Domain\Repository\Query\OwnerPropertyQueryRepositoryInterface;
use BoundedContext\Property\Domain\Repository\Query\OwnerQueryRepositoryInterface;

class ListOwnerPropertiesHandler implements HandlerInterface
{
    /**
     * @param OwnerPropertyQueryRepositoryInterface $queryRepository
     */
    public function __construct(
        private readonly OwnerPropertyQueryRepositoryInterface $queryRepository,
        private readonly OwnerQueryRepositoryInterface $ownerQueryRepository
        ){}

    /**
     * @param ListOwnerPropertiesQuery|CommandQueryInterface $commandQuery
     * @return Owner[]
     */
    public function handle(ListOwnerPropertiesQuery|CommandQueryInterface $commandQuery): array
    {
        $owner = $this->ownerQueryRepository->findById($commandQuery->getOwnerId());
        return $this->queryRepository->findAllByOwner($owner);
    }
}
