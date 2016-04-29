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
use App\models\User;
use App\models\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     *The Category model instance
     *
     * @param $category
     */
    protected $category;
    public function __construct(Category $category) {
    	$this->category = $category;
    }

    /**
     * Show a form to create category name
     * @return Response
     */
    public function add() {

    	return view('categories.create');
    }

    /**
     * Store a newly created category in category table if id is null
     *
     *if id is not null then check for update
     * validations are checked
     *
     * @param $request, $id
     *
     * @return Response
     */
    public function saveOrUpdate(Request $request, $id='') {
        $category = new Category();
        $v = Category::validate(Input::all());                  
        if($v->passes()) {

        	if($id != '') {
        		$category = Category::find($id);
        	}  else {

        	}

 		  $category->category_name = $request->category_name;
    	  $category->save();
    	
    	   return redirect('categories');   	
        } else {

            return Redirect::to('category/add')->withErrors($v->getMessageBag());
        }

    }

    /**
     * Show the list of category
     *
     * Pagination are done
     */
    public function index() {
        $categories = Category::orderBy('created_at','desc')->paginate(5);
    	
    	return view('categories.index', compact('categories'));

    }

    /**
     * Shows the form with specified values
     *
     * @param $id;
     *
     * @return Response
     */
    public function edit($id) {
    	 $category = $this->category->find($id);
    	 $id = $category->id;

    	 return view('categories.edit', compact('category', 'id'));
    }


    public function search() {

    }

}
