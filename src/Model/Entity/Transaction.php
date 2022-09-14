<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $item_id
 * @property string $paid_amount
 * @property string $status
 * @property \Cake\I18n\FrozenTime $date_created
 * @property string|null $notes
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Item $item
 */
class Transaction extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'user_id' => true,
        'item_id' => true,
        'paid_amount' => true,
        'status' => true,
        'date_created' => true,
        'notes' => true,
        'user' => true,
        'item' => true,
    ];
}
