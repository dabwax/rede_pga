<?php
namespace App\Model\Table;

use App\Model\Entity\ChartInput;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ChartThemesTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('chart_themes');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Charts', [
            'foreignKey' => 'chart_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Themes', [
            'foreignKey' => 'theme_id',
            'joinType' => 'INNER'
        ]);
    }

}
