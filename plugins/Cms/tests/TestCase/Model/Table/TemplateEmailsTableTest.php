<?php
namespace Cms\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cms\Model\Table\TemplateEmailsTable;

/**
 * Cms\Model\Table\TemplateEmailsTable Test Case
 */
class TemplateEmailsTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \Cms\Model\Table\TemplateEmailsTable     */
    public $TemplateEmails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cms.template_emails'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TemplateEmails') ? [] : ['className' => 'Cms\Model\Table\TemplateEmailsTable'];        $this->TemplateEmails = TableRegistry::get('TemplateEmails', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TemplateEmails);

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
