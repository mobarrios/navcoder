<?php

class AvailablesController extends BaseController
{
	protected $data  	 	= array();
	protected $search_by 	= array();

	public function __construct()
	{
		$this->data['modules_id']	= 2;
		$this->data['modal'] 		= 'availables';
		$this->data['ruta'] 		= 'availables';
		$this->data['model'] 		= 'Availables';
		$this->data['modulo'] 		= 'Disponibilidad';
		$this->data['seccion']		= '';

		$this->search_by =  array('form','to');
	}

	
	public function postNew()
	{
		$input = Input::all();

		$cant  = $input['quantity'];
		$from  = $input['from'];
		$to    = $input['to'];
		$type  = $input['types_id'];

		$count = 0 ;
		
		foreach(Rooms::where('types_id','=',$type)->get() as $room)
		{
			
			if($count != $cant)
			{
				$a = Availables::where('rooms_id','=',$room->id);


				if($a->count() != 0)
				{
					$av = $a->whereBetween('from',array($from,$to))->whereBetween('to',array($from,$to))->get();

					if($av->count() == 0)
					{
				
						$av = new Availables();
						$av->from = $from;
						$av->to  = $to;
						$av->rooms_id = $room->id;
						$av->save();

						$count ++;
					}
				}
				else
				{

						$av = new Availables();
						$av->from = $from;
						$av->to  = $to;
						$av->rooms_id = $room->id;
						$av->save();

						$count ++;
				}	
			}
			

		}



		return Redirect::back()->withErrors(array('success'=>'Disponibilidad Cargada Correctamente'));
}

		

}

?>