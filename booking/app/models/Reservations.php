<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Reservations  extends Eloquent
{
	/** 
     * Soft Delete
	 */
	//	use SoftDeletingTrait;
  	//  protected $dates = ['deleted_at'];

	protected $table 	= 'rooms_reservations';
	protected $guarded  = array('');

	public function Paxs()
	{
		return $this->belongsTo('Paxs');
	}

	public function Types()
	{
		return $this->belongsTo('Types');
	}

	public function getFromAttribute($value)
	{
		$value = date("d-m-Y",strtotime($value)); 
		return $value;
	}
	public function getToAttribute($value)
	{
		$value = date("d-m-Y",strtotime($value)); 
		return $value;
	}


	public function setFromAttribute($value)
	{
		$fecha = date("Y-m-d",strtotime($value)); 
		$this->attributes['from']	= 	$fecha;
	}
	public function setToAttribute($value)
	{
		$fecha = date("Y-m-d",strtotime($value)); 
		$this->attributes['to']	= 	$fecha;
	}



}
?>