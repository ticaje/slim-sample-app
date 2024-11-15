<?php
declare(strict_types=1);

namespace BoundedContext\Property\Domain\Vo;

use BoundedContext\Property\Domain\Exception\InvalidIsoCodeException;
use JsonSerializable;

class Currency implements JsonSerializable
{
    /**
     * 
     * @param string $isoCode
     * @throws InvalidIsoCodeException
     */
    public function __construct(private string $isoCode)
    {
        if (!preg_match('/^[A-Z]{3}$/', $isoCode)) {
            throw new InvalidIsoCodeException();
        }
    }

    /**
     * @return string
     */
    public function jsonSerialize(): array
    {
        return [
            'isoCode' => $this->isoCode,
        ];
    }

    /**
     * Summary of isoCode
     * @return string
     */
    public function isoCode(): string
    {
        return $this->isoCode;
    }
}
