<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use DB;
use Response;
use Session;

use App\models\Access;
use App\models\Role;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccessController extends Controller
{
    /**
     * The Access instance
     * @var App\models\Access
     *
     */
    protected $access;

    /**
     * Create a new AccessController instance.
     *
     * @param  App\models\Access $access
     * @return void
     */

    public function __construct(Access $access) {
        $this->access = $access;
    }

    /**
     * Show the form for creating new access
     * 
     * @return Response
     */

    //Create
    public function add() {
        
    	return view('accesses.create'); 
    }

    /**
     * Store a newly created access to database
     *
     * Validations are done
     *
     * @param $request
     */

    //Save
    public function save(Request $request) {
        $v = Access::validate(Input::all());
        if ($v->passes()) {
            $this->access->name = $request->name;
        	$this->access->action_name = $request->action_name;
        	$this->access->controller_name = $request->controller_name;
        	$this->access->save();

            Session::flash('message', 'Access Created Successfully');

            return redirect('access/list');
        } else {

            return Redirect::to('access/add')->withErrors($v->getMessageBag());
        }
    }
    
    /**
     *
     *display list of access
     *
     * @return Response
     */

    //Display
    public function index() {
       $accesses = Access::orderBy('created_at', 'desc')->paginate(5);
       return view('accesses.index', compact('accesses', $accesses));
    }

    /**
     * Create a edit form
     * 
     * @param $id
     *
     * @return Response
     */

    public function edit($id) {
        // $access = Access::find($id);
        $access = $this->access->find($id);
        return view('accesses.edit', compact('access', $access));

    }

    /**
     * Update the specified row 
     * @param App\models\Access
     * @param App\requests\Request $request
     * @return Response
     */

    //Update
    public function update(Request $request, $id) {
        $access = Access::find($id);
        $access->action_name = $request->action_name;
        $access->name = $request->name;
        $access->controller_name = $request->controller_name;
        $access->save();

        Session::flash('message', 'Operation Updated Successfully');
        
        return redirect('access/list');
    }

//Search Work
    // public function search(Request $request) {
    //     $lists = Access::orderBy('action_name');
    //     $action_name = $request->input('action_name');

    //     if(!empty($action_name)) {
    //         $lists->where('action_name', 'LIKE', '%'.$action_name.'%');
    //     }
    //     $lists = $lists->paginate(3);
    //     return view('accesses.index', compact('lists'));
    // }

    /**
     *Create CSV File from html
     */
    //CSV File 
    public function getCsv() {
        $table = Access::all();
        $filename = 'accesses.csv';
        $handle = fopen($filename, 'w+');

        fputcsv($handle, array('Action Name', 'Controller Name', 'Created At'));

        foreach ($table as $row) {
            fputcsv($handle, array($row['action_name'], $row['controller_name'], $row['created_at']));
        }

        fclose($handle);

        $headers = array('Content-Type' => 'text/csv');

        return Response::download($filename, 'accesses.csv', $headers);
    }

//Display Using View
    public function getViewdata() {
        $results = DB::select('select * from myaccesses');
        $users = DB::table('myaccesses')->paginate(2);
        echo "<pre>";
        var_dump($users);
    }  
}
