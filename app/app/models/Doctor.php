<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Doctor extends Eloquent
{
	/** 
     * Soft Delete
	 */
	//use SoftDeletingTrait;
    //protected $dates = ['deleted_at'];

	protected $table 	= 'doctors';
	protected $guarded 	= array('');
}
?>