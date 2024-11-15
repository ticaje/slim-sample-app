<?php
declare(strict_types=1);

namespace Application\Infrastructure\DiKitchen\Definition\UseCase;

use BoundedContext\Infrastructure\Di\Interfaces\DependencyRegisterInterface;
use BoundedContext\Infrastructure\Di\Interfaces\DICInterface as ContainerInterface;
use BoundedContext\Property\Application\Handler\ListOwnerHandler;
use BoundedContext\Property\Application\Handler\ListOwnerPropertiesHandler;
use BoundedContext\Property\Domain\Repository\Query\OwnerPropertyQueryRepositoryInterface;
use BoundedContext\Property\Domain\Repository\Query\OwnerQueryRepositoryInterface;

class Handler implements DependencyRegisterInterface
{

    /**
     *
     * @param ContainerInterface $container
     * @return void
     */
    public function register(ContainerInterface $container): void
    {
        $ownerRepository = $container->get(OwnerQueryRepositoryInterface::class);
        $container->set(ListOwnerHandler::class, function () use ($ownerRepository){
            return new ListOwnerHandler($ownerRepository);
        });

        $ownerPropertiesRepository = $container->get(OwnerPropertyQueryRepositoryInterface::class);
        $container->set(ListOwnerPropertiesHandler::class, function () use ($ownerPropertiesRepository, $ownerRepository){
            return new ListOwnerPropertiesHandler($ownerPropertiesRepository, $ownerRepository);
        });
    }
}
