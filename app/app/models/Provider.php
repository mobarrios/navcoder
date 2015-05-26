<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Provider extends Eloquent
{
	/** 
     * Soft Delete
	 */
	//use SoftDeletingTrait;
    //protected $dates = ['deleted_at'];

    protected $softDelete 	= true; 
	protected $table 		= 'providers';
	protected $guarded 		= array('');

	public function Purchases()
	{
		return $this->hasMany('Purchases');
	}
}

?>