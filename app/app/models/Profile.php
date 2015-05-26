<?php

class Profile extends Eloquent
{
	protected $table = 'profiles';
	protected $guarded = array('');

	public function user()
	{
		return $this->hasMany('User');
	}

	public function permission()
	{
		return $this->hasMany('Permission');
	}
}

?>