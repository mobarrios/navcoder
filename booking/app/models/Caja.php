<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Caja  extends Eloquent
{
	/** 
     * Soft Delete
	 */
	//	use SoftDeletingTrait;
  	//  protected $dates = ['deleted_at'];

	protected $table 	= 'caja';
	protected $guarded  = array('');



		public function getDateAttribute($value)
		{
			$value = date("d-m-Y",strtotime($value)); 
			return $value;
		}

		public function setDateAttribute($value)
		{
			$fecha = date("Y-m-d",strtotime($value)); 
			$this->attributes['date']	=	$fecha;

		}


		public function getTypeAttribute($value)
		{
		switch ($value) {
				case '1':
					return "Gastos Varios";
				break;
				case '2':
					return "Ingresos Varios";
				break;
				case '3':
					return "Retiro de Caja";
				break;
				case '4':
					return "Gastos Fijos";
				break;	
			}
		}
}
?>