<?php
namespace App\Model\Table;

use App\Model\Entity\Chart;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Charts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Themes
 * @property \Cake\ORM\Association\HasMany $ChartInputs
 */
class ChartsTable extends Table
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

        $this->table('charts');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Themes', [
            'foreignKey' => 'theme_id'
        ]);
        $this->hasMany('ChartInputs', [
            'foreignKey' => 'chart_id'
        ]);
        $this->hasMany('ChartThemes', [
            'foreignKey' => 'chart_id'
        ]);
        $this->hasMany('ChartSeries', [
            'foreignKey' => 'chart_id'
        ]);
    }

    public function buscaGraficos($user_id, $admin_logged = null)
    {
        $where = [
            'user_id' => $user_id
        ];

        if(!empty($admin_logged['clinical_condition']))
        {
            $where['to_user'] = 1;
        }

        return $this->find()->where($where)->contain([
            'ChartInputs' => function($q) {
                return $q->contain(['Inputs']);
            },
            'ChartThemes' => function($q) {
                return $q->contain(['Themes']);
            }
        ])->all();
    }
}
