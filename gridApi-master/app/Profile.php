<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\HybridRelations;
class Profile extends Eloquent {
	 use HybridRelations;
    protected $connection = 'mongodb';
    protected $collection = 'profiles';
}