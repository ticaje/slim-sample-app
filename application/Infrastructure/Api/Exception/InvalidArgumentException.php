<?php
declare(strict_types=1);

namespace Application\Infrastructure\Api\Exception;

use BoundedContext\Property\Domain\Exception\DomainException;
use Fig\Http\Message\StatusCodeInterface;

class InvalidArgumentException extends DomainException
{
    /**
     * @param string $entity
     * @param int $code
     * @param array $context
     */
    public function __construct(string $message, private readonly array $context = [])
    {
        parent::__construct($message, StatusCodeInterface::STATUS_BAD_REQUEST);
    }
}