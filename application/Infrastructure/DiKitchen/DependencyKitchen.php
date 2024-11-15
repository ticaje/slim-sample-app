<?php
declare(strict_types=1);

namespace Application\Infrastructure\DiKitchen;

use BoundedContext\Infrastructure\Di\Interfaces\DependencyApiInterface;
use BoundedContext\Infrastructure\Di\Interfaces\DependencyRegisterInterface;
use BoundedContext\Infrastructure\Di\Interfaces\DICInterface as ContainerInterface;
use DI\Container;
use DI\DependencyException;
use DI\NotFoundException;
use Doctrine\ORM\Exception\ORMException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class DependencyKitchen implements DependencyApiInterface
{
    /** @var ContainerInterface $container */
    private ContainerInterface $container;

    /**
     * @param ContainerInterface|null $container
     * @return ContainerInterface|null
     */
    public final function init(?ContainerInterface $container = null): ?ContainerInterface
    {
        try {
            $this->container = $container ?? new Container();
            $this->registerDependencies();
            return $this->container;
        } catch (DependencyException|NotFoundException|ORMException|NotFoundExceptionInterface|ContainerExceptionInterface $exception) {
            // Log Properly ans pass off the exception to executers
            throw new \Exception('Internal Server Error');
        }
    }

    /**
     * @return void
     */
    private function registerDependencies(): void
    {
        /** @var DependencyRegisterInterface $registerer */
        foreach (Definitions::fetch() as $registererClass){
            $registerer = new $registererClass();
            $registerer->register($this->container);
        }
    }
}
