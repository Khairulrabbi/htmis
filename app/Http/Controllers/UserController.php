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
    /**
     * The UserClass instance.
     *
     * @var App\Repositories\UserClass
     */  
	protected $user;

    /**
     * Create a new UserController instance.
     *
     * @param  App\models\User $user
     * @return void
     */
	public function __construct(User $user) {
		$this->user = $user;
	}

    /**
     * Show the form for creating a new user.
     * 
     *$roles are from App\models\Role
     * @return Response
     */

    public function add() {
    	$roles = Role::all();

    	return view('auth.register', compact('roles'));
    }

    /**
     * Store a newly created user in database if id is null.
     *
     * if id is not empty then check for update. Not done yet
     *
     * Validations are done
     * @param  App\requests\Request $request
     * @param App\models\User $id
     *
     * @return Response
     */
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

    /**
     * Display a listing of the user.
     *
     * @return Response
     */
    public function index() {
        $users = User::all();

        return view('auth.index', compact('users') );
    }
    /**
     * Show the form for editing the specified user.
     *
     * @param  App\Models\User $id
     * @return Response
     */
    public function edit($id) {
        $user = User::find($id);
        $id = $user->id;

        $roles = Role::all();

        return view('auth.edit', compact('user', 'id', 'roles'));
    }

}
