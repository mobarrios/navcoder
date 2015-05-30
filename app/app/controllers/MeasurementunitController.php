<?php

class MeasurementunitController extends BaseController
{
	protected $data  	 	= array();
	protected $search_by 	= array();

	public function __construct()
	{
		$modelUpperCase 					= Config::get('constants.MEASUREMENTUNIT_MODEL_NAME_UPPER_CASE');
		$this->data['model'] 				= Config::get('constants.'.$modelUpperCase.'_MODEL_NAME');
		$this->data['module'] 				= Config::get('constants.'.$modelUpperCase.'_MODULE_NAME');
		$this->data['path'] 				= Config::get('constants.'.$modelUpperCase.'_MODULE_PATH');
		$this->data['newPathMethodGet'] 	= Config::get('constants.'.$modelUpperCase.'_NEW_PATH_METHOD_GET');
		$this->data['editPathMethodGet']	= Config::get('constants.'.$modelUpperCase.'_EDIT_PATH_METHOD_GET');
		$this->data['deletePathMethodGet']	= Config::get('constants.'.$modelUpperCase.'_DELETE_PATH_METHOD_GET');
		$this->data['newPathMethodPost']	= Config::get('constants.'.$modelUpperCase.'_NEW_PATH_METHOD_POST');
		$this->data['editPathMethodPost']	= Config::get('constants.'.$modelUpperCase.'_EDIT_PATH_METHOD_POST');
		

		$this->search_by =  array('name');
	}
}

?>