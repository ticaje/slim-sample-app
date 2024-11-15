<?php
declare(strict_types = 1);

namespace BoundedContext\Property\Application\Handler;

use BoundedContext\Infrastructure\UseCase\Interfaces\CommandQueryInterface;
use BoundedContext\Infrastructure\UseCase\Interfaces\HandlerInterface;
use BoundedContext\Property\Application\Query\ListOwnerQuery;
use BoundedContext\Property\Domain\Entity\Owner;
use BoundedContext\Property\Domain\Repository\Query\OwnerQueryRepositoryInterface;

class ListOwnerHandler implements HandlerInterface
{
    /**
     * @param OwnerQueryRepositoryInterface $queryRepository
     */
    public function __construct(private readonly OwnerQueryRepositoryInterface $queryRepository){}

    /**
     * @param ListOwnerQuery|CommandQueryInterface $commandQuery
     * @return Owner
     */
    public function handle(ListOwnerQuery|CommandQueryInterface $commandQuery): Owner
    {
        return $this->queryRepository->findById($commandQuery->getId());
    }
}
