<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class RoomsImages extends Eloquent
{
	/** 
     * Soft Delete
	 */
	//use SoftDeletingTrait;
    //protected $dates = ['deleted_at'];

	protected $table	 = 'rooms_images';
	protected $guarded	 = array('');


	public function Rooms()
	{
		return $this->hasMany('Rooms');
	}

}

?>