<?php
declare(strict_types=1);

namespace Application\Infrastructure\DiKitchen\Implementations;

use BoundedContext\Infrastructure\Di\Interfaces\DICInterface;
use DI\Container as DIContainer;

class Container implements DICInterface
{
    public function __construct(private DIContainer $composite){}

    /**
     *
     * @param string $className
     * @return void
     */
    public function get(string $className)
    {
        return $this->composite->get($className);
    }

    /**
     *
     * @param string $className
     * @return void
     */
    public function has(string $className): bool
    {
        return $this->composite->has($className);
    }

    /**
     *
     * @param string $className
     * @param mixed $instance
     * @return void
     */
    public function set(string $className, mixed $instance)
    {
        $this->composite->set($className, $instance);
    }
}
