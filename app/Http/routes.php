<?php
use App\models\Access;
use App\models\Category;
use App\models\Profile;
use App\models\Role;
use App\models\User;


Route::group(['middleware' => ['web']], function() {

    // Access

    Route::get('access/add', 'AccessController@add');
    Route::post('access/add', 'AccessController@saveOrUpdate');
    Route::get('accesses', 'AccessController@index');
    Route::get('access/{id}/edit', 'AccessController@edit');
    Route::post('access/update/{id}', 'AccessController@saveOrUpdate');

    Route::delete('/access/{id}', function ($id) {
            Access::findOrFail($id)->delete();

            return redirect('accesses');
    });


    //Displaying CSV Data
    Route::get('/csv-data', 'AccessController@getCsv');

    //Working with view
    Route::get('/viewdata', 'AccessController@getViewdata');


    // Role

    Route::get('role/add', 'RoleController@add');
    Route::post('role/add', 'RoleController@saveOrUpdate');
    Route::get('roles', 'RoleController@index');
    Route::get('role/{id}/edit', 'RoleController@edit');
    Route::post('role/update/{id}', 'RoleController@saveOrUpdate');

    // Route::get('role', 'RoleController@indexe');
    Route::delete('role/{id}', function($id) {
        Role::findOrFail($id)->delete();

        return redirect('roles');
    });
    

    // Category

    Route::get('category/add','CategoryController@add');
    Route::post('category/add','CategoryController@saveOrUpdate');
    Route::get('category/{id}/edit', 'CategoryController@edit');
    Route::post('category/update/{id}', 'CategoryController@saveOrUpdate');
    Route::get('categories', 'CategoryController@index');

    Route::delete('category/{id}', function($id){
        Category::findOrFail($id)->delete();

        return redirect('categories');

    });


    // Doctor's Profile

    Route::get('profile/add', 'ProfileController@add');
    Route::post('profile/add', 'ProfileController@saveOrUpdate');
    Route::get('profile/list', 'ProfileController@index');
    Route::get('profile/{id}/edit', 'ProfileController@edit');

    Route::delete('profile/{id}', function($id){
        Profile::findOrFail($id)->delete();

        return redirect('profile/list');
    });


    //User Registration and Login

    Route::auth();
    Route::get('/', 'UserController@index');
    Route::get('/home', 'HomeController@index');
    Route::get('register', 'UserController@add');
    Route::post('register', 'UserController@saveOrUpdate');
    // Route::get('user/list', 'UserController@index');
    Route::get('users', 'UserController@index');
    Route::get('user/{id}/edit', 'UserController@edit');
    Route::post('user/update/{id}', 'UserController@saveOrUpdate');

    Route::delete('user/{id}', function($id) {
        User::findOrFail($id)->delete();

        // return redirect('user/list');
        return redirect('users');
    });

    //Extra

    Route::get('relation/result', 'RoleController@extra');


});



