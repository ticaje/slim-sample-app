<?php
declare(strict_types = 1);

namespace Application\Traits;

use Fig\Http\Message\StatusCodeInterface;
use Psr\Http\Message\ResponseInterface as Response;

trait AppResponder
{
    private function respondWithException(Response $response, string $message, int $code = StatusCodeInterface::STATUS_BAD_GATEWAY): Response
    {
        return $this->respondWithBusinessError($response, $message, $code);
    }

    private function respondWithBusinessError(Response $response, string $message, int $code = StatusCodeInterface::STATUS_BAD_GATEWAY): Response
    {
        $response->getBody()->write(json_encode(['status' => $code, 'message' => $message]));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($code);
    }

    private function respondWithOk(Response $response, mixed $content = null, int $status = StatusCodeInterface::STATUS_OK): Response
    {
        $response->getBody()->write(json_encode(['status' => $status, 'data' => $content]));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($status);
    }

}

