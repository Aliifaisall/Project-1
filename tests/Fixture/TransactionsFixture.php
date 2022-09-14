<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TransactionsFixture
 */
class TransactionsFixture extends TestFixture
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
                'user_id' => 1,
                'item_id' => 1,
                'paid_amount' => 1.5,
                'status' => 'Lorem ipsum dolor ',
                'date_created' => 1652262973,
                'notes' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
