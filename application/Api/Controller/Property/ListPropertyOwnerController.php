<?php
declare(strict_types=1);

namespace Application\Api\Controller\Property;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class ListPropertyOwnerController
{
    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function __invoke(Request $request, Response $response): Response
    {
        return $response->withStatus(201);
    }
}