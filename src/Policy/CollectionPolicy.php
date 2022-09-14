<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Collection;
use Authorization\IdentityInterface;

/**
 * Collection policy
 */
class CollectionPolicy
{
    public function canIndex(IdentityInterface $user, Collection $collection)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Check if $user can add Collection
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Collection $collection
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Collection $collection)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check if $user can edit Collection
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Collection $collection
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Collection $collection)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check if $user can delete Collection
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Collection $collection
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Collection $collection)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check if $user can view Collection
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Collection $collection
     * @return bool
     */
    public function canView(IdentityInterface $user, Collection $collection)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }
}
