<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class TutorsTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('tutors');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'className' => 'Cms.Users'
        ]);
    }

/**
 * Finder para autenticação.
 */
    public function findAuthTutor($query, $options)
    {
        $query
            ->select(['id', 'user_id', 'role', 'username', 'password', 'full_name', 'phone'])
            ->where(['role' => 'tutor']);

        return $query;
    }

}
