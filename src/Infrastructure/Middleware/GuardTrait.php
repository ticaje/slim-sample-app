<?php
declare(strict_types=1);

namespace BoundedContext\Infrastructure\Middleware;

use BoundedContext\Infrastructure\Di\Registerer\UseCase\Exception\CommandAlreadyExistsException;
use BoundedContext\Infrastructure\Di\Registerer\UseCase\Exception\RegisteringException;

trait GuardTrait
{
    private function guard(string $commandClass, string $handlerClass): void
    {
        if (!class_exists($commandClass)) {
            throw RegisteringException::dueCommandNotExist($commandClass);
        }

        if (!class_exists($handlerClass)) {
            throw RegisteringException::dueCommandHandlerNotExist($commandClass, $handlerClass);
        }

        if (array_key_exists($commandClass, $this->handlers)) {
            throw CommandAlreadyExistsException::withCommandClass($commandClass);
        }
    }
}