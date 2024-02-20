<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CategoryTransportsFixture
 */
class CategoryTransportsFixture extends TestFixture
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
                'id' => '8f6cda06-e004-44f9-a656-92eff630118e',
                'visitor_id' => 'bb2f8fd4-551e-4a8b-9343-2504d58b7f0a',
                'category_id' => 1,
                'transport_id' => 1,
                'proximity' => 1,
            ],
        ];
        parent::init();
    }
}
