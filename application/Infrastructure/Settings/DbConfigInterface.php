<?php
declare(strict_types = 1);

namespace Application\Infrastructure\Settings;

interface DbConfigInterface
{
    /**
     * @return array|null
     */
    public function getConfig(): ?array;
}
