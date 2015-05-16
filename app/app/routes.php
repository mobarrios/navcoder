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

Route::get('excel/{a}/{b}/{c}',function($a = null , $b = null, $c = null)
{
		$arr = Excel::load('public/lista.xls')->get();

		foreach($arr as $ar => $val)
		{
			  echo "codigo : ".$val[$a] ." Precio : ". $val[$b]." publico :".$val[$c]." <br>";

		}

		/*
		Excel::create('Filename', function($excel) {

		$excel->sheet('Sheetname', function($sheet) {

		$sheet->fromArray(array(
		    array('data1', 'data2'),
		    array('data3', 'data4')
		));

		});

		})->export('xls');
		*/


});

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
Route::group(array('prefix' => 'api/v1'), function()
{

	Route::get('app/{search}',function($search){

 		 header('Access-Control-Allow-Origin: *');	

 		 if($search == 'all')
 		 {
 		 	$item = Items::all();
 		 }
 		 else
 		 {
 			$item = Items::where('code','like','%'.$search.'%')->orWhere('name','like','%'.$search.'%')->orWhere('description','like','%'.$search.'%')->first();	 	
 		 }
		
	
		

		return Response::json($item);

	});
});

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

Route::get('login',function()
{
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

				require(__DIR__ . '/routes/items.php');
				require(__DIR__ . '/routes/doctors.php');
				require(__DIR__ . '/routes/clients.php');
				require(__DIR__ . '/routes/purchases.php');
				require(__DIR__ . '/routes/categories.php');
				require(__DIR__ . '/routes/providers.php');
				require(__DIR__ . '/routes/obras.php');
				require(__DIR__ . '/routes/sales.php');
				require(__DIR__ . '/routes/caja.php');
				require(__DIR__ . '/routes/brands.php');

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
							$cost = $r->cost_price;
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
			DBupdate::create();
				
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



