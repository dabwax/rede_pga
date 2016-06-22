<?php
namespace Cms\Model\Entity;

use Cake\ORM\Entity;

/**
 * ChartTab Entity.
 *
 * @property int $id * @property int $user_id * @property \Cms\Model\Entity\User $user * @property string $title * @property string $charts_related */
class ChartTab extends Entity
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
