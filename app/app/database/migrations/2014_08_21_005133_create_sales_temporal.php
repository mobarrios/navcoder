<?php

use Illuminate\Database\Migrations\Migration;

class CreateSalesTemporal extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales_temporal', function($newtable)
        {
		   $newtable->increments('id');
		   $newtable->date('sale_date');		   
		   $newtable->float('amount');
		   $newtable->integer('client_id')->nullable()->unsigned();
		   $newtable->integer('sale_id')->nullable()->unsigned();
		   $newtable->timestamps();
		   $newtable->softDeletes();
		   $newtable->foreign('client_id')->references('id')->on('clients');
		   $newtable->foreign('sale_id')->references('id')->on('sales');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sales_temporal');
	}

}