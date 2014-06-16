<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|


*/
Route::get('/', function()
{
	return View::make('hello');

});

Route::controller('users', 'UsersController');

//Inserta un registro a la tabla users
Route::get('registro', function(){

	$user = new User;

	$user->name="Jordi";
	$user->email="jordi@gmail.com";
	$user->password=Hash::make('123');

	$user->save();

	return "El usuario ha sido insertado en la tabla";
});

