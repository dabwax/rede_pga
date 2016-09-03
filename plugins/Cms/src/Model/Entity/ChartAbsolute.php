<?php
namespace Cms\Model\Entity;

use Cake\ORM\Entity;

/**
 * ChartAbsolute Entity.
 *
 * @property int $id * @property int $user_id * @property \Cms\Model\Entity\User $user * @property int $input_id * @property \Cms\Model\Entity\Input $input * @property string $type * @property string $title */
class ChartAbsolute extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
