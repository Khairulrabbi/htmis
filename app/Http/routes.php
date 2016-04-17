<?php
use App\models\Access;
use App\models\Category;
use App\models\Profile;
use App\models\Role;
use App\models\User;


Route::group(['middleware' => ['web']], function() {

    // Access

    Route::get('access/add', 'AccessController@add');
    Route::post('access/add', 'AccessController@save');
    Route::get('access/list', 'AccessController@index');
    Route::get('access/{id}/edit', 'AccessController@edit');
    Route::post('access/update/{id}', 'AccessController@update');

    Route::delete('/access/{id}', function ($id) {
            Access::findOrFail($id)->delete();

            return redirect('access/list');
    });


    //Displaying CSV Data
    Route::get('/csv-data', 'AccessController@getCsv');

    //Working with view
    Route::get('/viewdata', 'AccessController@getViewdata');


    // Role

    Route::get('role/add', 'RoleController@add');
    // Route::post('role/add', 'RoleController@save');
    Route::post('role/add', 'RoleController@saveOrUpdate');
    Route::get('role/list', 'RoleController@index');
    Route::get('role/{id}/edit', 'RoleController@edit');
    // Route::post('role/update/{id}', 'RoleController@update');
    Route::post('role/update/{id}', 'RoleController@saveOrUpdate');

    Route::delete('role/{id}', function($id) {
        Role::findOrFail($id)->delete();

        return redirect('role/list');
    });
    

    // Category

    Route::get('category/add','CategoryController@add');
    Route::post('category/add','CategoryController@saveOrUpdate');
    Route::get('category/{id}/edit', 'CategoryController@edit');
    Route::post('category/update/{id}', 'CategoryController@saveOrUpdate');
    Route::get('category/list', 'CategoryController@index');

    Route::delete('category/{id}', function($id){
        Category::findOrFail($id)->delete();

        return redirect('category/list');

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

    Route::get('register', 'UserController@add');
    Route::post('register', 'UserController@saveOrUpdate');
    Route::get('user/list', 'UserController@index');
    Route::get('user/{id}/edit', 'UserController@edit');
    Route::post('user/{id}/update', 'UserController@saveOrUpdate');

    Route::get('login', 'UserController@login');

    // Route::get('home', 'HomeController@index');

    // User Registration and authentication
    // Route::auth();
    // Route::get('/home', 'HomeController@index');
    // Route::get('/', 'HomeController@index');

});



