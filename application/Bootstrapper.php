<?php
declare(strict_types = 1);

namespace Application;

use Application\Infrastructure\DiKitchen\DependencyKitchen;
use Application\Infrastructure\Routing\Routes;
use Application\Traits\AppResponder;
use Application\Traits\AppState;
use BoundedContext\Infrastructure\Di\Interfaces\DICInterface as ContainerInterface;
use Fig\Http\Message\StatusCodeInterface;
use Slim\App;

class Bootstrapper
{
    use AppState;
    use AppResponder;

    /** @var App|null $app */
    private ?App $app = null;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(private readonly ContainerInterface $container){}

    /**
     * @return $this
     */
    public function init(): self
    {
        $diKitchen = new DependencyKitchen();
        $diKitchen->init($this->container);
        return $this;
    }

    /**
     *
     * @return void
     */
    public function runApp(): void
    {
        $app = $this->getApp();
        $this->registerMiddlewares($app);
        $this->registerRoutes($app);
        $this->registerErrorHandler($app);
        $app->run();
    }

    /**
     * @param App $app
     * @return void
     */
    private function registerRoutes(App $app): void
    {
        Routes::register($app);
    }

    /**
     *
     * @param App $app
     * @return void
     */
    private function registerMiddlewares(App $app): void
    {
        $app->addBodyParsingMiddleware();        
        // Set custom handler
        $app->addRoutingMiddleware();
    }
   
    /**
     *
     * @param App $app
     * @return void
     */
    private function registerErrorHandler(App $app)
    {
        $mySelf  = $this;
        $errorMiddleware = $app->addErrorMiddleware($this->getConfig()->isDevMode(), true, true);

        $routeNotFoundHandler = function () use ($app, $mySelf){
            $response = $app->getResponseFactory()->createResponse();
            return $mySelf->respondWithException($response, 'The requested resource could not be found.', StatusCodeInterface::STATUS_NOT_FOUND);
        };
        $errorMiddleware->setErrorHandler(\Slim\Exception\HttpNotFoundException::class, $routeNotFoundHandler);

        $unknownErrorHandler = function () use ($app, $mySelf) {
            $response = $app->getResponseFactory()->createResponse();
            return $mySelf->respondWithException($response, 'Internal Service Error', StatusCodeInterface::STATUS_INTERNAL_SERVER_ERROR);
        };
        $errorMiddleware->setErrorHandler(\Exception::class, $unknownErrorHandler);
    }
}
