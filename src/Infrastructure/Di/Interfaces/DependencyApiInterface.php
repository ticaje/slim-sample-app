<?php
declare(strict_types=1);

namespace BoundedContext\Infrastructure\Di\Interfaces;

use BoundedContext\Infrastructure\Di\Interfaces\DICInterface as ContainerInterface;

interface DependencyApiInterface
{
    /**
     * @param ContainerInterface|null $container
     * @return ContainerInterface|null
     */
    public function init(?ContainerInterface $container = null): ?ContainerInterface;
}