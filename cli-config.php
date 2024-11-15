<?php

require 'vendor/autoload.php';

use Application\Infrastructure\Db\Query\QueryEntityManagerInterface;
use Application\Infrastructure\DiKitchen\DependencyKitchen;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

const APP_ROOT = __DIR__;

$diKitchen = new DependencyKitchen();
$container = $diKitchen->init();

$config = new PhpFile('migrations.php');

try {
    $entityManager = $container->get(QueryEntityManagerInterface::class);
    return ConsoleRunner::createHelperSet($entityManager);
} catch (\Exception $e) { // Log and contingence response
}

