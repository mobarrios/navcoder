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

Route::get('image', function()
{
    $img = Image::make('assets/images/logo_aclv.png');

    return $img->response('jpg');
});


Route::get('barcode',function(){

echo DNS1D::getBarcodeHTML("444511111111", "EAN13");
echo DNS2D::getBarcodeHTML("alejandro", "QRCODE");

return ;
});

/// WEB SERVICE API REST FULL
Route::group(array('prefix' => 'api'), function()
{
	Route::get('search/types',function()
	{
 		 header('Access-Control-Allow-Origin: *');	

 		 $types = Types::all();
 	
		 return Response::json($types);
	});

	Route::get('reservation_form/{id}',function($id){

		$data['id'] = Availables::find($id);

		$from 		= new DateTime(Session::get('from'));
		$to 		= new DateTime(Session::get('to'));

		$interval 	= $from->diff($to);

		Session::put('total_days',$interval->days);

		return View::make('front.reservation_form')->with($data);
	});

	Route::post('search/availables',function()
	{		
 		header('Access-Control-Allow-Origin: *');	

 		$from 	= Input::get('from');
 		$to 	= Input::get('to');
 		$type 	= Input::get('type');

 		Session::put('from', $from);
 		Session::put('to',   $to);

 		//$type  			= Types::where('name','=',$type)->first()->id;
 		//$data['rooms'] 	= Rooms::where('types_id','=',$type)->get();
 		$data['types']			= $type;

 		$data['availables'] 	= Availables::where('from','<=',date("Y-m-d",strtotime($from)))->where('to','>=',date("Y-m-d",strtotime($to)))->get();

 		//$a = Availables::join('rooms','availables.rooms_id','=',1)->get();


 		return View::make('front.search_result')->with($data);
 	

		 // return Response::json($res);
	});
});


/*
Route::get('empresa/{company}',function($company)
{

	switch ($company) 
	{
		case 'sancus':
				Session::put('db','admin_sancus');
				Session::put('company','sancus');

				return Redirect::to('login');
				break;

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
				Session::put('company','stock');
				
				return Redirect::to('login');
				break;
	}
});
*/

Route::get('login',function()
{
	Session::put('db','admin_booking');
	Session::put('company','booking');

	return View::make('login');
});

			
// todo lo que esta aca adentro previo cambio de DB

Route::group(array('before'=>'switchDB'),function()
{

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

				require(__DIR__ . '/routes/rooms.php');
				require(__DIR__ . '/routes/availables.php');
				require(__DIR__ . '/routes/reservations.php');
				require(__DIR__ . '/routes/paxs.php');
				require(__DIR__ . '/routes/types.php');

				//config 
				require(__DIR__ . '/routes/config/users.php');
				require(__DIR__ . '/routes/config/profiles.php');
				require(__DIR__ . '/routes/config/permissions.php');


				//require(__DIR__ . '/routes/config/ajax.php');
		});

		// ajax search	

		Route::post('buscar', function()
		{				
			$input 	= Input::all();
			$model  = $input['model'];
			$search = $input['buscar'];

			return Redirect::route($input['model'],array($model,$search));
		});

		Route::post('buscar_sales', function()
		{				
			$input 				= Input::all();
			$data['modules_id'] = 7;
			$data['modulo'] 	= 'Ventas';
			$data['ruta'] 		= 'sales';
			$data['seccion']	= 'Inicio';

			if($input['from'] != "" || $input['to'] != "")
			{
				$data['model']		=  Sales::whereBetween('sales_date', array( date("Y-m-d",strtotime($input['from'])), date("Y-m-d",strtotime($input['to'])) ))->paginate(10);	
			
			}else{

				$data['model']		=  Sales::paginate(10);
			}
			
			return View::make('sales.sales_view')->with($data);
		});

		Route::post('buscar_purchases', function()
		{				
			$input 				= Input::all();
			$data['modules_id'] = 8;
			$data['modulo'] 	= 'Compras';
			$data['ruta'] 		= 'purchases';
			$data['seccion']	= 'Inicio';

			if($input['from'] != "" || $input['to'] != "")
			{
				$data['model']		=  Purchases::whereBetween('purchases_date', array( date("Y-m-d",strtotime($input['from'])), date("Y-m-d",strtotime($input['to'])) ))->paginate(10);	
			
			}else{

				$data['model']		=  Purchases::paginate(10);
			}
			
			return View::make('purchases.purchases_view')->with($data);
		});



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
					$res[] = array('id' => $r->id , 'label' => $r->name .' '.$r->last_name . ' - '.$r->company_name );
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
					$res[] = array('id' => $r->id , 'label' => $r->name .' '.$r->last_name.' - '.$r->company_name );
					//$res[] = array('id'=>$r->id, 'name'=>$r->company_name );
				}

				return Response::json($res);
		});


		Route::post('item_search',function()
		{
				$data 			= Input::get('search');
				$purchase 		= Input::get('purchase');
				$providers_id 	= Input::get('providers_id');

				$resp 		= Items::where('code','like','%'.$data.'%')
							->orWhere('name','like','%'.$data.'%')
							->orWhere('description','like','%'.$data.'%')
							->get();

				$res =  array();

				foreach($resp as $r)
				{
					if($purchase)
					{
						$cost  = ItemsProviders::where('items_id','=',$r->id)->where('providers_id','=',$providers_id)->first();
						
						if(is_null($cost))
						{
							$cost = 0;
						}
						else
						{
							$cost = $cost->cost_price;
						}
					

						$res[] = array(	'id' => $r->id , 
									'label' => $r->name .'$ ' . $cost , 
									'value' => $r->name ,
									'cost_price' => $cost
									);
					}
					else
					{
						$res[] = array(	'id' => $r->id , 
									'label' => $r->name .'$ ' . $r->sell_price , 
									'value' => $r->name ,
									'sell_price' => $r->sell_price
									);
					}
				}

				return Response::json($res);
		});

	
		// update database

		Route::get('create',function()
		{

			dbConfig::create();
			dbBooking::createBooking();

			//DBupdate::create();
				
			//DBupdate::update();
			return "created OK";
		});

		Route::get('update',function()
		{
			DBupdate::update();
				
			//DBupdate::update();
			return "updated OK";
		});

	});



