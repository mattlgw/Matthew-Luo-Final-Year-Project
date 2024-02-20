<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SearchRecordsFixture
 */
class SearchRecordsFixture extends TestFixture
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
                'id' => '97911312-5755-4ca4-bb3d-9e6b81158269',
                'user_id' => '0c04aaae-9bc5-4888-99d1-24d4af15fe7d',
                'address_id' => 'c03907e2-85e9-4dbb-ae1b-6e299a944b9c',
                'score' => 1,
                'searched' => 1696525918,
            ],
        ];
        parent::init();
    }
}
