<?php
declare(strict_types=1);

namespace BoundedContext\Property\Domain\Vo;

use BoundedContext\Property\Domain\Exception\InvalidOwner;
use JsonSerializable;

final class OwnerEmail implements JsonSerializable
{
    /**
     * @param string $email
     */
    public function __construct(private string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) !== false){
            throw InvalidOwner::withInvalidEmail($this);
        }
        $this->email = $email;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'email' => $this->email,
        ];

    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->email;
    }
}
