<?php

namespace App\models;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
      /**
       * The database table used by the model
       *
       *validations rules are defined
       *
       * @param $input
       */
      protected $table = "accesses";

      public static function validate($input) {
      	$rules = array(
                  'name'=>'Required|Min:3|Max:100|regex:/^[\pL\s\-]+$/u',
      		'action_name' =>'Required|Min:3|Max:100|Alpha',
      		'controller_name' =>'Required|Min:4|Max:100|Alpha'
      	);

      	return Validator::make($input, $rules);
      }

      /**
       * Establishing relationships with Role model
      */
      public function role() {
       
      	return $this->belongsToMany('App\models\Role');
      }
}
