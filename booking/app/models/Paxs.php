<?php

class Paxs extends Eloquent
{
	protected $table 	= "paxs";
	protected $guarded 	= array('');

	public function Reservations()
	{
		return $this->hasMany('Reservations');
	}
}