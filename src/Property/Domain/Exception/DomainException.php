<?php
declare(strict_types=1);

namespace BoundedContext\Property\Domain\Exception;

use DomainException as ParentClass;

class DomainException extends ParentClass
{
    /**
     * @param string $entity
     * @param int $code
     * @param array $context
     */
    public function __construct(string $message, int $code = 0, private readonly array $context = [])
    {
        parent::__construct($message, $code);
    }
}