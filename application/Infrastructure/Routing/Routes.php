<?php
declare(strict_types=1);

namespace Application\Infrastructure\Routing;

use Application\Api\Controller\Owner\CreateOwnerController;
use Application\Api\Controller\Owner\ListOwnerController;
use Application\Api\Controller\Owner\ListOwnerPropertyController;
use Application\Api\Controller\Owner\ListOwnersController;
use Application\Api\Controller\Property\CreatePropertyController;
use Application\Api\Controller\Property\ListPropertyController;
use Application\Api\Controller\Property\ListPropertyOwnerController;
use Application\Api\Controller\WelcomeController;
use Slim\App;

class Routes
{
    const DEFAULT_ENTRY_POINT_METHOD = 'execute';

    /**
     * @param App $app
     * @return void
     */
    public static function register(App $app): void
    {
        self::registerWelcome($app);
        self::registerOwner($app);
        self::registerProperty($app);
    }

    /**
     * @param App $app
     * @return void
     */
    private static function registerWelcome(App $app): void
    {
        $app->get('/', [WelcomeController::class, '__invoke']);
        $app->get('/v1/welcome', [WelcomeController::class, '__invoke']);
    }

    /**
     * @param App $app
     * @return void
     */
    private static function registerOwner(App $app): void
    {
        $app->post('/v1/owners', [CreateOwnerController::class, '__invoke']);
        $app->get('/v1/owners', [ListOwnersController::class, '__invoke']);
        $app->get('/v1/owners/{ownerId}', [ListOwnerController::class, self::DEFAULT_ENTRY_POINT_METHOD]);
        $app->get('/v1/owner/properties/{ownerId}', [ListOwnerPropertyController::class, '__invoke']);
    }

    /**
     * @param App $app
     * @return void
     */
    private static function registerProperty(App $app): void
    {
        $app->post('/v1/properties', [CreatePropertyController::class, '__invoke']);
        $app->get('/v1/properties/{propertyId}', [ListPropertyController::class, '__invoke']);
        $app->get('/v1/properties/owner/{propertyId}', [ListPropertyOwnerController::class, '__invoke']);
    }
}
