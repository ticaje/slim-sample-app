<?php
declare(strict_types=1);

namespace BoundedContext\Infrastructure\UseCase\Interfaces;

interface HandlerInterface
{
    /**
     * @param CommandQueryInterface $commandQuery
     * @return mixed
     */
    public function handle(CommandQueryInterface $commandQuery): mixed;
}
