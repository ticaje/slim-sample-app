<?php
declare(strict_types=1);

namespace Application\Infrastructure\DiKitchen;

use Application\Infrastructure\DiKitchen\Definition\Api\Controller;
use Application\Infrastructure\DiKitchen\Definition\Config\Config;
use Application\Infrastructure\DiKitchen\Definition\DbConfig\DbConfig;
use Application\Infrastructure\DiKitchen\Definition\Em\CommandEntityManager;
use Application\Infrastructure\DiKitchen\Definition\Em\QueryEntityManager;
use Application\Infrastructure\DiKitchen\Definition\Persistence\QueryRepository;
use Application\Infrastructure\DiKitchen\Definition\UseCase\Bus;
use Application\Infrastructure\DiKitchen\Definition\UseCase\Handler;

class Definitions
{
    /**
     * @return string[]
     */
    public static function fetch(): array
    {
        return [
            Config::class,
            DbConfig::class,
            QueryEntityManager::class,
            CommandEntityManager::class,
            QueryRepository::class,
            Handler::class,
            Bus::class,
            Controller::class
        ];
    }
}
