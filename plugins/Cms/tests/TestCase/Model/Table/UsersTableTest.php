<?php
namespace Cms\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cms\Model\Table\UsersTable;

/**
 * Cms\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cms.users',
        'plugin.cms.instituitions',
        'plugin.cms.charts',
        'plugin.cms.exercises',
        'plugin.cms.hashtags',
        'plugin.cms.inputs',
        'plugin.cms.lesson_entries',
        'plugin.cms.lessons',
        'plugin.cms.messages',
        'plugin.cms.parents',
        'plugin.cms.schools',
        'plugin.cms.themes',
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
        $config = TableRegistry::exists('Users') ? [] : ['className' => 'Cms\Model\Table\UsersTable'];
        $this->Users = TableRegistry::get('Users', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Users);

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
