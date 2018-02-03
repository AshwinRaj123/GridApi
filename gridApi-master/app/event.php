<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\HybridRelations;
class Event extends Eloquent {
	 use HybridRelations;
    protected $connection = 'mongodb';
    protected $collection = 'events';
}
