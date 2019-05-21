<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Company extends Model
{
 use SoftDeletes;

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
