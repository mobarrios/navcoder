<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class CompanyDb extends Eloquent
{
	/** 
     * Soft Delete
	 */
	//use SoftDeletingTrait;
    //protected $dates = ['deleted_at'];

	protected $table = 'company_db';
	
}

?>