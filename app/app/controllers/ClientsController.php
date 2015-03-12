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
}