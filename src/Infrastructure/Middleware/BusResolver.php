<?php
declare(strict_types=1);

namespace BoundedContext\Infrastructure\Middleware;

use BoundedContext\Infrastructure\Di\Interfaces\DICInterface as ContainerInterface;
use BoundedContext\Infrastructure\Middleware\HandlerResolver;
use BoundedContext\Infrastructure\UseCase\Bus\TacticianCommandBus;
use BoundedContext\Infrastructure\UseCase\Interfaces\BusInterface;
use League\Tactician\CommandBus;
use League\Tactician\Container\ContainerLocator;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;

final class BusResolver
{
    /**
     * Summary of resolve
     * @param ContainerInterface $container
     * @return BusInterface
     */
    public static function resolve(ContainerInterface $container): BusInterface
    {
        $handlers = self::resolveHandlers($container);
        $handlerMiddleware = new CommandHandlerMiddleware(
            new ClassNameExtractor(),
            new ContainerLocator($container, $handlers),
            new HandleInflector()
        );

        $bus = new TacticianCommandBus(new CommandBus([$handlerMiddleware]));
        return $bus;
    }

    /**
     *
     * @param ContainerInterface $container
     * @return array
     */
    private static function resolveHandlers(ContainerInterface $container): array
    {
        /** @var HandlerResolver $resolver */
        $resolver = $container->get(HandlerResolver::class);
        return $resolver->getHandlers();
    }
}