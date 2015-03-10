<?php

class DBupdate 
{

	public static function create()
	{
		
		Schema::create('company', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('name','200');
			$table->string('razon_social','200');
			$table->string('logo','200');
			$table->string('web','200');
			$table->string('phone','200');
			$table->string('mail','200');
			$table->string('iva_condition','200');
		});

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
			$table->string('last_name','50');
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
			$table->string('last_name','50');
			$table->string('dni','20');
			$table->string('email','100');
			$table->string('phone','50');
			$table->string('cell_phone','50');
			$table->string('license','50');
		});

		Schema::create('providers', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('name','50');
			$table->string('last_name','50');
			$table->string('dni','20');
			$table->string('email','100');
			$table->string('phone','50');
			$table->string('cell_phone','50');
			$table->string('company_name','50');
			$table->string('cuit','50');
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
			$table->integer('providers_id')->unsigned()->nullable();
			$table->foreign('providers_id')->references('id')->on('providers');
		});
		
		Schema::create('items_categories', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			//relations
			$table->integer('items_id')->unsigned()->nullable();
			$table->integer('categories_id')->unsigned()->nullable();

			$table->foreign('items_id')->references('id')->on('items');
			$table->foreign('categories_id')->references('id')->on('categories');
			
		});

		Schema::create('modules', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('name','50');
		});

		Schema::create('menus', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('name','50');
			$table->string('icon','50');
			$table->string('routes','50');
		

			//relations
			$table->integer('modules_id')->unsigned()->nullable();
			$table->foreign('modules_id')->references('id')->on('modules');
		});

		Schema::create('sub_menus', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('name','50');
			$table->string('icon','50');
		

			//relations
			$table->integer('modules_id')->unsigned()->nullable();
			$table->foreign('modules_id')->references('id')->on('modules');

			$table->integer('menus_id')->unsigned()->nullable();
			$table->foreign('menus_id')->references('id')->on('menus');
		});

		Schema::create('obras_sociales', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('name','200');
			$table->string('address','50');
			$table->string('city','50');
			$table->string('province','50');
			$table->string('zip_code','50');
			$table->string('telephone','50');
			$table->string('fax','50');
			$table->string('email','50');
			$table->string('cuit','50');
			$table->string('iva_conditions','50');
			$table->string('observations','200');
		});
		
		Schema::create('profiles', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('profile','50');
		});

		Schema::create('permissions', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->boolean('read');
			$table->boolean('edit');
			$table->boolean('delete');
			$table->boolean('add');

			//relations
			$table->integer('modules_id')->unsigned()->nullable();
			$table->integer('profiles_id')->unsigned()->nullable();

			$table->foreign('modules_id')->references('id')->on('modules');
			$table->foreign('profiles_id')->references('id')->on('profiles');
		});

		Schema::create('purchases', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->date('purchases_date');
			$table->double('amount', 10,2);

			//relations
			$table->integer('providers_id')->unsigned()->nullable();
			$table->foreign('providers_id')->references('id')->on('providers');
		});

		Schema::create('purchases_temporal', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->date('purchases_date');
			$table->double('amount', 10,2);

			//relations
			$table->integer('providers_id')->unsigned()->nullable();
			$table->foreign('providers_id')->references('id')->on('providers');

			$table->integer('purchases_id')->unsigned()->nullable();
			$table->foreign('purchases_id')->references('id')->on('purchases');
		});

		Schema::create('purchases_items', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->integer('quantity');
			$table->double('discount', 10,2);
			$table->double('price_per_unit', 10,2);

			//relations
			$table->integer('purchases_id')->unsigned()->nullable();
			$table->foreign('purchases_id')->references('id')->on('purchases');

			$table->integer('purchases_temporal_id')->unsigned()->nullable();
			$table->foreign('purchases_temporal_id')->references('id')->on('purchases_temporal');

			$table->integer('items_id')->unsigned()->nullable();
			$table->foreign('items_id')->references('id')->on('items');		
		});

		Schema::create('sales', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->double('amount', 10,2);
			$table->date('sales_date');

			//relations
			$table->integer('clients_id')->unsigned()->nullable();
			$table->foreign('clients_id')->references('id')->on('clients');
		});

		Schema::create('sales_temporal', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->date('sales_date');
			$table->double('amount', 10,2);

			//relations
			$table->integer('clients_id')->unsigned()->nullable();
			$table->foreign('clients_id')->references('id')->on('clients');

			$table->integer('sales_id')->unsigned()->nullable();
			$table->foreign('sales_id')->references('id')->on('sales');
		});

		Schema::create('sales_items', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->integer('quantity');
			$table->double('discount', 10,2);
			$table->double('price_per_unit', 10,2);

			//relations
			$table->integer('sales_id')->unsigned()->nullable();
			$table->foreign('sales_id')->references('id')->on('sales');

			$table->integer('sales_temporal_id')->unsigned()->nullable();
			$table->foreign('sales_temporal_id')->references('id')->on('sales_temporal');
			
			$table->integer('items_id')->unsigned()->nullable();
			$table->foreign('items_id')->references('id')->on('items');		
		});

		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('name','200');
			$table->string('last_name','200');
			$table->string('email','200');
			$table->string('password','200');
			$table->string('remember_token','200');

			//relations
			$table->integer('profiles_id')->unsigned()->nullable();
			$table->foreign('profiles_id')->references('id')->on('profiles');	
		});
		
	
		self::createAdminUser();
		self::createModules();
		//self::createMenus();


	}


	public static function update()
	{

		
		Schema::table('items',fucntion($table)
		{
			$table->string('bodega','200');
			$table->stirng('provincia');
		});
		
	}	


	// create profile administrator , user admin
	public static function createAdminUser()
	{
		$profiles = new Profiles();
		$profiles->profile = 'administrator';
		$profiles->save();

		$user 				= new User();
		$user->email 		= 'admin';
		$user->profiles_id	= $profiles->id;
		$user->password 	= Hash::make('cholita');
		$user->save();
	}

	// create modules
	public static function createModules()
	{
		$lists = array('items','categories','users','profiles','providers','clients','sales','purchases','doctors');

		foreach($lists as $list)
		{
			$modules = new Modules();
			$modules->name = $list;
			$modules->save();
		}
	}

	//create menues
	public static function createMenus()
	{
		$lists = array(
						array('Articulos','items','items'),
						array('Rubros','categories','categories'),
						array('Usuarios','users','users'),
						array('Perfiles','profiles','profiles'),
						array('Proveedores','providers','providers'),
						array('Clientes','clients','clients'),
						array('Ventas','sales','sales'),
						array('Compras','purchases','purchases'),
						array('Doctores','doctors','doctors'),
						);
		

		foreach($lists as $list => $a)
		{
			//$menus = new Menus();
			//$menus->name 		= 
			//$menus->routes 		= 
			dd(Modules::where('name','=',$a[2]));


		}

		return;
	}

	
}

?>