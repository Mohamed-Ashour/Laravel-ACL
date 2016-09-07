<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();


Route::group(['middleware' => ['auth']], function() {

	Route::get('/home', 'HomeController@index');

	Route::resource('users','UserController');

	Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index']);
	Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create']);
	Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store']);
	Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit']);
	Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update']);
	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy']);

	Route::get('images',['as'=>'images.index','uses'=>'ImageController@index','middleware' => ['permission:image-list|image-create|image-edit|image-delete']]);
	Route::get('images/create',['as'=>'images.create','uses'=>'ImageController@create','middleware' => ['permission:image-create']]);
	Route::post('images/create',['as'=>'images.store','uses'=>'ImageController@store','middleware' => ['permission:image-create']]);
	Route::get('images/{id}',['as'=>'images.show','uses'=>'ImageController@show']);
	Route::get('images/{id}/edit',['as'=>'images.edit','uses'=>'ImageController@edit','middleware' => ['permission:image-edit']]);
	Route::patch('images/{id}',['as'=>'images.update','uses'=>'ImageController@update','middleware' => ['permission:image-edit']]);
	Route::delete('images/{id}',['as'=>'images.destroy','uses'=>'ImageController@destroy','middleware' => ['permission:image-delete']]);
});
