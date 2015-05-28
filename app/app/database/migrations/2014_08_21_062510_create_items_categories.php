<?php

use Illuminate\Database\Migrations\Migration;

class CreateItemsCategories extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items_categories', function($newtable)
        {		   
           $newtable->increments('id');
           $newtable->integer('item_id')->nullable()->unsigned();
		   $newtable->integer('category_id')->nullable()->unsigned();
		   		   
		   $newtable->timestamps();
		   $newtable->softDeletes();
		   
		   $newtable->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
		   $newtable->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{		
		Schema::drop('items_categories');	
	}

}