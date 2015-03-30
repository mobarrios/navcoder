<?php

class ProfilesController extends BaseController
{
	protected $data = array();

	public function __construct()
	{
		$this->data['modal'] 		= 'profiles';
		$this->data['ruta'] 		= 'profiles';
		$this->data['model'] 		= 'Profiles';
		$this->data['modulo'] 		= 'Perfiles';
		$this->data['seccion']		= '';
	}

}

?>