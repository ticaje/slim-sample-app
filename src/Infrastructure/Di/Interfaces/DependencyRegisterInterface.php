<?php
declare(strict_types=1);

namespace BoundedContext\Infrastructure\Di\Interfaces;

use BoundedContext\Infrastructure\Di\Interfaces\DICInterface as ContainerInterface;

interface DependencyRegisterInterface
{
    /**
     * @param ContainerInterface $container
     * @return void
     */
    public function register(ContainerInterface $container): void;
}