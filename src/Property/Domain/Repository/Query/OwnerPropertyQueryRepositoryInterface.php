<?php
declare(strict_types=1);

namespace BoundedContext\Property\Domain\Repository\Query;

use BoundedContext\Property\Domain\Entity\Owner;
use BoundedContext\Property\Domain\Entity\OwnerProperty;

interface OwnerPropertyQueryRepositoryInterface
{
    /**
     * @param Owner $owner
     * @return OwnerProperty[]
     */
    public function findAllByOwner(Owner $owner): array;
}
