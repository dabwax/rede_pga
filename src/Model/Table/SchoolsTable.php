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
    public function findAuth($query, $options)
    {
        $query->select(['id', 'user_id', 'instituition_id', 'role', 'username', 'password', 'full_name', 'phone', 'is_admin']);

        return $query;
    }

}