<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = 'users';
    //
    protected $fillable = ['name', 'email', 'password', 'address', 'role_id'];

    public function role() {
        return $this->belongsToMany('App\models\Role');
    }
}
