<?php
namespace Cms\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cms\Model\Entity\User;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Instituitions
 * @property \Cake\ORM\Association\HasMany $Charts
 * @property \Cake\ORM\Association\HasMany $Exercises
 * @property \Cake\ORM\Association\HasMany $Hashtags
 * @property \Cake\ORM\Association\HasMany $Inputs
 * @property \Cake\ORM\Association\HasMany $LessonEntries
 * @property \Cake\ORM\Association\HasMany $Lessons
 * @property \Cake\ORM\Association\HasMany $Messages
 * @property \Cake\ORM\Association\HasMany $Parents
 * @property \Cake\ORM\Association\HasMany $Schools
 * @property \Cake\ORM\Association\HasMany $Themes
 * @property \Cake\ORM\Association\HasMany $Therapists
 * @property \Cake\ORM\Association\HasMany $Tutors
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('full_name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Instituitions', [
            'foreignKey' => 'instituition_id',
            'joinType' => 'INNER',
            'className' => 'Cms.Instituitions'
        ]);
        $this->hasMany('Charts', [
            'foreignKey' => 'user_id',
            'className' => 'Cms.Charts'
        ]);
        $this->hasMany('Exercises', [
            'foreignKey' => 'user_id',
            'className' => 'Cms.Exercises'
        ]);
        $this->hasMany('Hashtags', [
            'foreignKey' => 'user_id',
            'className' => 'Cms.Hashtags'
        ]);
        $this->hasMany('Inputs', [
            'foreignKey' => 'user_id',
            'className' => 'Cms.Inputs'
        ]);
        $this->hasMany('LessonEntries', [
            'foreignKey' => 'user_id',
            'className' => 'Cms.LessonEntries'
        ]);
        $this->hasMany('Lessons', [
            'foreignKey' => 'user_id',
            'className' => 'Cms.Lessons'
        ]);
        $this->hasMany('Messages', [
            'foreignKey' => 'user_id',
            'className' => 'Cms.Messages'
        ]);
        $this->hasMany('Parents', [
            'foreignKey' => 'user_id',
            'className' => 'Cms.Parents'
        ]);
        $this->hasMany('Schools', [
            'foreignKey' => 'user_id',
            'className' => 'Cms.Schools'
        ]);
        $this->hasMany('Themes', [
            'foreignKey' => 'user_id',
            'className' => 'Cms.Themes'
        ]);
        $this->hasMany('Therapists', [
            'foreignKey' => 'user_id',
            'className' => 'Cms.Therapists'
        ]);
        $this->hasMany('Tutors', [
            'foreignKey' => 'user_id',
            'className' => 'Cms.Tutors'
        ]);
    }

}
