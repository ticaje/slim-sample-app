<?php
declare(strict_types = 1);

namespace Application\Infrastructure\Api\Request\Filter;

class IsValidInteger
{
    public static function isValid(mixed $value) : bool
    {
        return filter_var($value, FILTER_VALIDATE_INT) === false || !(int)$value;
    }
}

