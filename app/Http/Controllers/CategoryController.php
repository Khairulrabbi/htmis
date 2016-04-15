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
use App\models\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class CategoryController extends Controller
{
    //
    protected $category;
    public function __construct(Category $category) {
    	$this->category = $category;
    }
    public function add() {

    	return view('categories.create');
    }

    public function saveOrUpdate(Request $request, $id='') {
    	$category = new Category();
    	if($id != '') {
    		 $category = Category::find($id);
    	} else {
    		
    	}
 		$category->category_name = $request->category_name;
    	$category->save();
    	
    	return redirect('category/list');   	
    }

    public function index() {
    	$categories = Category::all();
    	
    	return view('categories.index', compact('categories'));

    }

    public function edit($id) {
    	 $category = $this->category->find($id);
    	 $id = $category->id;

    	 return view('categories.edit', compact('category', 'id'));
    }

    public function search() {

    }
}
