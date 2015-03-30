<?php

class ProvidersController extends BaseController
{
	protected $data = array();

	public function __construct()
	{
		//Route for modal include
		$this->data['modal'] 		= 'providers';
		
		// Route for the routes file
		$this->data['ruta'] 		= 'providers';
		
		// Model Name
		$this->data['model'] 		= 'Providers';

		// Module that appears at the view
		$this->data['modulo'] 		= 'Proveedores';
		
		// Variable that tells where to go according to the function, edit, new, delete
		$this->data['seccion']		= '';
	}
}

?>