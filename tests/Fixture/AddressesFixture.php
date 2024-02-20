<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AddressesFixture
 */
class AddressesFixture extends TestFixture
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
                'id' => 'dd16e69b-f10f-4f4a-b2d2-55db06ddb53b',
                'street_no' => '',
                'street_name' => 'Lorem ipsum dolor sit amet',
                'postcode' => '',
                'city' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
