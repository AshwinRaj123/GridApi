<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\HybridRelations;
class Location extends Eloquent {
	 use HybridRelations;
    protected $connection = 'mongodb';
    protected $collection = 'location';

    public function profile(){
    	return $this->hasMany(Profile::class);
    }
}