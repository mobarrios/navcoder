<?php

class CategoriesController extends BaseController
{
	protected $data = array();

	public function __construct()
	{
		$this->data['ruta'] 		= 'categories';
		$this->data['model'] 		= 'Categories';
		$this->data['modulo'] 		= 'Categorias';
		$this->data['seccion']		= '';
	}
}

?>