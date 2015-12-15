<?php
namespace App\Model\Table;

use App\Model\Entity\ChartInput;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ChartInputs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Charts
 * @property \Cake\ORM\Association\BelongsTo $Inputs
 */
class ChartInputsTable extends Table
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

        $this->table('chart_inputs');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Charts', [
            'foreignKey' => 'chart_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Inputs', [
            'foreignKey' => 'input_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['chart_id'], 'Charts'));
        $rules->add($rules->existsIn(['input_id'], 'Inputs'));
        return $rules;
    }
}
