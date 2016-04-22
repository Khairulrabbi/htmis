<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class User extends Model
{
    protected $table = 'users';
    //
    protected $fillable = ['name', 'email', 'password', 'address', 'role_id'];

    public static function validate($input) {
    	$rules = array(
            'name' => 'required|alpha|max:255',
            'email' => 'required|email|max:255|unique:users',
            'address' => 'required|max:255',
            'role_id' => 'required|numeric|max:11',
            'password' => 'required|confirmed|min:6',
    		);

    	return Validator::make($input, $rules);
    }

    public function role() {
        
    	return $this->belongsToMany('App\models\Role');
    }
}
