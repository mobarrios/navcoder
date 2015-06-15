<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Doctors extends Eloquent
{
	/** 
     * Soft Delete
	 */
	//use SoftDeletingTrait;
    //protected $dates = ['deleted_at'];

	protected $table 	= 'doctors';
	protected $guarded 	= array('');


	public function DoctorPlanes()
	{


		return $this->belongsToMany('Planes','doctors_obras_sociales_planes','doctors_id','obras_sociales_planes_id');
		//$planes = DoctorsObrasSocialesPlanes::where('doctors_id','=',$this->attributes['id'])->get();
		

		//$p 		= Planes::with('Obras')->find($planes->id);
		//$ob     = Obras::find($p->obras_sociales_id);



		return $planes;
	}

}
?>