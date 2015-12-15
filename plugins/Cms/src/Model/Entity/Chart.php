<?php
namespace Cms\Model\Entity;

use Cake\ORM\Entity;

/**
 * Chart Entity.
 */
class Chart extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
