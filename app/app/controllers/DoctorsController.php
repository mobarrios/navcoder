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

	public function postNew()
	{
		$plan  = Input::get('planes_id');
		$input = Input::except('planes_id');


		$doctor = new Doctors();
		$doctor = $doctor::create($input);

		foreach($plan as $p => $k)
		{
			$doctors_planes 							= new DoctorsObrasSocialesPlanes();
			$doctors_planes->doctors_id  				= $doctor->id;
			$doctors_planes->obras_sociales_planes_id 	= $p;
			$doctors_planes->save();
		}
		
		return Redirect::back();
	}		
}

?>