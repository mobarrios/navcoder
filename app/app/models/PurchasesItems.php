<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class PurchasesItems extends Eloquent
{
	/** 
     * Soft Delete
	 */
	//use SoftDeletingTrait;
    //protected $dates = ['deleted_at'];

	protected $table 	= 'purchases_items';
	protected $guarded 	= array('');

	public function Purchases()
	{
		return $this->belongsTo('Purchases');
	}

	public function Items()
	{
		return $this->belongsTo('Items');
	}
}

?>