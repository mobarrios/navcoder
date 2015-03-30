<?php
class SalesController extends BaseController
{
	protected $data 	= array();

    //protected $moduleId ;

	public function __construct()
	{
		$this->data['modal'] 		= 'sales';
		$this->data['ruta'] 		= 'sales';
		$this->data['model'] 		= 'Sales';
		$this->data['modulo'] 		= 'Ventas';
		$this->data['seccion']		= '';
	}

	public function getList($model= null , $search = null)
	{
		$model 						= $this->data['model'];
		
		$this->data['seccion']		= 'Inicio';

		if(isset($search))
		{
			$this->data['model'] 	= $model::where('id' ,'like','%'.$search.'%')->orderBy('id' ,'ASC')->paginate('10');
		}
		else
		{
			$this->data['model'] 	= $model::orderBy('id' ,'ASC')->paginate('10');
		}

			
		return View::make('view')->with($this->data);		
	}

	public function getProcess()
	{
		//return Redirect::to('inicio');
		$datos = Session::get('data');
		$total = Session::get('array_total');
		$items = Session::get('array_items');

		$sale 			  		= new Sales();
		$sale->sales_date  		= $datos['date'];
		$sale->amount	  		= $total;
		$sale->clients_id  		= $datos['client_id'];
		$sale->save();

		foreach($items as $item => $key)
		{
			$items 					= new SalesItems();
			$items->quantity 		= $key['cantidad'];	
			$items->observations 	= $key['observations'];
			$items->price_per_unit  = $key['$'];
			$items->sales_id 		= $sale->id;
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

		return Response::json($sale->id);
	}


	public function getRemito($id)
	{	
		$purchase_id = $id;

		$data['sales'] 		= Sales::find($id);
		$data['company']	= Company::all()->first();
		$data['total']		= 0;
		$data['totaltotal'] = 0;

		$pdf = PDF::loadView('remito.remito_sale',$data)->stream('remito.pdf');

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
		
		return View::make('sales.sales_new')->with($this->data);
	}


	public function postAdditem()
	{
		$date_sales		 = Input::get('date');
		$client_id_sales = Input::get('client_id');

		//datos del remito
			if(!Session::has('data'))
			{	
				$client 	= Clients::find($client_id_sales);
				$data 		= array('date'			=> $date_sales,
									'client_id'		=> $client_id_sales, 
									'client_name'	=> $client->name.','. $client->las_name
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
							'description' 	=> $item->description, 
							'$' 			=> Input::get('price_per_unit'),
							'cantidad' 		=> Input::get('cantidad'), 
							'observations'	=> Input::get('observations'), 
							'subtotal' 		=> Input::get('price_per_unit') * Input::get('cantidad')
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

		// ok ale
		/*
		$purchase_temporal_id					= Session::get('purchase_temporal_id');
		$input 									= Input::all();

		$purchases_items 							= new PurchasesItems();

		$purchases_items->items_id 					= $input['item_id'];

		$purchases_items->purchases_temporal_id 	= $purchase_temporal_id;

		$purchases_items->quantity 					= $input['quantity'];

		$purchases_items->discount 					= $input['discount'];

		$purchases_items->price_per_unit			= Items::find($purchases_items->items_id)->cost_price;

		

		$purchases_items->save();

			
		return Response::json($purchases_items);

		//$data['module']  = $this->module;
		//$data['total']   = null;

		return Response::json($purchases_items);

		return View::make('stock.purchase.new')->with($data);
		*/
		

	
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


	public function postNewsales()
	{


		$sales_temporal_id		= Session::get('purchase_temporal_id');
		$purchasesitems 		= PurchasesItems::where('purchase_temporal_id','=',$purchase_temporal_id)->get();
		
		$amount 	 	 		 = 0;

		// Calculating amount
		foreach( $purchasesitems as $purchases_item )
		{
			$amount = $amount + ( $purchases_item->price_per_unit * $purchases_item->quantity * ( 1 - $purchases_item->discount * 0.01 ) );
		}

		// Check if the purchase has items
		if(count($purchasesitems) < 1)
		{
			return Redirect::to('purchase/new')->with('warning',"La compra debe tener por lo menos un articulo");
		}

		$input 			  		= Input::all();
	
		$model			  		= PurchasesTemporal::find($purchase_temporal_id);
		$model->purchase_date 	= $input['date'];		
		$model->amount    		= $amount;
		$model->provider_id 	= $input['provider_id'];
		
		$purchase 			  		= new Purchases();
		$purchase->purchase_date  	= $model->purchase_date;
		$purchase->amount	  		= $model->amount;
		$purchase->provider_id  	= $model->provider_id;
		$purchase->save();

		$model->purchase_id   		= $purchase->id;

		$model->update();

		foreach( $purchasesitems as $purchases_item )
		{
			$purchases_item->purchase_id = $purchase->id;
			$purchases_item->update();
		}

		return Redirect::to('purchase')->with('success',"Venta Numero: $purchase->id  Creada Correctamente");

	}


	public function getView($id)
	{
		$id 			= Crypt::decrypt($id);

		$model 			= Purchases::find($id);

		$data['model'] 	= $model;
		$data['module'] = $this->module;
		$data['total']  = null;

		return View::make('stock.sales.view')->with($data);
	}


	//*************************************************************************

}