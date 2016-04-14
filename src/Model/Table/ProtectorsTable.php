<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class ProtectorsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('protectors');
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
    public function findAuthDad($query, $options)
    {
        $query
            ->select(['id', 'user_id', 'role', 'username', 'password', 'full_name', 'phone', 'is_admin'])
            ->where(['role' => 'dad']);

        return $query;
    }

/**
 * Finder para autenticação.
 */
    public function findAuthMom($query, $options)
    {
        $query
            ->select(['id', 'user_id', 'role', 'username', 'password', 'full_name', 'phone', 'is_admin'])
            ->where(['role' => 'mom']);

        return $query;
    }
}