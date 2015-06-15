<?php

class FrontReservationController extends BaseController
{

	public function process()
	{

		$input 		= Input::all();
		$from  		= $input['from'];
		$to  		= $input['to'];

		$types_id  	= $input['types_id'];

			$pax 			= new Paxs();
			$pax->last_name = $input['last_name'];	
			$pax->name 		= $input['name'];
			$pax->mail 		= $input['mail'];
			$pax->phone 	= $input['phone'];
			$pax->cc 		= Crypt::encrypt($input['cc']);
			$pax->cc_number = Crypt::encrypt($input['cc_number']);
			$pax->cc_vto	= Crypt::encrypt($input['cc_vto']);
			$pax->cc_code	= Crypt::encrypt($input['cc_code']);
			$pax->save();	

			$res 				= new Reservations();
			$res->from 			= $from;
			$res->to 			= $to;
			$res->types_id 		= $types_id;
			$res->paxs_id   	= $pax->id;
			$res->status    	= 0;
			$res->currency  	= $input['currency'];
			$res->total     	= $input['total'];
			$res->pax_quantity 	= $input['pax_quantity'];

			$res->save();

			$days  			= Calendar::days_array($from,$to);

			foreach($days as $day)
			{
				$av = Availables::where('types_id','=',$types_id)->where('from','=',$day)->first();	
				$av->quantity = $av->quantity - 1;
				$av->save();	
			}

		return "reserva correcta";
	}

}