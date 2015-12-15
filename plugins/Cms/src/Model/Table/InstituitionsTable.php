<?php
namespace Cms\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cms\Model\Entity\Instituition;

/**
 * Instituitions Model
 *
 * @property \Cake\ORM\Association\HasMany $Schools
 * @property \Cake\ORM\Association\HasMany $Users
 */
class InstituitionsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('instituitions');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->hasMany('Schools', [
            'foreignKey' => 'instituition_id',
            'className' => 'Cms.Schools'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'instituition_id',
            'className' => 'Cms.Users'
        ]);
    }

}
