<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\HybridRelations;
class Media extends Eloquent {
	 use HybridRelations;
    protected $connection = 'mongodb';
    protected $collection = 'media';
}