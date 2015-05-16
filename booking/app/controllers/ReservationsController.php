<?php

class ReservationsController extends BaseController
{
	protected $data  	 	= array();
	protected $search_by 	= array();
	protected $img_path ;

	public function __construct()
	{
		$this->data['modules_id']	= 1;
		$this->data['modal'] 		= 'reservations';
		$this->data['ruta'] 		= 'reservations';
		$this->data['model'] 		= 'Reservations';
		$this->data['modulo'] 		= 'Reservas';
		$this->data['seccion']		= '';

		$this->img_path = Session::get('company')."/uploads/reservations/images/";
		
		$this->search_by =  array('name');
	}

	
}

?>
