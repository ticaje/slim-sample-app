<?php

declare(strict_types = 1);

use Application\Bootstrapper;
use Application\Infrastructure\DiKitchen\Implementations\Container;
use BoundedContext\Infrastructure\Di\Interfaces\DICInterface;
use Fig\Http\Message\StatusCodeInterface;

require_once __DIR__ . '/vendor/autoload.php';

const APP_ROOT = __DIR__;

try {
    /**
     * Initialize container
     * @var DICInterface $container
     */
    $container = new Container(new \DI\Container());
    /* Instantiate bootstrap with container */
    $bootstrapper = new Bootstrapper($container);
    /* Init and run application */
    $bootstrapper
        ->init()
        ->runApp();
} catch (Exception $exception) { // Log and contingence response
    header("Content-Type: application/json");
    header("HTTP/1.1 500 Internal Server Error");
    echo json_encode(
        [
            'status' => StatusCodeInterface::STATUS_INTERNAL_SERVER_ERROR,
            'message' => $exception->getMessage()
        ]);
}

