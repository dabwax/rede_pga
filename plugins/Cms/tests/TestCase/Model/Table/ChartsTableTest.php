<?php
namespace Cms\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cms\Model\Table\ChartsTable;

/**
 * Cms\Model\Table\ChartsTable Test Case
 */
class ChartsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cms.charts',
        'plugin.cms.users',
        'plugin.cms.instituitions',
        'plugin.cms.schools',
        'plugin.cms.exercises',
        'plugin.cms.hashtags',
        'plugin.cms.inputs',
        'plugin.cms.lesson_entries',
        'plugin.cms.lessons',
        'plugin.cms.messages',
        'plugin.cms.parents',
        'plugin.cms.themes',
        'plugin.cms.therapists',
        'plugin.cms.tutors',
        'plugin.cms.chart_inputs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Charts') ? [] : ['className' => 'Cms\Model\Table\ChartsTable'];
        $this->Charts = TableRegistry::get('Charts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Charts);

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
