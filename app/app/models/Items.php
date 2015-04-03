<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Items extends Eloquent
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
	
	/*
	public function delete()
    {
        // delete all related photos 
        $this->categories()->detach();
        // as suggested by Dirk in comment,
        // it's an uglier alternative, but faster
        // Photo::where("user_id", $this->id)->delete()

        // delete the user
        return parent::delete();
    }
    */

}
?>

