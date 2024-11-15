<?php
declare(strict_types=1);

namespace BoundedContext\Infrastructure\Di\Interfaces;

use Psr\Container\ContainerInterface; // The friction with external agency is minimal

interface DICInterface extends ContainerInterface
{
    /**
     *
     * @param string $className
     * @param mixed $instance
     * @return void
     */
    public function set(string $className, mixed $instance);
}