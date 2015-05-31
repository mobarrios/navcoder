<?php

class MedicalinsuranceController extends BaseController
{
	protected $data 		= array();
	protected $search_by 	=  array();

	public function __construct()
	{
		error_log("Modelo desde el controlador : ".Config::get('constants.MEDICALINSURANCE_MODEL_NAME'));
		$this->data = BaseController::setDataArray(Config::get('constants.MEDICALINSURANCE_MODEL_NAME'));

		$this->search_by = array('name','cuit');
	}
}