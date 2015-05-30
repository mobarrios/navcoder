<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Category extends Eloquent
{
	protected $table 	= 'categories';
	protected $fillable  = array('name');
}
?>