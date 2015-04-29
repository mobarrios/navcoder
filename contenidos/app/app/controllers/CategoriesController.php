<?php

class CategoriesController extends BaseController
{
	protected $data  	 	= array();
	protected $search_by 	= array();

	public function __construct()
	{
		$this->data['modules_id']	= 2;
		$this->data['modal'] 		= 'categories';
		$this->data['ruta'] 		= 'categories';
		$this->data['model'] 		= 'Categories';
		$this->data['modulo'] 		= 'Categorias';
		$this->data['seccion']		= '';

		$this->search_by =  array('name');
	}
}

?>