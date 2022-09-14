<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property bool $is_admin
 * @property string $email
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $shipping_address
 * @property string|null $phone_number
 * @property string|null $notes
 *
 * @property \App\Model\Entity\Order[] $orders
 */
class User extends Entity
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
        'is_admin' => true,
        'email' => true,
        'password' => true,
        'first_name' => true,
        'last_name' => true,
        'shipping_address' => true,
        'phone_number' => true,
        'notes' => true,
        'orders' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];
}
