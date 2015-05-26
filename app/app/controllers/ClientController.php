<?php

class ClientController extends BaseController
{
	protected $data		 = array();
	protected $search_by =  array();

	public function __construct()
	{
		$this->data['modal'] 		= 'clients';
		$this->data['ruta'] 		= 'clients';
		$this->data['model'] 		= 'Clients';
		$this->data['modulo'] 		= 'Clientes';
		$this->data['seccion']		= '';

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