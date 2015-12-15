<?php
namespace Cms\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cms\Model\Entity\Chart;

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
            'joinType' => 'INNER',
            'className' => 'Cms.Users'
        ]);
        $this->belongsTo('Themes', [
            'foreignKey' => 'theme_id',
            'joinType' => 'INNER',
            'className' => 'Cms.Themes'
        ]);
        $this->hasMany('ChartInputs', [
            'foreignKey' => 'chart_id',
            'className' => 'Cms.ChartInputs'
        ]);
    }

}
