<?php
declare(strict_types=1);

namespace Application\Infrastructure\DiKitchen\Definition\UseCase;

use BoundedContext\Infrastructure\Di\Interfaces\DependencyRegisterInterface;
use BoundedContext\Infrastructure\Di\Interfaces\DICInterface as ContainerInterface;
use BoundedContext\Infrastructure\Middleware\BusResolver;
use BoundedContext\Infrastructure\Middleware\HandlerResolver;
use BoundedContext\Infrastructure\UseCase\Contracts\BC\Property\UseCaseContract;
use BoundedContext\Infrastructure\UseCase\Interfaces\BusInterface;

class Bus implements DependencyRegisterInterface
{
    /**
     *
     * @param ContainerInterface $container
     * @return void
     */
    public function register(ContainerInterface $container): void
    {
        $this->registerHandlers($container);
        $this->registerBus($container);
    }

    private function registerHandlers(ContainerInterface $container) : void
    {
        $commandHandlers = UseCaseContract::contract();
        /** @var HandlerResolver $resolver */
        $resolver  = $container->has(HandlerResolver::class) 
            ? $container->get(HandlerResolver::class)
            : $container->set(HandlerResolver::class, new HandlerResolver($commandHandlers));

        foreach ($commandHandlers as $commandClass => $handlerClass) {
            $resolver->resolve($commandClass, $handlerClass);
        }
    }

    private function registerBus(ContainerInterface $container) : void
    {
        if ($container->has(BusInterface::class)) {
            $container->get(BusInterface::class);
        }

        $bus = BusResolver::resolve($container);
        $container->set(BusInterface::class, $bus);
    }
}