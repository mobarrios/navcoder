<?php

class DoctorsController extends BaseController
{
	protected $data = array();
	protected $search_by =  array();

	public function __construct()
	{
		$this->data['modules_id']	= 9;
		$this->data['modal'] 		= 'doctors';
		$this->data['ruta'] 		= 'doctors';
		$this->data['model'] 		= 'Doctors';
		$this->data['modulo'] 		= 'Doctores';
		$this->data['seccion']		= '';

		$this->search_by = array('name','last_name','dni','license');
	}
}

?>