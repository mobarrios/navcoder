<?php

class ObrasController extends BaseController
{
	protected $data 		= array();
	protected $search_by 	=  array();

	public function __construct()
	{
		$this->data['modal'] 		= 'obras';
		$this->data['ruta'] 		= 'obras';
		$this->data['model'] 		= 'Obras';
		$this->data['modulo'] 		= 'Obras';
		$this->data['seccion']		= '';

		$this->search_by = array('name','cuit');
	}
}

?>