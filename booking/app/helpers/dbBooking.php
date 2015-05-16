<?php


class dbBooking 
{

	public static function createBooking()
	{
		Schema::create('types', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('name',200);
		});

		Schema::create('rooms', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('name',200);

			//relations
			$table->integer('types_id')->unsigned()->nullable();
			$table->foreign('types_id')->references('id')->on('types');
		});


		Schema::create('rooms_availables', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->integer('quantity');
			$table->date('from');
			$table->date('to');
			$table->double('price',10,2);
			$table->string('currency',20);


			//relations
			$table->integer('rooms_id')->unsigned()->nullable();
			$table->foreign('rooms_id')->references('id')->on('rooms');
		});


		Schema::create('rooms_images', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('image',200);

			//relations
			$table->integer('rooms_id')->unsigned()->nullable();
			$table->foreign('rooms_id')->references('id')->on('rooms');
		});

		Schema::create('services', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('service',200);
		});

		Schema::create('rooms_services', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			//relations
			$table->integer('rooms_id')->unsigned()->nullable();
			$table->foreign('rooms_id')->references('id')->on('rooms');

			$table->integer('services_id')->unsigned()->nullable();
			$table->foreign('services_id')->references('id')->on('services');
		});
	}
}
?>