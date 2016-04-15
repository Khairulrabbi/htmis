<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Role extends Model
{
	protected $table = 'roles';
	protected $fillable = ['name', 'status'];
	
    public function access() {
    	return $this->belongsToMany('App\models\Access');
    }

    public function users() {
    	return $this->hasMany('App\models\User');
    }
}
