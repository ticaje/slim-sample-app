<?php
declare(strict_types=1);

namespace BoundedContext\Property\Domain\Exception;

use Fig\Http\Message\StatusCodeInterface;

class InvalidIsoCodeException extends DomainException
{
    /**
     * @param int $code
     * @param array $context
     */
    public function __construct(private readonly array $context = [])
    {
        $message = "The ISO code is invalid";
        parent::__construct($message, StatusCodeInterface::STATUS_BAD_REQUEST);
    }
}