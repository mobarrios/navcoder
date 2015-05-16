<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Availables extends Eloquent
{
	/** 
     * Soft Delete
	 */
	//use SoftDeletingTrait;
    //protected $dates = ['deleted_at'];

	protected $table 	= 'rooms_availables';
	protected $guarded 	= array('');

	public function Rooms()
	{
		return $this->belongsTo('Rooms')->with('Types');
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