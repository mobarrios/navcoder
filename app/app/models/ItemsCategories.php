<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ItemsCategories extends Eloquent
{
    /** 
     * Soft Delete
     */
    //use SoftDeletingTrait;
    //protected $dates = ['deleted_at'];

	protected $table = 'items_categories';
	protected $guarded = array("");

	public static function getCategoriesFromItemId($id)
    {
    	$result = array();
    	$datos = ItemsCategories::where('item_id','=',$id)->get();
    	
    	foreach($datos as $dato)
    	{
    		$result[$dato->category_id] = 1;    		        	
    	}

    	return $result;
    }

}

?>