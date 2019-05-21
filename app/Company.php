<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
class Company extends Model
{
 use SoftDeletes;
 use Sluggable;

 public function sluggable()
 {
    return [
        'slug' => [
            'source' => 'name'
        ]
    ];
 }
	  protected $fillable = [
        'name', 'email', 'website'
    ];
   	// protected $guarded = [];
    protected $dates = [
    	'created_at',
    	'deleted_at',
    	'updated_at',
    	'started_at'
    ];
}
