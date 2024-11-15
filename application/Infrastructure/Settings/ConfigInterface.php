<?php
declare(strict_types = 1);

namespace Application\Infrastructure\Settings;

interface ConfigInterface
{
    /**
     * @return array|null
     */
    public function getMetadataDirs(): ?array;

    /**
     * @return bool
     */
    public function isDevMode(): bool;

    /**
     * @return string
     */
    public function getCacheDir(): string;
}
