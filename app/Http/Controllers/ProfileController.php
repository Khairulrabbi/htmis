<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\models\Profile;
use App\models\Category;

class ProfileController extends Controller
{
    /**
     * The Profile model instances.
     *
     *@var App\models\Profile
     */

    protected $doctor_profile;
    protected $doc_id;

    public function __construct(Profile $doctor_profile, Profile $doc_id) {
    	$this->doctor_profile = $doctor_profile;
    	$this->doc_id = $doc_id;
    }

    /**
     * Create a doctor profile
     *
     * @return Response
     */
    public function add() {
        $categories = Category::all('id', 'category_name');
    	return view('profile.create', compact('categories', $categories));
    }

    public function saveOrUpdate(Request $request, $id='') {
    	// $doctor_profile = new Profile();
    	 $this->doctor_profile->phone_number = $request->phone_number;
    	 $this->doctor_profile->doctor_id = $request->doctor_id;
    	 $this->doctor_profile->education = $request->education;
    	 $this->doctor_profile->speciality = $request->speciality;
    	 $this->doctor_profile->experience = $request->experience;
    	 $this->doctor_profile->designation = $request->designation;
    	 $this->doctor_profile->category_id = $request->category_id;
         $this->doctor_profile->time_range = $request->time_range;

    	 $this->doctor_profile->save();

    	 return redirect('profile/list');
    }


    //Displaying doctor list
    public function index() {
    	$doctors = Profile::all();

    	return view('profile.index', compact('doctors'));
    }

    //Edit Doctor Profile
    public function edit($id) {
    	
    	 $doctor = $this->doctor_profile->find($id);
    	 $categories = Category::all('id', 'category_name');
    	 return view('profile.edit', compact('doctor', 'categories'));

    }


}
