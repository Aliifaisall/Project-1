<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ItemsFixture
 */
class ItemsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet',
                'date_added' => '2022-05-01 10:20:55',
                'date_of_creation' => '2022-05-01 10:20:55',
                'size_in_cm_squared' => 1,
                'for_sale' => 1,
                'price' => 1.5,
            ],
        ];
        parent::init();
    }
}
