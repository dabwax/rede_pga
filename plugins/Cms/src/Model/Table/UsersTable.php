<?php
namespace Cms\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cms\Model\Entity\User;

class UsersTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('full_name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');

        // add Duplicatable behavior
        $this->addBehavior('Duplicatable.Duplicatable', [
            // duplicate also items and their properties
            'contain' => ['Charts', 'Charts.ChartSeries',
            'Inputs', 'Protectors', 'Schools',
            'Therapists', 'Tutors'],
            // append copy to the name
            'append' => ['full_name' => ' - cópia']
        ]);

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
        $this->hasMany('Protectors', [
            'foreignKey' => 'user_id',
            'className' => 'Cms.Protectors'
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

    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('username', [
                'length' => [
                    'rule' => ['email'],
                    'message' => 'Deve ser um e-mail válido',
                ]
            ])
            ->add('full_name', [
                'length' => [
                    'rule' => ['minLength', 2],
                    'message' => 'O nome deve ter pelo menos 2 caracteres',
                ]
            ])
            ->add('date_of_birth', [
                'dateFormat' => [
                    'rule' => ['date', 'dmy'],
                    'message' => 'Deve ser uma data válida',
                ]
            ])
            ->add('clinical_condition', [
                'length' => [
                    'rule' => ['minLength', 2],
                    'message' => 'A condição clínica deve ter pelo menos 2 caracteres',
                ]
            ])
            ->add('instituition_id', [
                'length' => [
                    'rule' => ['minLength', 1],
                    'message' => 'Insira uma escola válida',
                ]
            ])
            ->add('school_grade', [
                'length' => [
                    'rule' => ['minLength', 2],
                    'message' => 'Insira uma série de escola válida',
                ]
            ]);

        return $validator;
    }


}
