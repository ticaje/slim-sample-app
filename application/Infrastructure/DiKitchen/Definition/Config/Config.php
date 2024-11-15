<?php
declare(strict_types=1);

namespace Application\Infrastructure\DiKitchen\Definition\Config;

use Application\Infrastructure\Settings\Config as SettingConfig;
use Application\Infrastructure\Settings\ConfigInterface;
use BoundedContext\Infrastructure\Di\Interfaces\DependencyRegisterInterface;
use BoundedContext\Infrastructure\Di\Interfaces\DICInterface as ContainerInterface;
use Dotenv\Dotenv;

class Config implements DependencyRegisterInterface
{
    /**
     * @param ContainerInterface $container
     * @return void
     */
    public function register(ContainerInterface $container): void
    {
        $dotenvConfig = Dotenv::createMutable(APP_ROOT . "/environment/");
        $container->set(ConfigInterface::class, function () use ($dotenvConfig){
            return new SettingConfig($dotenvConfig->load());
        });
    }
}