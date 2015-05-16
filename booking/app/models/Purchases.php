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

		public function getPurchasesDateAttribute($value)
			{
				$value = date("d-m-Y",strtotime($value)); 
				return $value;
			}

		public function setPurchasesDateAttribute($value)
			{
				$fecha = date("Y-m-d",strtotime($value)); 
				$this->attributes['purchases_date']	=	$fecha;

			}}

?>