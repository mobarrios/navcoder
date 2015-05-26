<?php
 
class Module extends Eloquent
{
	protected $table = 'modules';

	public function permission()
	{
		return $this->hasMany('Permission');
	}

}