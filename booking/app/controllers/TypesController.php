<?php

class TypesController extends BaseController
{
	protected $data  	 	= array();
	protected $search_by 	= array();

	public function __construct()
	{
		$this->data['modules_id'] 	= 7;
		$this->data['modal'] 		= 'types';
		$this->data['ruta'] 		= 'types';
		$this->data['model'] 		= 'Types';
		$this->data['modulo'] 		= 'Tipo de Habitaciones';
		$this->data['seccion']		= '';

		$this->search_by =  array('name');
	}
}

?>