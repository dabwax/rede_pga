<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cms\Model\Entity\Protector;

class ThemesTable extends Table
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

        $this->table('themes');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'className' => 'Cms.Users'
        ]);
    }

    public function getSelectMaterias($user_id)
    {
    	$where = ['user_id' => $user_id ];

    	return $this->find('list', ['keyField' => 'id', 'valueField' => 'name'] )->where($where)->all();
    }

}
