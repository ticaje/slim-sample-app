<?php
declare(strict_types=1);

namespace Application\Infrastructure\DiKitchen\Definition\Api;

use Application\Api\Controller\Owner\ListOwnerController;
use Application\Api\Controller\Owner\ListOwnersController;
use BoundedContext\Infrastructure\Di\Interfaces\DependencyRegisterInterface;
use BoundedContext\Infrastructure\Di\Interfaces\DICInterface as ContainerInterface;
use BoundedContext\Infrastructure\UseCase\Interfaces\BusInterface;

class Controller implements DependencyRegisterInterface
{
    /**
     *
     * @param ContainerInterface $container
     * @return void
     */
    public function register(ContainerInterface $container): void
    {
        $container->set(ListOwnerController::class, function () use ($container){
            return new ListOwnerController($container->get(BusInterface::class));
        });

        $container->set(ListOwnersController::class, function () use ($container){
            return new ListOwnersController($container->get(BusInterface::class));
        });

    }
}