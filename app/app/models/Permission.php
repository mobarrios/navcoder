<?php

class Permission extends Eloquent
{
	protected $table = 'permissions';

	public function module()
	{
		return $this->belongsTo('Module');
	}

	public function profile()
	{
		return $this->belongsTo('Profile');
	}

}