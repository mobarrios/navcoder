<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Reservations  extends Eloquent
{
	/** 
     * Soft Delete
	 */
	//	use SoftDeletingTrait;
  	//  protected $dates = ['deleted_at'];

	protected $table 	= 'rooms';
	protected $guarded  = array('');




}
?>