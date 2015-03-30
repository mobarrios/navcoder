<?php

class ClientsController extends BaseController
{
	protected $data = array();

	public function __construct()
	{
		$this->data['modal'] 		= 'clients';
		$this->data['ruta'] 		= 'clients';
		$this->data['model'] 		= 'Clients';
		$this->data['modulo'] 		= 'Clientes';
		$this->data['seccion']		= '';
	}

	public function getCc($id)
	{
		$data['client'] = Clients::find($id);
		$data['cc']     = 0;

		return View::make('clients.clients_cc')->with($data);
	}

	public function postPayment()
	{

		$payment = new ClientsPayment();
		$payment->fill(Input::all());
		$payment->save();

		return Redirect::back(); 
	}
}