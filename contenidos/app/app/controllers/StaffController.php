<?php

class StaffController extends BaseController
{
	protected $data  	 	= array();
	protected $search_by 	= array();
	protected $img_path ;

	public function __construct()
	{
		$this->data['modules_id']	= 13;
		$this->data['modal'] 		= 'staff';
		$this->data['ruta'] 		= 'staff';
		$this->data['model'] 		= 'Staff';
		$this->data['modulo'] 		= 'Staff';
		$this->data['seccion']		= '';

		$this->img_path = Session::get('company')."/uploads/staff/images/";
		
		$this->search_by =  array('name','last_name');
	}

	
}

?>