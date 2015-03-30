<?php

class SubMenus extends Eloquent
{
	protected $table = 'sub_menus';

	public function Menus()
	{
		return $this->belongsTo('Menus');
	}	
}
