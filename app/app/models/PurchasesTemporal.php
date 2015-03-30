<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class PurchasesTemporal extends Eloquent
{
	/** 
     * Soft Delete
	 */
	//use SoftDeletingTrait;
    //protected $dates = ['deleted_at'];

	protected $table   = 'purchases_temporal';
	protected $guarded = array('');
}

?>