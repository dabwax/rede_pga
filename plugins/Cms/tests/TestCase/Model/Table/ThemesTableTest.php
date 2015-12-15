<?php
namespace Cms\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cms\Model\Table\ThemesTable;

/**
 * Cms\Model\Table\ThemesTable Test Case
 */
class ThemesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cms.themes',
        'plugin.cms.users',
        'plugin.cms.instituitions',
        'plugin.cms.schools',
        'plugin.cms.charts',
        'plugin.cms.chart_inputs',
        'plugin.cms.exercises',
        'plugin.cms.hashtags',
        'plugin.cms.inputs',
        'plugin.cms.lesson_entries',
        'plugin.cms.lessons',
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
        $config = TableRegistry::exists('Themes') ? [] : ['className' => 'Cms\Model\Table\ThemesTable'];
        $this->Themes = TableRegistry::get('Themes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Themes);

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
