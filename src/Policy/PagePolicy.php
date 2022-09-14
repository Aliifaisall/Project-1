<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Page;
use Authorization\IdentityInterface;

/**
 * Page policy
 */
class PagePolicy
{
    /**
     * Check if $user can add Page
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Page $page
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Page $page)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check if $user can edit Page
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Page $page
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Page $page)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check if $user can delete Page
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Page $page
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Page $page)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check if $user can view Page
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Page $page
     * @return bool
     */
    public function canView(IdentityInterface $user, Page $page)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }

    protected function isAuthor(IdentityInterface $user, Page $page)
    {
        return $page->user_id === $user->getIdentifier();
    }
}
