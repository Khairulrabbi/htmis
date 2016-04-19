<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Category extends Model
{
    /**
	* The database table used by the model
	*
	* @var string
    */
    protected $table = 'categories';

    /**
	 *Validation rules applied for category_name
	 *
    */
    public static function validate($input) {
    	$rules = array(
    		'category_name'     => 'required|Min:3|regex:/^[\pL\s\-]+$/u'
    	);

    	return Validator::make($input, $rules);
    }

    
}
