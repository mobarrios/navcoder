<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|I
*/

require(__DIR__ . '/routes/items.php');
require(__DIR__ . '/routes/doctors.php');
require(__DIR__ . '/routes/clients.php');
require(__DIR__ . '/routes/purchases.php');
require(__DIR__ . '/routes/categories.php');
require(__DIR__ . '/routes/providers.php');
require(__DIR__ . '/routes/medicalinsurances.php');
require(__DIR__ . '/routes/measurementunits.php');
require(__DIR__ . '/routes/sales.php');
require(__DIR__ . '/routes/caja.php');

//config 
require(__DIR__ . '/routes/config/users.php');
require(__DIR__ . '/routes/config/profiles.php');
require(__DIR__ . '/routes/config/permissions.php');


Route::get('/',function()
{
	if(Auth::check()){
		return View::make('index');
	}else{
		return Redirect::to('login');
	}
	
});

Route::get('login',function()
{
	return View::make('login');
});

Route::post('login', array('as'=>'post_login', 'uses'=>'LoginController@login'));

Route::get('inicio', function()
{	
	return View::make('index');
});


Route::get('salir',  array('as'=>'logout', 'uses'=>'LoginController@logOut'));