<?php
namespace Cms\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

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
            'joinType' => 'INNER',
            'className' => 'Cms.Charts'
        ]);
        $this->belongsTo('Inputs', [
            'foreignKey' => 'input_id',
            'joinType' => 'INNER',
            'className' => 'Cms.Inputs'
        ]);
    }

}
