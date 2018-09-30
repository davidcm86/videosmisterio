<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EncuentasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EncuentasTable Test Case
 */
class EncuentasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EncuentasTable
     */
    public $Encuentas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.encuentas',
        'app.categorias',
        'app.videos',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Encuentas') ? [] : ['className' => 'App\Model\Table\EncuentasTable'];
        $this->Encuentas = TableRegistry::get('Encuentas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Encuentas);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
