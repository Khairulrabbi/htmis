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
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccessController extends Controller
{
    protected $access;
    public function __construct(Access $access) {
        $this->access = $access;
    }

    //Create
    public function add() {
        
    	return view('accesses.create'); 
    }

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
 
    //Display
    public function index() {
       $accesses = Access::orderBy('created_at', 'desc')->paginate(5);
       return view('accesses.index', compact('accesses', $accesses));
        // return view('accesses.index', [
        //     'lists' => Access::orderBy('created_at', 'desc')->paginate(5)
        // ]);
    }


    public function edit($id) {
        // $access = Access::find($id);
        $access = $this->access->find($id);
        return view('accesses.edit', compact('access', $access));

    }



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
