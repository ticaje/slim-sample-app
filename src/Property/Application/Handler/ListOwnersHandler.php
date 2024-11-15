<?php
declare(strict_types = 1);

namespace BoundedContext\Property\Application\Handler;

use BoundedContext\Infrastructure\UseCase\Interfaces\CommandQueryInterface;
use BoundedContext\Infrastructure\UseCase\Interfaces\HandlerInterface;
use BoundedContext\Property\Application\Query\ListOwnersQuery;
use BoundedContext\Property\Domain\Entity\Owner;
use BoundedContext\Property\Domain\Repository\Query\OwnerQueryRepositoryInterface;

class ListOwnersHandler implements HandlerInterface
{
    /**
     * @param OwnerQueryRepositoryInterface $queryRepository
     */
    public function __construct(private readonly OwnerQueryRepositoryInterface $queryRepository){}

    /**
     * @param ListOwnersQuery|CommandQueryInterface $commandQuery
     * @return Owner
     */
    public function handle(ListOwnersQuery|CommandQueryInterface $commandQuery): array
    {
        return $this->queryRepository->findAll();
    }
}
