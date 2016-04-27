<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Role extends Model
{
	/**
	 * the database table used by the model
	 *
	 *The validations rules are applied
	 */

	protected $table = 'roles';
	protected $fillable = ['name', 'status'];

	public static function validate($input) {
		$rules = array('name'=>'Required|unique:roles|Min:3|Max:100|regex:/^[\pL\s\-]+$/u');

		return Validator::make($input, $rules);
	}

	//
    public function access() {

    	return $this->belongsToMany('App\models\Access');
    }

    public function users() {
    
    	return $this->hasMany('App\models\User');
    }

    //For ACL

    public function permissions() {

    	return $this->belongsToMany('App\models\Permission');
    }

    public function assign(Permission $permission) {

    	return $this->permissions()->save($permission);
    }

}
