<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class DoctorsObrasSocialesPlanes extends Eloquent
{
	/** 
     * Soft Delete
	 */
	//use SoftDeletingTrait;
    //protected $dates = ['deleted_at'];

	protected $table	 = 'doctors_obras_sociales_planes';
	protected $guarded	 = array('');

	public function Planes()
	{
		return $this->hasMany('Planes','id')->with('Obras');
	}


	

}

?>