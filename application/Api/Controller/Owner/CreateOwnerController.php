<?php
declare(strict_types=1);

namespace Application\Api\Controller\Owner;

use Application\Traits\AppResponder;
use Fig\Http\Message\StatusCodeInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class CreateOwnerController
{
    use AppResponder;

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function __invoke(Request $request, Response $response): Response
    {
        return $this->respondWithOk($response, null, StatusCodeInterface::STATUS_CREATED);
    }
}
