<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BlogTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BlogTable Test Case
 */
class BlogTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BlogTable
     */
    public $Blog;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.blog'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Blog') ? [] : ['className' => 'App\Model\Table\BlogTable'];
        $this->Blog = TableRegistry::get('Blog', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Blog);

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
