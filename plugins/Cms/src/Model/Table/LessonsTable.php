<?php
namespace Cms\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class LessonsTable extends Table
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

        $this->table('lessons');
        $this->displayField('date');
        $this->primaryKey('id');
        $this->hasMany('LessonEntries', [
            'foreignKey' => 'lesson_id',
            'className' => 'LessonEntries'
        ]);
    }

}
