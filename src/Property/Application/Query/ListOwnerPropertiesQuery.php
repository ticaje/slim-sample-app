<?php
declare(strict_types = 1);

namespace BoundedContext\Property\Application\Query;

use BoundedContext\Infrastructure\UseCase\Interfaces\QueryInterface;

class ListOwnerPropertiesQuery implements QueryInterface
{
    /**
     * @param int $ownerId
     */
    public function __construct(private readonly int $ownerId){}

    /**
     * @return int
     */
    public function getOwnerId(): int
    {
        return $this->ownerId;
    }

}
