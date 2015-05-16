<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Types  extends Eloquent
{
	/** 
     * Soft Delete
	 */
	//	use SoftDeletingTrait;
  	//  protected $dates = ['deleted_at'];

	protected $table 	= 'types';
	protected $guarded  = array('');

	public function Rooms()
	{
		return $this->hasMany('Rooms');
	}


	public function Availables()
	{
		return $this->hasMany('Availables');
	}


	public function AvailablesDay($year , $month , $day)
	{
		$days = $year.'-'.$month.'-'.$day;

		$availables = Availables::where('types_id','=',$this['id'])->where('from','<=',$days)->where('to','>=',$days);

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