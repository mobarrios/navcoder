<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Item extends Eloquent
{


	protected $table 		= 'items';
	protected $guarded 		= array('');

	/** 
     * Soft Delete
	 */
	//use SoftDeletingTrait;
  	//protected $dates 		= ['deleted_at'];


		
	public function PurchasesItems()
	{
		return $this->hasMany('PurchasesItems');
	}

	public function categories()
	{
		return $this->belongsToMany('Categories','items_categories','items_id','categories_id');
	}

	public function getUmAttribute($val)
	{
		switch ($val) {
				case '1':
					return 'Unidad';
				break;
				case '2':
					return 'Caja x 50';
				break;	
				case '3':
					return 'Cm3';
				break;	
				case '4':
					return 'Mt2';
				break;	
		}
	}

}
?>

