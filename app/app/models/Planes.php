<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Planes extends Eloquent
{
	/** 
     * Soft Delete
	 */
	//use SoftDeletingTrait;
    //protected $dates = ['deleted_at'];

	protected $table 	= 'obras_sociales_planes';
	protected $guarded 	= array('');


	public function Obras()
	{
		return $this->belongsTo('Obras','obras_sociales_id');
	}
	public function DoctorsObrasSocialesPlanes()
	{
		return $this->belongsTo('DoctorsObrasSocialesPlanes');
	}

}

?>