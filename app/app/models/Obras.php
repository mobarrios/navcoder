<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Obras extends Eloquent
{
	/** 
     * Soft Delete
	 */
	//use SoftDeletingTrait;
    //protected $dates = ['deleted_at'];

	protected $table 	= 'obras_sociales';
	protected $guarded 	= array('');

	public function Planes()
	{
		return $this->hasMany('Planes','obras_sociales_id');
	}
}
?>