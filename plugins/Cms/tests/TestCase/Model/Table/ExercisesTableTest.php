<?php
namespace Cms\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cms\Model\Table\ExercisesTable;

/**
 * Cms\Model\Table\ExercisesTable Test Case
 */
class ExercisesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cms.exercises',
        'plugin.cms.users',
        'plugin.cms.instituitions',
        'plugin.cms.schools',
        'plugin.cms.charts',
        'plugin.cms.themes',
        'plugin.cms.chart_inputs',
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
        $config = TableRegistry::exists('Exercises') ? [] : ['className' => 'Cms\Model\Table\ExercisesTable'];
        $this->Exercises = TableRegistry::get('Exercises', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Exercises);

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
