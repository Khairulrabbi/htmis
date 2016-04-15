<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'registers';
    //
    protected $fillable = ['name', 'email', 'password', 'address', 'role'];

    public function role() {
    	return $this->belongsToMany('App\models\Role');
    }
}
