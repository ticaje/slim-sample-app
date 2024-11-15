<?php
declare(strict_types=1);

namespace Application\Infrastructure\DiKitchen\Definition\Em;

use Application\Infrastructure\Db\Command\CommandEntityManagerInterface;
use Application\Infrastructure\Settings\ConfigInterface;
use Application\Infrastructure\Settings\Persistence\WriteDbConfig;
use BoundedContext\Infrastructure\Di\Interfaces\DependencyRegisterInterface;
use BoundedContext\Infrastructure\Di\Interfaces\DICInterface as ContainerInterface;

class CommandEntityManager implements DependencyRegisterInterface
{
    use EntityManagerTrait;

    /**
     *
     * @param ContainerInterface $container
     * @return void
     */
    public function register(ContainerInterface $container): void
    {
        /** @var ConfigInterface $config $config */
        $dbConfig = $container->get(WriteDbConfig::class);
        $this->resolve($container, $dbConfig, CommandEntityManagerInterface::class);
    }
}