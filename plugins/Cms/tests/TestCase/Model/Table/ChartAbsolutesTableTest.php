<?php
namespace Cms\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cms\Model\Table\ChartAbsolutesTable;

/**
 * Cms\Model\Table\ChartAbsolutesTable Test Case
 */
class ChartAbsolutesTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \Cms\Model\Table\ChartAbsolutesTable     */
    public $ChartAbsolutes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cms.chart_absolutes',
        'plugin.cms.users',
        'plugin.cms.instituitions',
        'plugin.cms.schools',
        'plugin.cms.charts',
        'plugin.cms.chart_series',
        'plugin.cms.exercises',
        'plugin.cms.lessons',
        'plugin.cms.themes',
        'plugin.cms.hashtags',
        'plugin.cms.inputs',
        'plugin.cms.lesson_entries',
        'plugin.cms.messages',
        'plugin.cms.parents',
        'plugin.cms.therapists',
        'plugin.cms.tutors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ChartAbsolutes') ? [] : ['className' => 'Cms\Model\Table\ChartAbsolutesTable'];        $this->ChartAbsolutes = TableRegistry::get('ChartAbsolutes', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ChartAbsolutes);

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
