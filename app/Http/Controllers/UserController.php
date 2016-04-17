<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\models\Role;
use App\models\User;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use Response;
use Session;


class UserController extends Controller
{
	protected $user;

	public function __construct(User $user) {
		$this->user = $user;
	}
    public function add() {
    	$roles = Role::all();
    	return view('auth.register', compact('roles'));
    }

    public function saveOrUpdate(Request $request, $id='') {
    	$user = new User();
        $v = User::validate(Input::all());
        if ($v->passes()) {
            if ($id != '') {
                $user = User::find($id);
            } else {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->address = $request->address;
                $user->role_id = $request->role_id;

                $user->save();

                Session::flash('message', 'User Created Successfully');

                return view('home');
                    
            }
        } else {

            return Redirect::to('user/register')->withErrors($v->getMessageBag());
        }
    }

    public function index() {
        $users = User::all();

        return view('auth.index', compact('users') );
    }

    public function edit($id) {
        $user = User::find($id);
        $id = $user->id;

        $roles = Role::all();

        return view('auth.edit', compact('user', 'id', 'roles'));
    }

}
