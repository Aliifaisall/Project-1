<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Cake\I18n\FrozenTime|null $date_added
 * @property \Cake\I18n\FrozenTime|null $date_of_creation
 * @property int|null $size_in_cm_squared
 * @property bool $for_sale
 * @property string|null $price
 *
 * @property \App\Model\Entity\Transaction[] $transactions
 * @property \App\Model\Entity\Collection[] $collections
 * @property \App\Model\Entity\Image[] $images
 */
class Item extends Entity
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
        'name' => true,
        'description' => true,
        'date_added' => true,
        'date_of_creation' => true,
        'size_in_cm_squared' => true,
        'for_sale' => true,
        'price' => true,
        'transactions' => true,
        'collections' => true,
        'images' => true,
    ];
}
