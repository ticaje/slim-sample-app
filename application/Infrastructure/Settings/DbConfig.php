<?php
declare(strict_types = 1);

namespace Application\Infrastructure\Settings;

/**
 * @property-read ?array $db
 */
class DbConfig implements DbConfigInterface
{
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
            'db'      => [
                'host'     => $env['DB_HOST'],
                'user'     => $env['DB_USER'],
                'password' => $env['DB_PASS'],
                'dbname'   => $env['DB_DATABASE'],
                'driver'   => $env['DB_DRIVER'] ?? 'pdo_mysql',
                'port'     => $env['DB_PORT'],
            ],
        ];
    }

    /**
     * @return array|null
     */
    public function getConfig(): ?array
    {
        return $this->config['db'] ?? null;
    }
}
