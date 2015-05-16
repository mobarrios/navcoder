<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Rooms  extends Eloquent
{
	/** 
     * Soft Delete
	 */
	//	use SoftDeletingTrait;
  	//  protected $dates = ['deleted_at'];

	protected $table 	= 'rooms';
	protected $guarded  = array('');



	public function Types()
	{
		return $this->belongsTo('Types');
	}

	public function Images()
	{
		return $this->belongsTo('RoomsImages');
	}	

	public function Availables()
	{
		return $this->hasMany('Availables');
	}

	public function AvailablesDay($year = null, $month = null , $day = null, $type_id = null)
	{
		$days = $year.'-'.$month.'-'.$day;

		$availables = Availables::where('rooms_id','=', $type_id)->where('from','<=',$days)->where('to','>=',$days);


		if($availables->count()== 0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

}
?>