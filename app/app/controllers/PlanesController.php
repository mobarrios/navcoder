<?php

class PlanesController extends BaseController
{
	protected $data 		= array();
	protected $search_by 	=  array();

	public function __construct()
	{
		$this->data['modules_id']	= 10;
		$this->data['modal'] 		= 'planes';
		$this->data['ruta'] 		= 'planes';
		$this->data['model'] 		= 'Planes';
		$this->data['modulo'] 		= 'Planes';
		$this->data['seccion']		= '';

		$this->search_by = array('name');
	}

	//open form modal
	public function formModal($id = null)
	{
		$model 					= $this->data['model'];

		$this->data['seccion']	= 'Nuevo';
		$this->data['id_obras'] = $id;


		return View::make('modal')->with($this->data);
	}


}

?>