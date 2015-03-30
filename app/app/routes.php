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

/// WEB SERVICE API REST FULL
Route::group(array('prefix' => 'api/v1'), function()
{

	Route::get('app/{search}',function($search){

 		 header('Access-Control-Allow-Origin: *');	
		
		$item = Items::where('code','like','%'.$search.'%')->orWhere('name','like','%'.$search.'%')->orWhere('description','like','%'.$search.'%')->get();

		

		return Response::json($item);

	});
});

Route::get('empresa/{company}',function($company)
{

	switch ($company) 
	{
		case 'laregaleria':
				Session::put('db','admin_laregaleria');
				Session::put('company','laregaleria');

				return Redirect::to('login');
				break;

		case 'aclv':
				Session::put('db','admin_aclv');
				Session::put('company','aclv');

				return Redirect::to('login');
				break;
		
		default:
				Session::put('db','admin_stock');
				return Redirect::to('login');
				break;
	}
});

Route::get('login',function()
{
	return View::make('login');
});

			
// todo lo que esta aca adentro previo cambio de DB

Route::group(array('before'=>'switchDB'),function()
{
		
			Route::get('ajax',function(){

				//$j = array('data'=> array(array('id'=>'2','name'=>'Tiger Nixon')));

				$m = Items::all();

				
				$mod = array();

				foreach($m as $model)
				{
					array_push($mod, array('id' => $model->id ,'name'=> $model->name));
				}

				$items['data'] = $mod;

			
			return Response::json($items);

			});

			Route::get('table',function(){
			return View::make('table');
			});


		//postea el login 
		Route::post('login',array('as'=>'post_login', 'uses'=>'LoginController@login'));

		
		Route::group(array('before' => 'auth'), function()
		{

				Route::get('salir',  array('as'=>'logout', 'uses'=>'LoginController@logOut'));

				Route::get('inicio', function()
				{
					$data['master'] = Company::all()->first();

					return View::make('index')->with($data);
				});

				Route::post('buscar/', function()
				{				
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
				require(__DIR__ . '/routes/sales.php');

				//config 
				require(__DIR__ . '/routes/config/users.php');
				require(__DIR__ . '/routes/config/profiles.php');
				require(__DIR__ . '/routes/config/permissions.php');
		});

		// ajax search	
		Route::post('provider_search',function()
		{
				$data = Input::get('search');

				$resp = Providers::where('name','like','%'.$data.'%')
						->orWhere('last_name','like','%'.$data.'%')
						->orWhere('dni','like','%'.$data.'%')
						->get();

				$res  = array();

				foreach($resp as $r)
				{
					//array_push($res, $r->last_name.' , '.$r->name );
					$res[] = array('id' => $r->id , 'label' => $r->company_name );
					//$res[] = array('id'=>$r->id, 'name'=>$r->company_name );
				}

				return Response::json($res);
		});

		Route::post('client_search',function()
		{
				$data = Input::get('search');

				$resp = Clients::where('name','like','%'.$data.'%')
						->orWhere('last_name','like','%'.$data.'%')
						->orWhere('dni','like','%'.$data.'%')
						->get();

				$res  = array();

				foreach($resp as $r)
				{
					//array_push($res, $r->last_name.' , '.$r->name );
					$res[] = array('id' => $r->id , 'label' => $r->company_name );
					//$res[] = array('id'=>$r->id, 'name'=>$r->company_name );
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
					$res[] = array(	'id' => $r->id , 
									'label' => $r->name .'$ ' . $r->sell_price , 
									'value' => $r->name ,
									'sell_price' => $r->sell_price);
				}

				return Response::json($res);
		});

		// update database

		Route::get('update',function()
		{
			DBupdate::update();
			return "updated OK";
		});

	});



