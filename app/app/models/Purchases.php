<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Purchases extends Eloquent
{
	/** 
     * Soft Delete
	 */
	//use SoftDeletingTrait;
    //protected $dates = ['deleted_at'];

	protected $table	 = 'purchases';
	protected $guarded	 = array('');

	public function Providers()
	{
		return $this->belongsTo('Providers');
	}

	public function PurchasesItems()
	{
		return $this->hasMany('PurchasesItems');
	}

}

?>