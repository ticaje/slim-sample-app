<?php
declare(strict_types=1);

namespace Application\Api\Controller\Owner;

use Application\Traits\AppResponder;
use BoundedContext\Infrastructure\UseCase\Interfaces\BusInterface;
use BoundedContext\Property\Application\Query\ListOwnersQuery;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class ListOwnersController
{
    use AppResponder;
    
    /**
     * @param BusInterface $bus
     */
    public function __construct(private readonly BusInterface $bus){}

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function __invoke(Request $request, Response $response): Response
    {
        $owners = $this->bus->execute(new ListOwnersQuery());
        return $this->respondWithOk($response, $owners);
    }
}