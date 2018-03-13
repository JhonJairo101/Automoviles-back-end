<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CarBrandsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CarBrandsTable Test Case
 */
class CarBrandsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CarBrandsTable
     */
    public $CarBrands;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.car_brands'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CarBrands') ? [] : ['className' => CarBrandsTable::class];
        $this->CarBrands = TableRegistry::get('CarBrands', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CarBrands);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
