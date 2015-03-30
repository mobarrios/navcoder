<?php

class ClientsPayment  extends Eloquent
{
	protected $table 	= 'clients_payment';
	protected $guarded	= array('');


	public function Clients()
	{
		return $this->belongsTo('Clients');
	}

	public function Sales()
	{
		return $this->belongsTo('Sales');
	}

	public function getDateAttribute($value)
	{
		$value = date("d-m-Y",strtotime($value)); 
		return $value;
	}

	public function setDateAttribute($value)
	{
		$fecha 						= date("Y-m-d",strtotime($value)); 
		$this->attributes['date']	= $fecha;

	}

	public function getPaymentMethodAttribute($value)
	{
		switch ($value) {
				case '1':
					return "Efectivo";
				break;
				case '2':
					return "Tarjeta de Credito";
				break;
				case '3':
					return "Deposito";
				break;
				case '4':
					return "Transferencia";
				break;	
				case '5':
					return "Cheque";
				break;	
				

		}
	}
}
?>