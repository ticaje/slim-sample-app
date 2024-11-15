<?php
declare(strict_types=1);

namespace BoundedContext\Property\Domain\Vo;

use JsonSerializable;

final class Price implements JsonSerializable
{
    /**
     * 
     * 
     * @param float $amount
     * @param Currency $currency
     */
    public function __construct(private float $amount, private Currency $currency){}

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'amount' => number_format($this->amount, 2),
            'currency' => $this->currency->jsonSerialize()
        ];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->jsonSerialize();
    }
}
