<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\inquiry;
use Authorization\IdentityInterface;

/**
 * inquiry policy
 */
class inquiryPolicy
{
    public function canIndex(IdentityInterface $user, Inquiry $inquiry)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Check if $user can add inquiry
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\inquiry $inquiry
     * @return bool
     */
    public function canAdd(IdentityInterface $user, inquiry $inquiry)
    {
        return true;
    }

    /**
     * Check if $user can edit inquiry
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\inquiry $inquiry
     * @return bool
     */
    public function canEdit(IdentityInterface $user, inquiry $inquiry)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check if $user can delete inquiry
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\inquiry $inquiry
     * @return bool
     */
    public function canDelete(IdentityInterface $user, inquiry $inquiry)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check if $user can view inquiry
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\inquiry $inquiry
     * @return bool
     */
    public function canView(IdentityInterface $user, inquiry $inquiry)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }

    public function canSendEmail(IdentityInterface $user, Inquiry $inquiry)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }

    public function canReply(IdentityInterface $user, Inquiry $inquiry)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }
}
