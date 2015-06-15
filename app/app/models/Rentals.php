<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Rentals extends Eloquent
{
	/** 
     * Soft Delete
	 */
	//use SoftDeletingTrait;
    //protected $dates = ['deleted_at'];

	protected $table	 = 'rentals';
	protected $guarded	 = array('');

	public function Clients()
	{
		return $this->belongsTo('Clients');
	}

	public function RentalsItems()
	{
		return $this->hasMany('RentalsItems');
	}

	public function ClientsPayment()
	{
		return $this->hasMany('ClientsPayment');
	}

		public function getRentalsDateAttribute($value)
			{
				$value = date("d-m-Y",strtotime($value)); 
				return $value;
			}

		public function setRentalsDateAttribute($value)
			{
				$fecha = date("Y-m-d",strtotime($value)); 
				$this->attributes['rentals_date']	=	$fecha;

			}

		public function getRentalsToAttribute($value)
			{
				$value = date("d-m-Y",strtotime($value)); 
				return $value;
			}

		public function setRentalsToAttribute($value)
			{
				$fecha = date("Y-m-d",strtotime($value)); 
				$this->attributes['rentals_to']	=	$fecha;

			}}

?>