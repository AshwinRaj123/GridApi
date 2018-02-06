<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\HybridRelations;
class Profile extends Eloquent {
	 use HybridRelations;
    protected $connection = 'mongodb';
    protected $collection = 'profiles';

    public function post(){
    	return $this->hasMany(Post::class);
    }

    public function events(){
    	return $this->hasMany(Event::class);
    }

    public function location(){
    	return $this->belongsTo(Location::class);
    }

    public function languages(){
    	return $this->belongsTo(languages::class);
    }
}