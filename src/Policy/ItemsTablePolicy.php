<?php
namespace App\Policy;

use App\Model\Table\PagesTable;
use Authorization\IdentityInterface;

/**
 * Pages policy (for dashboard access)
 */

class ItemsTablePolicy
{
    public function scopeDashboard($user, $query)
    {
        return true;
    }

    public function canDashboard(IdentityInterface $user)
    {
        if($user['is_admin']) {
            return true;
        } else {
            return false;
        }
    }
}
