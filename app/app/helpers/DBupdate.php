<?php

class DBupdate 
{
	public static function create()
	{

		Schema::create('categories', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('name','50');
		});

		Schema::create('clients', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('name','50');
			$table->string('lastname','50');
			$table->string('dni','20');
			$table->string('email','100');
			$table->string('phone','50');
			$table->string('cell_phone','50');
			$table->string('company_name','50');
			$table->string('cuit','50');
		});

		Schema::create('doctors', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('name','50');
			$table->string('lastname','50');
			$table->string('dni','20');
			$table->string('email','100');
			$table->string('phone','50');
			$table->string('cell_phone','50');
			$table->string('license','50');
		});

		Schema::create('items', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('code','200');
			$table->string('name','50');
			$table->text('description');
			$table->double('cost_price', 10,2);
			$table->double('sell_price',10,2);
			$table->double('rent_price_15_days', 10,2);
			$table->double('rent_price_45_days', 10,2);			
			$table->date('expiration_date');
			$table->integer('stock');
			$table->string('image','250');
			$table->double('total_weight', 10,2);
			$table->double('maximun_weight', 10,2);
			$table->string('color', '50');
			$table->string('size', '50');
			$table->string('dimensions', '50');
			$table->string('presentation', '50');

			//relations
			$table->foreign('providers_id')->references('id')->on('providers');
		});

		




		//crea usuario admin
		/*
			$user 			= new User();
			$user->user 	= 'admin';
			$user->password = Hash::make('cholita');
			$user->save();
		*/	
	}

	public static function up()
	{
	/*
		Schema::table('categories', function($table)
		{
			$table->softDeletes();
		});

		Schema::table('clients', function($table)
		{
			$table->softDeletes();
		});
	
		Schema::table('company_db', function($table)
		{
			$table->softDeletes();
		});
	
		Schema::table('doctors', function($table)
		{
			$table->softDeletes();
		});

		Schema::table('items', function($table)
		{
			$table->softDeletes();	
		});

		Schema::table('items_categories', function($table)
		{
			$table->softDeletes();
		});
		*/

		Schema::table('obras_sociales', function($table)
		{
			$table->softDeletes();	
		});

		Schema::table('providers', function($table)
		{
			$table->softDeletes();	
		});

		Schema::table('purchases', function($table)
		{
			$table->softDeletes();	
		});

		Schema::table('purchases_items', function($table)
		{
			$table->softDeletes();	
		});

		Schema::table('purchases_temporal', function($table)
		{
			$table->softDeletes();	
		});

		Schema::table('users', function($table)
		{
			$table->softDeletes();	
		});
	}	
}

?>