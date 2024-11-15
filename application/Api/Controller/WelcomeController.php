<?php
declare(strict_types=1);

namespace Application\Api\Controller;

use Application\Traits\AppResponder;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class WelcomeController
{
    use AppResponder;

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function __invoke(Request $request, Response $response): Response
    {
        return $this->respondWithOk($response, ['message' => 'Welcome to our API']);
    }
}
