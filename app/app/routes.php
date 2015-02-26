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

	
		Route::get('provider_search',function()
		{
			$data = Input::get('term');

			$resp = Providers::where('name','like','%'.$data.'%')
					->orWhere('last_name','like','%'.$data.'%')
					->orWhere('dni','like','%'.$data.'%')
					->get();

			$res  = array();

			foreach($resp as $r)
			{
				array_push($res, $r->last_name.' , '.$r->name );
			}

			return Response::json($res);
		});


		Route::post('item_search',function()
		{
			$data = Input::get('search');

			$resp = Items::where('code','like','%'.$data.'%')
					->orWhere('name','like','%'.$data.'%')
					->orWhere('description','like','%'.$data.'%')
					->get();

			$res =  array();

			foreach($resp as $r)
			{
				$res[] = array('id' => $r->id , 'label' => $r->name .' $ ' . $r->cost_price, 'value' =>$r->name .' $ ' . $r->cost_price);
			}

			return Response::json($res);
		});


		Route::get('/{empresa}', function($empresa)
		{
			if($empresa  == 'update')
			{
				DBupdate::up();
				return "ok";
			};

			Session::put('company',$empresa);

			return Redirect::to($empresa.'/login');
		});


		Route::get('update',function()
		{
			return 	DBupdate::up();
		});


		Route::group(array('prefix'=> Session::get('company') ),function()
		{
			Route::post('login',array('as'=>'post_login', 'uses'=>'LoginController@login'));

			Route::get('login',function(){
				return View::make('login');
			});

			

			Route::group(array('before' => 'auth'), function()
			{
				//Route::get('inicio', array('as'=>'index', 'uses'=>'HomeController@getInicio'));
				Route::get('salir',  array('as'=>'logout', 'uses'=>'LoginController@logOut'));

				Route::group(array('before' => 'auth'), function()
				{
					//Route::get('inicio', array('as'=>'index', 'uses'=>'HomeController@getInicio'));
					Route::get('salir',  array('as'=>'logout', 'uses'=>'LoginController@logOut'));

					Route::get('inicio', function()
					{
						//return Config::get('database');
						return View::make('index');
					});

					Route::post('buscar/', function(){
						
						$input 	= Input::all();
						$model  = $input['model'];
						$search = $input['buscar'];

						return Redirect::route($input['model'],array($model,$search));
					});

					require(__DIR__ . '/routes/items.php');
					require(__DIR__ . '/routes/doctors.php');
					require(__DIR__ . '/routes/clients.php');
					require(__DIR__ . '/routes/purchases.php');
					require(__DIR__ . '/routes/categories.php');
					require(__DIR__ . '/routes/providers.php');
					require(__DIR__ . '/routes/obras.php');

					//config 
					require(__DIR__ . '/routes/config/users.php');

				});
			});
		});



