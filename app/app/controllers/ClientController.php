<?php

class ClientController extends BaseController
{
	protected $data		 = array();
	protected $search_by =  array();

	public function __construct()
	{
		$modelUpperCase 					= Config::get('constants.CLIENT_MODEL_NAME_UPPER_CASE');
		$this->data['model'] 				= Config::get('constants.'.$modelUpperCase.'_MODEL_NAME');
		$this->data['module'] 				= Config::get('constants.'.$modelUpperCase.'_MODULE_NAME');
		$this->data['path'] 				= Config::get('constants.'.$modelUpperCase.'_MODULE_PATH');
		$this->data['newPathMethodGet'] 	= Config::get('constants.'.$modelUpperCase.'_NEW_PATH_METHOD_GET');
		$this->data['editPathMethodGet']	= Config::get('constants.'.$modelUpperCase.'_EDIT_PATH_METHOD_GET');
		$this->data['deletePathMethodGet']	= Config::get('constants.'.$modelUpperCase.'_DELETE_PATH_METHOD_GET');
		$this->data['newPathMethodPost']	= Config::get('constants.'.$modelUpperCase.'_NEW_PATH_METHOD_POST');
		$this->data['editPathMethodPost']	= Config::get('constants.'.$modelUpperCase.'_EDIT_PATH_METHOD_POST');

		$this->search_by = array('name','last_name','dni','company_name','cuit');
	}

	public function getCc($id)
	{
		$data['client'] = Clients::find($id);
		$data['cc']     = 0;

		return View::make('clients.clients_cc')->with($data);
	}

	public function postPayment()
	{
		$input = Input::all();

		$payment = new ClientsPayment();
		$payment->fill(Input::all());
		$payment->save();

		// ingreso en caja diaria el pago efectivo
		if($input['payment_method'] == '1')
		{
			$caja  				= new Caja();
			$caja->date 		= $input['date'];
			$caja->description 	= 'Pago Remito Nro.'.$input['sales_id'] .': '.$input['detail'];
			$caja->in 			= $input['amount'];
			$caja->save();
		}
		


		return Redirect::back(); 
	}
}