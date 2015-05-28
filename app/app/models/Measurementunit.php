<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Measurementunit extends Eloquent
{
	/** 
     * Soft Delete
	 */
	//	use SoftDeletingTrait;
  	//  protected $dates = ['deleted_at'];

	protected $table 	= 'measurementunits';
	protected $guarded  = array('');

	public function item()
	{
		return $this->belongsTo('Item');
	}
}
