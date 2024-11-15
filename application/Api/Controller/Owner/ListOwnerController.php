<?php
declare(strict_types=1);

namespace Application\Api\Controller\Owner;

use Application\Infrastructure\Api\Exception\InvalidArgumentException;
use Application\Infrastructure\Api\Request\Filter\IsValidInteger;
use Application\Traits\AppResponder;
use BoundedContext\Infrastructure\UseCase\Interfaces\BusInterface;
use BoundedContext\Property\Application\Query\ListOwnerQuery;
use BoundedContext\Property\Domain\Exception\DomainException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class ListOwnerController
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
    public function execute(Request $request, Response $response): Response
    {
        try {
            $ownerId = $request->getAttribute('ownerId');
            if (IsValidInteger::isValid($ownerId)) {
                throw new InvalidArgumentException('Owner ID is not an integer value');
            }

            $owner = $this->bus->execute(new ListOwnerQuery((int)$ownerId));
            return $this->respondWithOk($response, $owner);
        } catch (DomainException $exception){
            return $this->respondWithBusinessError($response, $exception->getMessage(), $exception->getCode());
        }
    }
}
