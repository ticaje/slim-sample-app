<?php
declare(strict_types = 1);

namespace Application\Infrastructure\Settings\Persistence;

use Application\Infrastructure\Settings\DbConfig;
use Application\Infrastructure\Settings\DbConfigInterface;

/**
 * @property-read ?array $db
 */
class ReadDbConfig extends DbConfig implements DbConfigInterface
{}
