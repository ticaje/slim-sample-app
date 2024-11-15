<?php
declare(strict_types=1);

namespace Application\Infrastructure\DiKitchen\Definition\Em;

use Application\Infrastructure\Settings\ConfigInterface;
use Application\Infrastructure\Settings\DbConfigInterface;
use BoundedContext\Infrastructure\Di\Interfaces\DICInterface as ContainerInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup as Setup;

trait EntityManagerTrait
{
    /**
     *
     * @param ContainerInterface $container
     * @param DbConfigInterface $dbConfig
     * @param string $type
     * @return void
     */
    public function resolve(ContainerInterface $container, DbConfigInterface $dbConfig, string $type): void
    {
        /** @var ConfigInterface $config $config */
        $config = $container->get(ConfigInterface::class);
        $entityManager = EntityManager::create(
            $dbConfig->getConfig(),
            Setup::createAttributeMetadataConfiguration($config->getMetadataDirs(), $config->isDevMode())
        );

        $container->set($type, $entityManager);
    }
}
