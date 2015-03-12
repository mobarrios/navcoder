<?php

class ObrasController extends BaseController
{
	protected $data = array();

	public function __construct()
	{
		$this->data['modal'] 		= 'obras';
		$this->data['ruta'] 		= 'obras';
		$this->data['model'] 		= 'Obras';
		$this->data['modulo'] 		= 'Obras';
		$this->data['seccion']		= '';
	}
}

?>