<?php
declare(strict_types = 1);

namespace Application\Traits;

use Application\Infrastructure\Settings\ConfigInterface;
use BoundedContext\Infrastructure\Di\Interfaces\DICInterface;
use Slim\App;
use Slim\Factory\AppFactory;

trait AppState
{
    /**
     * Summary of getConfig
     * @return ConfigInterface
     */
    private function getConfig(): ConfigInterface
    {
        /** @var DICInterface $this->container */
        return $this->container->get(ConfigInterface::class);
    }

    /**
     * @return App
     * Singleton pattern compliance
     */
    private function getApp(): App
    {
        if (null == $this->app){
            $this->app = AppFactory::create(null, $this->container);
        }
        return $this->app;
    }
}
