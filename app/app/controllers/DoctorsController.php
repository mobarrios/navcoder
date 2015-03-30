<?php

class DoctorsController extends BaseController
{
	protected $data = array();

	public function __construct()
	{
		$this->data['modal'] 		= 'doctors';
		$this->data['ruta'] 		= 'doctors';
		$this->data['model'] 		= 'Doctors';
		$this->data['modulo'] 		= 'Doctores';
		$this->data['seccion']		= '';
	}
}

?>