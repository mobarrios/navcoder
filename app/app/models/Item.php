<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Item extends Eloquent
{


	protected $table 		= 'items';
	protected $guarded 		= array('');

		
	public function PurchasesItems()
	{
		return $this->hasMany('PurchasesItems');
	}

	public function category()
	{
		return $this->belongsToMany('Category','items_categories','item_id','category_id');
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

	public function measurementunit()
	{
		return $this->hasOne('Measurementunit');
	}

}
?>

