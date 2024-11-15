<?php
declare(strict_types=1);

namespace BoundedContext\Property\Domain\Repository\Query;

use BoundedContext\Property\Domain\Entity\Owner;
use BoundedContext\Property\Domain\Vo\OwnerEmail;

interface OwnerQueryRepositoryInterface
{
    /**
     * @param OwnerEmail $ownerEmail
     * @return Owner
     */
    public function findByEmail(OwnerEmail $ownerEmail): Owner;

    /**
     * @param int $ownerId
     * @return Owner
     */
    public function findById(int $ownerId): Owner;

    /**
     * @param int $ownerId
     * @return Owner[]
     */
    public function findAll(): array;

}
