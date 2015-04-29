<?php

class ProvidersController extends BaseController
{
	protected $data = array();
	protected $search_by 	=  array();

	public function __construct()
	{
		$this->data['modules_id']	= 5;
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

		$this->search_by = array('name','last_name','dni','email','company_name','cuit');
	}
}

?>