<?php
declare(strict_types=1);

namespace BoundedContext\Infrastructure\UseCase\Bus;

use BoundedContext\Infrastructure\UseCase\Interfaces\BusInterface;
use BoundedContext\Infrastructure\UseCase\Interfaces\CommandInterface;
use BoundedContext\Infrastructure\UseCase\Interfaces\CommandQueryInterface;
use League\Tactician\CommandBus as Bus;

final class TacticianCommandBus implements BusInterface
{
    /**
     * @param Bus $commandBus
     */
    public function __construct(private readonly Bus $commandBus){}

    /**
     * @param CommandInterface $command
     * @return mixed
     */
    public function execute(CommandQueryInterface $command): mixed
    {
        return $this->commandBus->handle($command);
    }
}
