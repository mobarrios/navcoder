<?php

class DoctorController extends BaseController
{
	protected $data = array();
	protected $search_by =  array();

	public function __construct()
	{
		$this->data['modal'] 		= 'doctors';
		$this->data['ruta'] 		= 'doctors';
		$this->data['model'] 		= 'Doctors';
		$this->data['modulo'] 		= 'Doctores';
		$this->data['seccion']		= '';

		$this->search_by = array('name','last_name','dni','license');
	}
}

?>