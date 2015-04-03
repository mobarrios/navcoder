<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Categories  extends Eloquent
{
	/** 
     * Soft Delete
	 */
	//	use SoftDeletingTrait;
  	//  protected $dates = ['deleted_at'];

	protected $table 	= 'categories';
	protected $fillable  = array('name');
}
?>