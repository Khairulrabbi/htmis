<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Response;
use Session;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


use App\models\Access;
use App\models\Role;
use App\models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * The User model instances.
     *
     *@var App\models\User
     */
	  protected $user;
    public function __construct(User $user) {
    	$this->user = $user;
    }

    /**
     * Show the form for creating a new user.
     *
     *Select all roles from App\models\User

     * @return Response
     */
    public function add() {
    	$roles = Role::all();

    	return view('users.create', compact('roles') );
    }

    /**
     * Insert a newly created user if the id is null else
     *
     * update the existing user
     *
     * @param App\models\User
     * 
     * @param App\Http\Requests;
     */
    public function saveOrUpdate(Request $request, $id='') {
        $user = new User();
        if ($id !='') {
        echo $user = User::find($id);
        } else {

            
        }
            $this->user->name = $request->name;
            $this->user->email = $request->email;
            $this->user->password = $request->password;
            $this->user->address = $request->address;
            $this->user->role = $request->role;
            $this->user->save();

            return redirect('user/list');
    }
    public function index() {
       $users = User::orderBy('created_at', 'desc')->paginate(5);
      
       return view('users.index', compact('users', $users));
    }

    public function edit($id) {
         $user = $this->user->find($id);
         $id =  $user->id;
        return view('users.edit',compact('user', 'id'));
    }
}
