<?php
declare(strict_types=1);

namespace BoundedContext\Infrastructure\UseCase\Interfaces;

interface BusInterface
{
    /**
     * @param CommandInterface $command
     * @return mixed
     */
    public function execute(CommandQueryInterface $command): mixed;
}
