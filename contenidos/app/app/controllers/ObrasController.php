<?php

class ObrasController extends BaseController
{
	protected $data 		= array();
	protected $search_by 	=  array();
	protected $img_path ;

	public function __construct()
	{
		$this->data['modules_id']	= 10;
		$this->data['modal'] 		= 'obras';
		$this->data['ruta'] 		= 'obras';
		$this->data['model'] 		= 'Obras';
		$this->data['modulo'] 		= 'Obras';
		$this->data['seccion']		= '';

		$this->img_path = Session::get('company')."/uploads/staff/images/";
		$this->search_by = array('name','cuit');
	}
}

?>