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
            $this->container = $container ?? new DIContainerWrapper();
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

class DIContainerWrapper implements ContainerInterface
{
    private Container $container;

    public function __construct()
    {
        $this->container = new Container();
    }

    // Implement required methods from DICInterface
    public function get($id)
    {
        return $this->container->get($id);
    }

    public function has($id)
    {
        return $this->container->has($id);
    }

    public function set($id, $value)
    {
        $this->container->set($id, $value);
    }

    // You can add any other necessary methods from ContainerInterface or DI\Container if needed
}
