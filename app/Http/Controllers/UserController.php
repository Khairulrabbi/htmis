<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\models\Role;

class UserController extends Controller
{
    public function add() {
    	$roles = Role::all();
    	return view('auth.register', compact('roles'));
    }

    public function saveOrUpdate() {
    	echo "string";
    }

}
