<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\HybridRelations;
class Languages extends Eloquent {
	 use HybridRelations;
    protected $connection = 'mongodb';
    protected $collection = 'languages';

    public function profile(){
    	return $this->hasMany(Profile::class);
    }
}