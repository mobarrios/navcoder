<?php

use Illuminate\Database\Migrations\Migration;

class CreateItems extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function($newtable)
        {
		   $newtable->increments('id');
		   $newtable->string('code', 200);
		   $newtable->string('name', 200);
		   $newtable->longText('description');
		   $newtable->float('cost_price');
		   $newtable->float('sell_price');
		   $newtable->date('expiration_date');
		   $newtable->integer('stock');
		   $newtable->string('image', 500)->nullable();
		   $newtable->float('rent_price_per_day');
		   $newtable->float('total_weight');
		   $newtable->float('maximun_weight');
		   $newtable->string('color', 100);
		   $newtable->string('size', 100);
		   $newtable->string('measure', 100);
		   $newtable->integer('provider_id')->nullable()->unsigned();

		   $newtable->timestamps();
		   $newtable->softDeletes();
		   
		   $newtable->foreign('provider_id')->references('id')->on('providers');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('items');
	}

}