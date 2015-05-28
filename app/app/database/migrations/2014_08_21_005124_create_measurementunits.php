<?php

use Illuminate\Database\Migrations\Migration;

class CreateMeasurementunits extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('measurementunits', function($newtable)
        {
		   $newtable->increments('id');
		   $newtable->string('name', 200);
		   $newtable->string('description', 200);
		   
		   $newtable->timestamps();
		   $newtable->softDeletes();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('measurementunits');
	}

}