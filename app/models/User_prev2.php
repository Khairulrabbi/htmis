<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    //
    protected $fillable = ['name', 'email', 'password', 'address', 'role_id'];

    public function role() {
    	return $this->belongsToMany('App\models\Role');
    }
}
