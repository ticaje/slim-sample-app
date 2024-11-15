<?php
declare(strict_types=1);

namespace BoundedContext\Property\Domain\Exception;

use BoundedContext\Property\Domain\Exception\DomainException;

class EntityNotFoundException extends DomainException
{
    /**
     * @param string $entity
     * @param int $code
     * @param array $context
     */
    public function __construct(string $entity = "", int $code = 0, private readonly array $context = [])
    {
        $message = "The {$entity} was not found";
        parent::__construct($message, $code);
    }
}
