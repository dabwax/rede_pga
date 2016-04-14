<?php
namespace Cms\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity
{

    protected function _setPassword($password)
    {
    	$hash = (new DefaultPasswordHasher)->hash($password);

        return $hash;
    }
}
