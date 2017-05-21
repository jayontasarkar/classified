<?php

namespace App;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use NodeTrait;

    protected $fillable = [
    	'title', 'slug'
    ];

    /**
     * Change route key to slug instead of id
     * 
     * @return [type] [description]
     */
    public function getRouteKeyName()
    {
    	return 'slug';
    }
}
