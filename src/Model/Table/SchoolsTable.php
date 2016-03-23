<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;

class SchoolsTable extends Table
{

/**
 * Finder para autenticação.
 */
    public function findAuthCoordinator($query, $options)
    {
        $query
            ->select(['id', 'user_id', 'instituition_id', 'role', 'username', 'password', 'full_name', 'phone', 'is_admin'])
            ->where(['role' => 'coordinator']);

        return $query;
    }

/**
 * Finder para autenticação.
 */
    public function findAuthMediator($query, $options)
    {
        $query
            ->select(['id', 'user_id', 'instituition_id', 'role', 'username', 'password', 'full_name', 'phone', 'is_admin'])
            ->where(['role' => 'mediator']);

        return $query;
    }
}