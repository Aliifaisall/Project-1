<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InquiriesFixture
 */
class InquiriesFixture extends TestFixture
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
                'email' => 'Lorem ipsum dolor sit amet',
                'phone_number' => 'Lorem ipsum d',
                'full_name' => 'Lorem ipsum dolor sit amet',
                'date_created' => 1652015639,
                'message' => 'Lorem ipsum dolor sit amet',
                'reply_sent' => 1,
            ],
        ];
        parent::init();
    }
}
