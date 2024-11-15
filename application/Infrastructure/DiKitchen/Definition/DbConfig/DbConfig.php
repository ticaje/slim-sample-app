<?php
declare(strict_types=1);

namespace Application\Infrastructure\DiKitchen\Definition\DbConfig;

use Application\Infrastructure\Settings\Persistence\ReadDbConfig;
use Application\Infrastructure\Settings\Persistence\WriteDbConfig;
use BoundedContext\Infrastructure\Di\Interfaces\DependencyRegisterInterface;
use BoundedContext\Infrastructure\Di\Interfaces\DICInterface as ContainerInterface;
use Dotenv\Dotenv;

class DbConfig implements DependencyRegisterInterface
{
    /**
     * @param ContainerInterface $container
     * @return void
     */
    public function register(ContainerInterface $container): void
    {
        $dotenvRead = Dotenv::createMutable(APP_ROOT . "/environment/read/");
        $dotenvWrite = Dotenv::createMutable(APP_ROOT . "/environment/write/");
        $container->set(ReadDbConfig::class, function () use ($dotenvRead){
            return new ReadDbConfig($dotenvRead->load());
        });
        $container->set(WriteDbConfig::class, function () use ($dotenvWrite){
            return new WriteDbConfig($dotenvWrite->load());
        });
    }
}