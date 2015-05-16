<?php

class RoomsController extends BaseController
{
	protected $data  	 	= array();
	protected $search_by 	= array();
	protected $img_path ;

	public function __construct()
	{
		$this->data['modules_id']	= 1;
		$this->data['modal'] 		= 'rooms';
		$this->data['ruta'] 		= 'rooms';
		$this->data['model'] 		= 'Rooms';
		$this->data['modulo'] 		= 'Habitaciones';
		$this->data['seccion']		= '';

		$this->img_path = Session::get('company')."/uploads/rooms/images/";
		
		$this->search_by =  array('name');
	}

	public function postNew()
	{	
		$image = Input::get('image'); 
		$input = Input::except('image');
	 	
		$model = $this->data['model'];
	 	$model = $model::create($input);

	 	
	 	return Redirect::back();
	}
}

?>
