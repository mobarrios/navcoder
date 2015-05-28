<?php

class MeasurementunitController extends BaseController
{
	protected $data  	 	= array();
	protected $search_by 	= array();

	public function __construct()
	{
		$this->data['module'] 		= Config::get('constants.MEASUREMENTUNIT_MODULE_NAME');
		$this->data['path'] 		= Config::get('constants.MEASUREMENTUNIT_MODULE_PATH');
		$this->data['model'] 		= Config::get('constants.MEASUREMENTUNIT_MODEL_NAME');

		$this->search_by =  array('name');
	}
}

?>