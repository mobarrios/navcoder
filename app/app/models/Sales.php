<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Sale extends Eloquent
{

	protected $table	 = 'sales';
	protected $guarded	 = array('');

	public function Clients()
	{
		return $this->belongsTo('Clients');
	}

	public function SalesItems()
	{
		return $this->hasMany('SalesItems');
	}

	public function ClientsPayment()
	{
		return $this->hasMany('ClientsPayment');
	}

		public function getSalesDateAttribute($value)
			{
				$value = date("d-m-Y",strtotime($value)); 
				return $value;
			}

		public function setSalesDateAttribute($value)
			{
				$fecha = date("Y-m-d",strtotime($value)); 
				$this->attributes['sales_date']	=	$fecha;

			}}

?>