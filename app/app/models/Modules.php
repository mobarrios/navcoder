<?php
 
class Modules extends Eloquent
{
	protected $table = 'modules';

	public function Menus()
	{
		return $this->hasMany('Menus');
	}

	public function Permissions()
	{
		return $this->belongsTo('Permissions');
	}
	
}

?>