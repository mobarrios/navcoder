<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class RentalsItems extends Eloquent
{
	/** 
     * Soft Delete
	 */
	//use SoftDeletingTrait;
    //protected $dates = ['deleted_at'];

	protected $table 	= 'rentals_items';
	protected $guarded 	= array('');

	public function Rentals()
	{
		return $this->belongsTo('Rentals');
	}

	public function Items()
	{
		return $this->belongsTo('Items');
	}
}

?>