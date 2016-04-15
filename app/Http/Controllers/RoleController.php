<?php
namespace App\Http\Controllers;

use DB;
use Response;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


use App\models\Access;
use App\models\Role;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * The Role model instances.
     *
     *@var App\models\Role
     */

    protected $role;

    public function __construct(Role $role) {
        $this->role = $role;
    }

    /**
     * Show the form for creating a new role
     *
     * @return Response
     */
    public function add() {
        $accesses = Access::all();
        return view('roles.create', compact('accesses',$accesses));
    }

    /**
     * Insert a newly created role while id is null else update.
     *
     * @param  App\Http\Requests $request;
     *
     * @return Response 
    */

    public function saveOrUpdate(Request $request, $id='') {
        $role = new Role();
        if ($id != '') {
            $role = Role::find($id);
        } else {
            
        }
        $role->name = $request->name;
        $status = Input::has('status') ? true : false;
        
        if (Input::has('status') == true) {
            $role->status = $status;     
        }

        $role->save();
        $id = $request->access;
        $role->access()->attach($id);

        return redirect('role/list'); 

    }

    /**
     *Display a listing of the role
     *
     * @return Response
     */
    public function index() {
        $roles = Role::orderBy('created_at', 'desc')->paginate(5);
        
        return view('roles.index', compact('roles', $roles));
    }

    /**
     * Show the form for editing the specified role
     *
     * @param App\models\Role
     * @return Response
     */
    public function edit($id) {
        $role = $this->role->find($id);
        $id = $role->id;
        $roles = $this->role->all();
        $accesses = Access::all();

        return view('roles.edit', compact('role','id', 'roles', 'accesses'));
    }

}
