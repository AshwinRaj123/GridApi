<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\HybridRelations;
class Post extends Eloquent {
	 use HybridRelations;
    protected $connection = 'mongodb';
    protected $collection = 'post';

    public function profile(){
    	return $this->belongsTo(Profile::class);
    }

    public function media(){
    	return $this->hasMany(Media::class);
    }

}
