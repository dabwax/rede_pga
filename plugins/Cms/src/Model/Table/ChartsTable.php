<?php
namespace Cms\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cms\Model\Entity\Chart;

class ChartsTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('charts');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'className' => 'Cms.Users'
        ]);
        $this->hasMany('ChartSeries', [
            'foreignKey' => 'chart_id',
            'className' => 'Cms.ChartSeries'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator->add('name', 'notBlank', ['rule' => 'notBlank', 'message' => 'O título do gráfico é obrigatório.']);
        $validator->add('format', 'notBlank', ['rule' => 'notBlank', 'message' => 'O formato do gráfico é obrigatório.']);

        return $validator;
    }

}
