<?php
class SaleController extends BaseController
{


	//**************************************************************************

	protected $module = 'sale';
    protected $moduleId ;

   
    public function __construct()
    {
        $this->moduleId = Module::where('name','=',$this->module)->first()->id;
    }
	

	public function getIndex()
	{
		 /* Mecanismo de validación read, add, delete, edit */
		if(!parent::validarPermisos($this->moduleId, 'read'))
        {
            return Redirect::back()->with('warning','Acceso denegado a esta seccion');
        }		 
		
		$data['model']	= Sales::all();
		$data['module'] = $this->module;

		return View::make('stock.sale.index')->with($data);
	}


	public function getNew()
	{
		/* Mecanismo de validación read, add, delete, edit */
		if(!parent::validarPermisos($this->moduleId, 'add'))
        {
            return Redirect::back()->with('warning','Acceso denegado a esta seccion');
        }
		

		$action         			= 'create';
		$sale_temporal  			= new SalesTemporal();
		$sale_temporal->save();

		// We must delete any temporal id saved, and set the session attribute again

		Session::put('sale_temporal_id',$sale_temporal->id);


		$data['action']  	= $action;
		$data['model']	 	= $sale_temporal;
		$data['module']  	= $this->module;
		//$data['items']   	= Item::lists('name','id');
		//$data['clients'] 	= Client::lists('name','id');
		$data['total']   	= null;


		return View::make('stock.sale.new')->with($data);
	}


	public function postAdditem()
	{
		$sale_temporal_id				= Session::get('sale_temporal_id');
		$input 							= Input::all();

		$sales_items 					= new SalesItems(); 
		$sales_items->item_id 			= $input['item_id'];
		$sales_items->sale_temporal_id 	= $sale_temporal_id;
		$sales_items->quantity 			= $input['quantity'];
		$sales_items->discount 			= $input['discount'];
		$sales_items->price_per_unit	= Item::find($sales_items->item_id)->sell_price;
		$sales_items->save();


		$data['module']  = $this->module;
		$data['total']   = null;

		return View::make('stock.sale.new')->with($data);
	}


	public function postDeleteitem()
	{
		
		$input 			= Input::all();
		$item_id		= Crypt::decrypt($input['item_id']);

		SalesItems::find($item_id)->delete();

		$data['module'] = $this->module;
		$data['total']  = null;

		return View::make('stock.sale.new')->with($data);
	}


	public function postNewsale()
	{

		$sale_temporal_id	= Session::get('sale_temporal_id');
		$salesitems 		= SalesItems::where('sale_temporal_id','=',$sale_temporal_id)->get();
		
		$amount 	 	  = 0;

		// Calculating amount
		foreach( $salesitems as $sales_item )
		{
			$amount = $amount + ( $sales_item->price_per_unit * $sales_item->quantity * ( 1 - $sales_item->discount * 0.01 ) );
		}

		// Check if the sale has items
		if(count($salesitems) < 1)
		{
			return Redirect::to('sale/new')->with('warning',"La venta debe tener por lo menos un articulo de compra");
		}

		$input 			  = Input::all();
	
		$model			  = SalesTemporal::find($sale_temporal_id);
		$model->sale_date = $input['date'];		
		$model->amount    = $amount;
		$model->client_id = $input['client_id'];
		
		$sale 			  = new Sales();
		$sale->sale_date  = $model->sale_date;
		$sale->amount	  = $model->amount;
		$sale->client_id  = $model->client_id;
		$sale->save();

		$model->sale_id   = $sale->id;

		$model->update();

		foreach( $salesitems as $sales_item )
		{
			$sales_item->sale_id = $sale->id;
			$sales_item->update();
		}


		return Redirect::to('sale')->with('success',"Venta Numero: $sale->id  Creada Correctamente");
		

	}


	public function getView($id)
	{
		$id 			= Crypt::decrypt($id);

		$model 			= Sales::find($id);

		$data['model'] 	= $model;
		$data['module'] = $this->module;
		$data['total']   = null;

		return View::make('stock.sale.view')->with($data);
	}

	
	//**************************************************************************


}
?>