<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContentImagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContentImagesTable Test Case
 */
class ContentImagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ContentImagesTable
     */
    protected $ContentImages;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ContentImages',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ContentImages') ? [] : ['className' => ContentImagesTable::class];
        $this->ContentImages = $this->getTableLocator()->get('ContentImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ContentImages);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ContentImagesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
