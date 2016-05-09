<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class User extends Model
{
    protected $table = 'users';
    //
    protected $fillable = ['name', 'email', 'password', 'address', 'role_id'];

    public static function validate($input) {
        $rules = array(
            'name' => 'required|alpha|max:255',
            'email' => 'required|email|max:255|unique:users',
            'address' => 'required|max:255',
            'role_id' => 'required|numeric|max:11',
            'password' => 'required|confirmed|min:6',
            );

        return Validator::make($input, $rules);
    }   

     public static function validates($input) {
    	$rules = array(
            'name' => 'required|alpha|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|max:255',
            'role_id' => 'required|numeric|max:11',
            'password' => 'required|confirmed|min:6',
    		);

    	return Validator::make($input, $rules);
    }


    /**
     * Get the role that owns the user
     */
    public function role() {
        
    	return $this->belongsTo('App\models\Role');
    }


    // public function hasRole($role) {

    //     if(is_string( $role)) {

    //         return $this->roles->contains('name', $role);
    //     }

    //     return !! $role->intersect($this->roles)->count();
    // }

    // public function assign($role) {
    //     if (is_string($role)) {
    //        return $this->roles()->save(
    //             Role::whereName($role)->firstOrFail()
    //         );
    //     }
    //   return $this->roles()->save();
    // }


}
