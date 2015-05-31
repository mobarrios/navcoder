<?php

class ProviderController extends BaseController
{
	protected $data = array();
	protected $search_by 	=  array();

	public function __construct()
	{
		//setup data array
		$this->data = BaseController::setDataArray(Config::get('constants.PROVIDER_MODEL_NAME'));

		$this->search_by = array('name','last_name','dni','email','company_name','cuit');
	}
}

?>