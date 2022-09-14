<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Transaction;
use Authorization\IdentityInterface;

/**
 * Transaction policy
 */
class TransactionPolicy
{
    public function canIndex(IdentityInterface $user, Transaction $transaction)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Check if $user can add Transaction
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Transaction $transaction
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Transaction $transaction)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check if $user can edit Transaction
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Transaction $transaction
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Transaction $transaction)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check if $user can delete Transaction
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Transaction $transaction
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Transaction $transaction)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check if $user can view Transaction
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Transaction $transaction
     * @return bool
     */
    public function canView(IdentityInterface $user, Transaction $transaction)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }

    public function canInvoice(IdentityInterface $user, Transaction $transaction)
    {
        return true;
    }

    public function canSendInvoice(IdentityInterface $user, Transaction $transaction)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }
    public function canMarkComplete(IdentityInterface $user, Transaction $transaction)
    {
        return true;
    }
}
