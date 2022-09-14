<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Item;
use Authorization\IdentityInterface;

/**
 * Item policy
 */
class ItemPolicy
{
    public function canIndex(IdentityInterface $user, Item $item)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check if $user can add Item
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Item $item
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Item $item)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check if $user can edit Item
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Item $item
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Item $item)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check if $user can delete Item
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Item $item
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Item $item)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check if $user can view Item
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Item $item
     * @return bool
     */
    public function canView(IdentityInterface $user, Item $item)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }
}
