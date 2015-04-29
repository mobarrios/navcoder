<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Brands  extends Eloquent
{
	/** 
     * Soft Delete
	 */
	//	use SoftDeletingTrait;
  	//  protected $dates = ['deleted_at'];

	protected $table 	= 'brands';
	protected $guarded  = array('');
}
?>