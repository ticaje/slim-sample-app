<?php
declare(strict_types=1);

namespace BoundedContext\Infrastructure\Middleware;

final class HandlerResolver
{
    use GuardTrait;

    /**
     * @param array $handlers
     */
    public function __construct(private array $handlers = []){}

    /**
     * @return array
     */
    public function getHandlers(): array
    {
        return $this->handlers;
    }

    /**
     * @param string $commandClass
     * @param string $handlerClass
     * @return void
     */
    public function resolve(string $commandClass, string $handlerClass): void
    {
        $this->guard($commandClass, $handlerClass);

        $this->handlers[$commandClass] = $handlerClass;
    }
}