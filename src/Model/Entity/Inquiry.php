<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Inquiry Entity
 *
 * @property int $id
 * @property string $email
 * @property string|null $phone_number
 * @property string $full_name
 * @property \Cake\I18n\FrozenTime $date_created
 * @property string $message
 * @property bool|null $reply_sent
 */
class Inquiry extends Entity
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
        'email' => true,
        'phone_number' => true,
        'full_name' => true,
        'date_created' => true,
        'message' => true,
        'reply_sent' => true,
    ];
}
