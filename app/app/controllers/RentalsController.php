<?php
class RentalsController extends BaseController
{
	protected $data 	= array();

    //protected $moduleId ;
	protected $search_by 	=  array();

	public function __construct()
	{
		$this->data['modules_id']	= 7;
		$this->data['modal'] 		= 'rentals';
		$this->data['ruta'] 		= 'rentals';
		$this->data['model'] 		= 'Rentals';
		$this->data['modulo'] 		= 'Alquileres';
		$this->data['seccion']		= '';

		$this->search_by = array('rentals_date','clients_id');
	}

	public function getCancel()
	{
		Session::forget('array_items');
		Session::forget('array_total');
		Session::forget('data');

		return Redirect::back()->with('success',"Alquiler Cancelado");
	}

	public function getList($model= null , $search = null)
	{
		$model 						= $this->data['model'];
		$this->data['seccion']		= 'Inicio';

		if(isset($search))
		{
			
			$mod  = $model::where('id','like','%'.$search.'%');
			
			foreach($this->search_by as $col)
			{
				$mod = $mod->orWhere($col,'like','%'.$search.'%');
			
			}

			$mod  = $mod->paginate('10');

			$this->data['model'] = $mod;
			
		}
		else
		{
			$this->data['model'] 	= $model::orderBy('id' ,'ASC')->paginate('10');
		}

			
		//return View::make('view')->with($this->data);		
		return View::make('rentals.rentals_view')->with($this->data);
	}

	//SANCUS
	public function getProcessSancus()
	{
		//return Redirect::to('inicio');
		$datos = Session::get('data');
		$total = Session::get('array_total');
		$items = Session::get('array_items');



		$rental 			  		= new Rentals();
		$rental->rentals_date  		= $datos['date'];
		$rental->rentals_to 		= $datos['to'];
		$rental->amount	  			= $total;
		$rental->clients_id  		= $datos['client_id'];
		$rental->doctors_id 		= $datos['doctor_id'];
		$rental->save();

		foreach($items as $item => $key)
		{
			$items 					= new RentalsItems();
			$items->quantity 		= $key['cantidad'];	
			$items->observations 	= $key['observations'];
			$items->price_per_unit  = $key['$'];
			$items->rentals_id 		= $rental->id;
			$items->items_id 		= $key['item_id'];
			$items->save();


			// resta la cantidad del stock del articulo
			$item_stock 			= Items::find($key['item_id']);
			$item_stock->stock 		= $item_stock->stock - $key['cantidad'];
			$item_stock->save() ;

		}	

		Session::forget('array_items');
		Session::forget('array_total');
		Session::forget('data');

		return Response::json($rental->id);
	}



	public function getRemito($id)
	{	
		$purchase_id = $id;

		$data['rentals'] 	= Rentals::find($id);
		$data['company']	= Company::all()->first();
		$data['total']		= 0;
		$data['totaltotal'] = 0;

		$pdf = PDF::loadView('remito.remito_rental',$data)->stream('remito.pdf');

		return $pdf;

	}
	/*
	public function newPurchase()
	{
		$this->data['seccion']		= 'Nueva';
		
		return View::make('purchases.purchases_new')->with($this->data);
	}


	//*************************************************************************


   
   /* public function __construct()
    {
        $this->moduleId = Module::where('name','=',$this->module)->first()->id;
    }
	*/

	/*
	public function getIndex()
	{
	
		/* Validation Mechanism read, add, delete, edit 

		$data['module'] = $this->module;

		return View::make('stock.purchase.index')->with($data);
	}
	*/

	public function getNew()
	{
		$this->data['seccion']		= 'Nueva';
		
		/*
		if(!Session::has('purchase_temporal_id'))
		{
			$purchase_temporal = new PurchasesTemporal();
			$purchase_temporal->save();
			// We must delete any temporal id saved, and set the session attribute again
			Session::put('purchase_temporal_id',$purchase_temporal->id);
		}
		*/
			
		if(Session::get('company') == 'sancus')
		{
			return View::make('rentals.rentals_sancus_new')->with($this->data);
		}

		return View::make('rentals.rentals_new')->with($this->data);
	}


	// SANCUS ADD ITEM
	public function postAdditemSancus()
	{
		$date_rentals		= Input::get('date');
		$to_rentals			= Input::get('to');

		$cant 				= ( $to_rentals - $date_rentals ) ;

		$client_id_rentals = Input::get('client_id');
		$doctor_id_rentals = Input::get('doctor_id');

		//datos del remito
			if(!Session::has('data'))
			{	
				$client 	= Clients::find($client_id_rentals);
				$doctor 	= Doctors::find($doctor_id_rentals);

				$data 		= array('date'			=> $date_rentals,
									'to'			=> $to_rentals,
									'client_id'		=> $client_id_rentals, 
									'doctor_id'		=> $doctor_id_rentals, 
									'client_name'	=> $client->name.' '. $client->last_name .' - '. $client->company_name,
									'doctor_name'	=> $doctor->name.' '. $doctor->last_name .' - '. $doctor->company_name,
									);

				Session::put('data',$data);
			}
			

			//items de remito
			
			$item 			= Items::find(Input::get('item_id'));

			if(!Session::has('array_items'))
			{	
				$array_items 	= array();
			}
			else
			{
				$array_items 	= Session::get('array_items');
			}


			$item 	= array('item_id'		=> Input::get('item_id'),
							'code'			=> $item->code, 
							'description' 	=> $item->name .' '.$item->description, 
							'$' 			=> Input::get('price_per_unit'),
							'cantidad' 		=> $cant,
							'observations'	=> Input::get('observations'), 
							'subtotal' 		=> Input::get('price_per_unit') * $cant
							);

			array_push($array_items, $item);

			Session::put('array_items',$array_items);

			$total = 0;

			foreach($array_items as $item => $key) 
			{
				$total = $total + $key['subtotal'];
			}
		
			Session::put('array_total',$total);

		return Redirect::back()->withInput();



	}

	

	public function getDelitem($id = null)
	{
		$array_items = Session::get('array_items');
		
		unset($array_items[$id]);

		Session::put('array_items',$array_items);

		$total = 0;

		foreach($array_items as $item => $key) 
		{
			$total = $total + $key['subtotal'];
		}	

		Session::put('array_total',$total);


		return Redirect::back();
	}


	public function postDeleteitem()
	{
		
		$input 			= Input::all();
		$item_id		= Crypt::decrypt($input['item_id']);

		SalesItems::find($item_id)->delete();

		$data['module'] = $this->module;
		$data['total']  = null;

		return View::make('stock.sales.new')->with($data);
	}


	

	//*************************************************************************

}