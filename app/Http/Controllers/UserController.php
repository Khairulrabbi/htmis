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
use DB;

class UserController extends Controller
{
    /**
     * The User instance.
     *
     * @var App\models\User
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

            if($id != '') {
               $user = User::find($id);
            } else {

            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->address = $request->address;
            $user->role_id = $request->role_id;
            $user->save();

            //Added for relationships
            $id = $request->role_id;

            $user->role()->associate($id);
            //above two lines

            // return redirect('user/list');
            return redirect('/home');
        } else {

            return Redirect::to('register')->withErrors($v->getMessageBag());           
        }
     
    }


    //Updating with Validation

    public function update(Request $request, $id) {
        $va =User::validates(Input::all());
        $user = User::find($id);
        if ($va->passes()) {

                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->address = $request->address;
                $user->role_id = $request->role_id;

                $user->save();  

                return redirect('/users');         
        } else {
            return Redirect::to('user/'.$user->id.'/edit')->withErrors($va->getMessageBag());
        }
    } 

    /**
     * Display a listing of the user.
     *
     * @return Response
     */
    public function index() {
        $users = User::orderBy('created_at','desc')->paginate(5);
        $role = Role::all();

        $rolees = DB::table('users')
                    ->join('roles', 'users.role_id','=','roles.id')
                    ->select('users.name', 'roles.name')
                    ->get();
                

        return view('auth.index', compact('users', 'role', 'rolees') );
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
        $role_id = $user->role_id;

        $roles = Role::all();
        $role = Role::find($role_id);

        return view('auth.edit', compact('user', 'id', 'roles', 'role'));
    }

    public function login() {

        return view('auth.login');
    }

    // working with auth login
    public function dashbord() {

        return view('auth.login');
    }

    //Working to show relationships between Role and User

    public function us_role() {
       $user = User::find(21);
       echo "$user";
       echo $user->role_id;

    }

}
