<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ItemsProviders extends Eloquent
{
    /** 
     * Soft Delete
     */
    //use SoftDeletingTrait;
    //protected $dates = ['deleted_at'];

	protected $table = 'items_providers';
	protected $guarded = array("");

	public function Items()
    {
        return $this->belongsTo('Items');
    }

    public function Providers()
    {
        return $this->belongsTo('Providers');
    }
}

?>