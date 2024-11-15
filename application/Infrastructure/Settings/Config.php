<?php
declare(strict_types = 1);

namespace Application\Infrastructure\Settings;

/**
 * @property-read ?array $db
 */
class Config implements ConfigInterface
{
    const APP_ROOT = APP_ROOT . '/';

    /**
     * @var array
     */
    protected array $config = [];

    /**
     * @param array $env
     */
    public function __construct(array $env)
    {
        $this->config = [
            'dev_mode' => (bool)$env['DEV_MODE'] ?? false,
        ];
    }

    /**
     * @return string[]|null
     */
    public function getMetadataDirs(): ?array
    {
        return [
            self::APP_ROOT . 'src/Property/Domain',
        ];
    }

    /**
     * @return bool
     */
    public function isDevMode(): bool
    {
        return $this->config['dev_mode'];
    }

    /**
     * @return string
     */
    public function getCacheDir(): string
    {
        return self::APP_ROOT . '/var/cache/persistence';
    }
}
