<?php

class CajaController extends BaseController
{
	protected $data  	 	= array();
	protected $search_by 	= array();

	public function __construct()
	{
		$this->data['modal'] 		= 'caja';
		$this->data['ruta'] 		= 'caja';
		$this->data['model'] 		= 'Caja';
		$this->data['modulo'] 		= 'Caja';
		$this->data['seccion']		= '';

		$this->search_by =  array('description','date');
	}
}

?>