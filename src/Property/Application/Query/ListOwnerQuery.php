<?php
declare(strict_types = 1);

namespace BoundedContext\Property\Application\Query;

use BoundedContext\Infrastructure\UseCase\Interfaces\QueryInterface;

class ListOwnerQuery implements QueryInterface
{
    /**
     * @param int $id
     */
    public function __construct(private readonly int $id){}

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
