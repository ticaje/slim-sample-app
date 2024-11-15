<?php
declare(strict_types=1);

namespace BoundedContext\Property\Domain\Exception;

use BoundedContext\Property\Domain\Vo\OwnerEmail;
use DomainException;

class InvalidOwner extends DomainException
{
    private const MESSAGE = 'Error creating Owner';

    /**
     * @param string $message
     * @param int $code
     * @param array $context
     */
    public function __construct(string $message = "", int $code = 0, private readonly array $context = [])
    {
        parent::__construct($message, $code);
    }

    /**
     * @param OwnerEmail $email
     * @return self
     */
    public static function withInvalidEmail(OwnerEmail $email): self
    {
        return new self(self::MESSAGE, 0, ['owner_email' => $email->jsonSerialize()]);
    }
}