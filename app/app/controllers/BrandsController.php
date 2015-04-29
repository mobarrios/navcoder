<?php

class BrandsController extends BaseController
{
	protected $data  	 	= array();
	protected $search_by 	= array();
	protected $img_path ;

	public function __construct()
	{
		$this->data['modules_id']	= 12;
		$this->data['modal'] 		= 'brands';
		$this->data['ruta'] 		= 'brands';
		$this->data['model'] 		= 'Brands';
		$this->data['modulo'] 		= 'Marcas';
		$this->data['seccion']		= '';

		$this->img_path = Session::get('company')."/uploads/brands/images/";
		
		$this->search_by =  array('name');
	}

	
}

?>