<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Staff  extends Eloquent
{
	/** 
     * Soft Delete
	 */
	//	use SoftDeletingTrait;
  	//  protected $dates = ['deleted_at'];

	protected $table 	= 'staff';
	protected $guarded  = array('');
}
?>