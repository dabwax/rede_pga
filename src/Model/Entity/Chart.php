<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;


class Chart extends Entity
{

    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

}
