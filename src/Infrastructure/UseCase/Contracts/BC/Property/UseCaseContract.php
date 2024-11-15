<?php
declare(strict_types=1);

namespace BoundedContext\Infrastructure\UseCase\Contracts\BC\Property;

use BoundedContext\Property\Application\Handler\ListOwnerHandler;
use BoundedContext\Property\Application\Handler\ListOwnerPropertiesHandler;
use BoundedContext\Property\Application\Handler\ListOwnersHandler;
use BoundedContext\Property\Application\Query\ListOwnerPropertiesQuery;
use BoundedContext\Property\Application\Query\ListOwnerQuery;
use BoundedContext\Property\Application\Query\ListOwnersQuery;

class UseCaseContract
{
    /**
     * @return string[]
     */
    public static function contract(): array
    {
        return [
            ListOwnerQuery::class => ListOwnerHandler::class,
            ListOwnersQuery::class => ListOwnersHandler::class,
            ListOwnerPropertiesQuery::class => ListOwnerPropertiesHandler::class
        ];
    }
}
