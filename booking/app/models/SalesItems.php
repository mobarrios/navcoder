<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class SalesItems extends Eloquent
{
	/** 
     * Soft Delete
	 */
	//use SoftDeletingTrait;
    //protected $dates = ['deleted_at'];

	protected $table 	= 'sales_items';
	protected $guarded 	= array('');

	public function Sales()
	{
		return $this->belongsTo('Sales');
	}

	public function Items()
	{
		return $this->belongsTo('Items');
	}
}

?>