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

	public function postNew()
	{
		$from 		= Input::get('from');
		$to			= Input::get('to');
		$types_id	= Input::get('types_id');

		$days  		= Calendar::days_array($from,$to);

		$availables = true;

		foreach($days as $day)
		{
			$av = Availables::where('types_id','=',$types_id)->where('from','=',$day)->first();		

			if($av)
			{
				if($av->quantity == 0)
				{
					$availables = false;
				}
			}
			else
			{
				$availables  = false;
			}
		}

		if($availables)
		{	
			$res 			= new Reservations();
			$res->from 		= $from;
			$res->to   		= $to;
			$res->types_id 	= $types_id;
			$res->save();

			foreach($days as $day)
			{
				$av = Availables::where('types_id','=',$types_id)->where('from','=',$day)->first();	
				$av->quantity = $av->quantity - 1;
				$av->save();	
			}
		}
		else
		{
			return "Sin Disponibilidad";
		}



	}
}

?>
