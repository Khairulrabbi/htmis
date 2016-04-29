<?php

namespace App\models;

use App\models\Permission;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function roles() {

    	return $this->belongsToMany('App\models\Role');
    }
}
