<?php
declare(strict_types=1);

namespace Application\Infrastructure\Db\Command;

use Doctrine\ORM\EntityManagerInterface;

interface CommandEntityManagerInterface extends EntityManagerInterface
{
}