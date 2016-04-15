<?php

namespace App\models;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
      protected $table = "accesses";

      public static function validate($input) {
      	$rules = array(
                  'name'=>'Required|Min:3|Max:100',
      		'action_name' =>'Required|Min:3|Max:100|Alpha',
      		'controller_name' =>'Required|Min:4|Max:100|Alpha'
      	);

      	return Validator::make($input, $rules);
      }

      public function role() {
       
      	return $this->belongsToMany('App\models\Role');
      }
}
