<?php
namespace Cms\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cms\Model\Table\ProtectorsTable;

/**
 * Cms\Model\Table\ProtectorsTable Test Case
 */
class ProtectorsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cms.protectors',
        'plugin.cms.users',
        'plugin.cms.instituitions',
        'plugin.cms.schools',
        'plugin.cms.charts',
        'plugin.cms.exercises',
        'plugin.cms.hashtags',
        'plugin.cms.inputs',
        'plugin.cms.lesson_entries',
        'plugin.cms.lessons',
        'plugin.cms.messages',
        'plugin.cms.parents',
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
        $config = TableRegistry::exists('Protectors') ? [] : ['className' => 'Cms\Model\Table\ProtectorsTable'];
        $this->Protectors = TableRegistry::get('Protectors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Protectors);

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
