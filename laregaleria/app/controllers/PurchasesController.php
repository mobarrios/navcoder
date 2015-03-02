<?php

class PurchasesController extends BaseController
{
	protected $data 	= array();
	protected $module 	= 'purchase';
    //protected $moduleId ;

	public function __construct()
	{
		$this->data['ruta'] 		= 'purchases';
		$this->data['model'] 		= 'Purchases';
		$this->data['modulo'] 		= 'Compras';
		$this->data['seccion']		= '';
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
		

		if(!Session::has('purchase_temporal_id')){

			$purchase_temporal = new PurchasesTemporal();
			$purchase_temporal->save();

			// We must delete any temporal id saved, and set the session attribute again
			Session::put('purchase_temporal_id',$purchase_temporal->id);
		}
		
		return View::make('purchases.purchases_new')->with($this->data);
	}


	public function postAdditem()
	{

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
	}


	public function postDeleteitem()
	{
		
		$input 			= Input::all();
		$item_id		= Crypt::decrypt($input['item_id']);

		PurchasesItems::find($item_id)->delete();

		$data['module'] = $this->module;
		$data['total']  = null;

		return View::make('stock.purchase.new')->with($data);
	}


	public function postNewpurchase()
	{


		$purchase_temporal_id	= Session::get('purchase_temporal_id');
		$purchasesitems 		= PurchasesItems::where('purchase_temporal_id','=',$purchase_temporal_id)->get();
		
		$amount 	 	  = 0;

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
		$model->provider_id 		= $input['provider_id'];
		
		$purchase 			  	= new Purchases();
		$purchase->purchase_date  	= $model->purchase_date;
		$purchase->amount	  		= $model->amount;
		$purchase->provider_id  		= $model->provider_id;
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

		return View::make('stock.purchase.view')->with($data);
	}


	//*************************************************************************

}