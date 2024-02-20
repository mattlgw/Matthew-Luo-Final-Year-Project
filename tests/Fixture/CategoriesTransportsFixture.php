<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CategoriesTransportsFixture
 */
class CategoriesTransportsFixture extends TestFixture
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
                'id' => '100a6a99-2278-41d5-9b08-f85ad21a1fc9',
                'user_id' => '8dd3799f-53a7-4ae5-b84f-beac3d74d452',
                'subCategory_id' => 1,
                'transport_id' => 1,
                'proximity' => 1,
            ],
        ];
        parent::init();
    }
}
