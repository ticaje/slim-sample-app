<?php
declare(strict_types=1);

namespace Application\Infrastructure\DiKitchen\Definition\Persistence;

use Application\Infrastructure\Db\Query\QueryEntityManagerInterface;
use BoundedContext\Infrastructure\Di\Interfaces\DependencyRegisterInterface;
use BoundedContext\Infrastructure\Di\Interfaces\DICInterface as ContainerInterface;
use BoundedContext\Property\Domain\Repository\Query\OwnerPropertyQueryRepositoryInterface;
use BoundedContext\Property\Domain\Repository\Query\OwnerQueryRepositoryInterface;
use BoundedContext\Property\Infrastructure\Persistence\Repository\Query\OwnerPropertyQueryRepository;
use BoundedContext\Property\Infrastructure\Persistence\Repository\Query\OwnerQueryRepository;

class QueryRepository implements DependencyRegisterInterface
{
    /**
     *
     * @param ContainerInterface $container
     * @param array $params
     * @return void
     */
    public function register(ContainerInterface $container, array $params = []): void
    {
        $container->set(OwnerQueryRepositoryInterface::class, function () use($container){
            return new OwnerQueryRepository($container->get(QueryEntityManagerInterface::class));
        });
        $container->set(OwnerPropertyQueryRepositoryInterface::class, function () use($container){
            return new OwnerPropertyQueryRepository($container->get(QueryEntityManagerInterface::class));
        });

    }
}