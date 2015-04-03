<?php

class DBupdate 
{
	public static function update()
	{

		/*Schema::table('sales_items',function($table){
			$table->string('observations','200');
		});*/
		
		Schema::create('caja', function($table){

			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->date('date');
			$table->string('description','200');
			$table->double('in', 10,2);
			$table->double('out',  10,2);
			$table->integer('type');

		});
	
			
	}	


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
			$table->string('address','200');
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
			$table->string('address','200');
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
			$table->string('address','200');
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
			$table->string('address','200');
		});

		Schema::create('items', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('code','200')->unique();
			$table->string('name','50');
			$table->text('description');
			$table->double('cost_price', 10,2);
			$table->double('sell_price',10,2);
			$table->double('rent_price_15_days', 10,2);
			$table->double('rent_price_45_days', 10,2);			
			$table->date('expiration_date');
			$table->integer('stock');
			$table->string('um',20);
			$table->string('image','250')->nullable();
			$table->double('total_weight', 10,2);
			$table->double('maximun_weight', 10,2);
			$table->string('color', '50');
			$table->string('size', '50');
			$table->string('dimensions', '50');
			$table->string('presentation', '50');
			$table->string('bodega','200');
			$table->string('provincia','200');
			$table->string('observaciones','200');

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

			$table->string('name','50')->unique();
		});

		Schema::create('menus', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('name','50');
			$table->string('icon','50');
			$table->string('routes','50');
			$table->boolean('available');
		});

		Schema::create('sub_menus', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('name','50');
			$table->string('icon','50');
			$table->string('routes','50');
		
			//relations	

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
		

		Schema::create('clients_payment',function($table)
		{	
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->date('date');
			$table->string('detail','200');
			$table->double('amount',10,2);
			$table->integer('payment_method');

			//relations
			$table->integer('clients_id')->unsigned();
			$table->foreign('clients_id')->references('id')->on('clients');

			$table->integer('sales_id')->unsigned();
			$table->foreign('sales_id')->references('id')->on('sales');

		});
	
		self::createAdminUser();
		self::createModules();
		//self::createMenus();


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
		$lists = array('items','categories','users','profiles','providers','clients','sales','purchases','doctors','obras');

		foreach($lists as $list)
		{
			$modules = new Modules();
			$modules->name = $list;
			$modules->save();
		}
	}

	
	public static function createMenus()
	{	
		$menu = self::menu();	
	
		foreach($menu as $m => $key)
		{
			$menu 			= new Menus();
			$menu->name 	= $key['name'];
			$menu->routes 	= $key['route'];
			$menu->available= 1;
			$menu->save();

			if(!empty($key['sub']))
			{
				foreach($key['sub'] as $sub => $sub_key)
				{
					$sub 			= new SubMenus();
					$sub->name 		= $sub_key['name'];
					$sub->routes 	= $sub_key['route'];
					$sub->menus_id 	= $menu->id;
					$sub->save();
				}
			}
		}

	}

	
	public static function menu()
	{

		$menu[] = [ 'name' => 'Articulos',
					'route'=> '',
					'sub' => [
								[
								'name' => 'Articulos',
								'route' => 'items'
								],
								[
								 'name' => 'Categorias',
								 'route' => 'categories'
								 ]
					]];

		$menu[] = [ 'name' => 'Compras',
					'route'=> '',
					'sub' => [
								[
								'name' => 'Nueva Compra',
								'route' => 'purchases'
								],
								[
								 'name' => 'Lista de Compras',
								 'route' => 'purchases_list'
								 ],
								 [
								 'name' => 'Proveedores',
								 'route' => 'providers'
								 ]
					]];

		$menu[] = [ 'name' => 'Ventas',
					'route'=> '',
					'sub' => [
								[
								'name' => 'Nueva Venta',
								'route' => 'sales'
								],
								[
								 'name' => 'Lista de Ventas',
								 'route' => 'sales_list'
								 ],
								 [
								 'name' => 'Clientes',
								 'route' => 'clients'
								 ]
					]];

		$menu[] = [ 'name' => 'Doctores',
					'route'=> '',
					'sub' => [
								[
								'name' => 'Doctores',
								'route' => 'doctors'
								]
					]];

		$menu[] = [ 'name' => 'Obras Sociales',
					'route'=> '',
					'sub' => [
								[
								'name' => 'Obras Sociales',
								'route' => 'obras'
								]
					]];


	return $menu;

	}
}

?>