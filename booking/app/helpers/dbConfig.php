<?php

class dbConfig
{
	public static function create()
	{
		self::createConfig();

		self::createModules();
		self::createAdminUser();
		self::createMenus();
		self::createAdminPermissions();
		self::createCompany();

	}

	public static function createConfig()
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

		Schema::create('modules', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('name','50')->unique();
			$table->boolean('available');
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
			$table->integer('main');
			$table->string('action','20');

			$table->integer('modules_id')->unsigned()->nullable();
			$table->foreign('modules_id')->references('id')->on('modules');

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

	}


	// create profile administrator , user admin
	public static function createCompany()
	{
		$company 				= new Company();
		$company->id 			= 1;
		$company->save();
	}


	// create profile administrator , user admin
	public static function createAdminUser()
	{
		$profiles 			= new Profiles();
		$profiles->id 		= 1;
		$profiles->profile = 'administrator';
		$profiles->save();

		$user 				= new User();
		$user->id 			= 1;
		$user->email 		= 'admin';
		$user->profiles_id	= $profiles->id;
		$user->password 	= Hash::make('cholita');
		$user->save();
	}


	//create admin permissions
	public static function createAdminPermissions()
	{
		$modules = Modules::all();

		foreach($modules as $module)
		{
			$permissions 				= new Permissions();
			$permissions->read 			= 1;
			$permissions->edit 			= 1;
			$permissions->delete 		= 1;
			$permissions->add 			= 1;
			$permissions->modules_id 	= $module->id;
			$permissions->profiles_id 	= 1;
			$permissions->save();
		}

	}

	// create modules
	public static function createModules()
	{
		$modules =  [
						['id'=>'1','name'=>'rooms'],
						['id'=>'2','name'=>'avilables'],
						['id'=>'5','name'=>'reservations'],
						['id'=>'6','name'=>'paxs'],
						['id'=>'7','name'=>'types'],
						
						

						['id'=>'3','name'=>'users'],
						['id'=>'4','name'=>'profiles'],

						
					];

		foreach($modules as $list => $key  )
		{
			$modules 			= new Modules();
			$modules->id   		= $key['id'];
			$modules->name 		= $key['name'];
			$modules->available = 1;
			$modules->save();
		}
	}

	
	public static function createMenus()
	{	
		$menus = self::menu();	

		foreach($menus as $menu => $key)
		{
			$menu 				= new Menus();
			$menu->id 			= $key['id'];
			$menu->name 		= $key['name'];
			$menu->icon 		= $key['icon'];
			$menu->modules_id	= $key['modules_id'];
			$menu->routes 		= $key['routes'];
			$menu->main 		= $key['main'];
			$menu->action 		= $key['action'];
			$menu->available 	= 1;
			$menu->save();
		}	
	}

	public static function menu()
	{

		$menu = [	[ 
					'id'		=> '1',
					'name' 		=> 'Habitaciones',
					'icon' 		=> '',
					'modules_id'=> '1',
					'routes'	=> 'rooms',
					'available'	=> '',
					'main'		=> '',
					'action'	=> 'read'
					],
					[ 
					'id'		=> '7',
					'name' 		=> 'Tipo de Habitaciones',
					'icon' 		=> '',
					'modules_id'=> '7',
					'routes'	=> 'types',
					'available'	=> '',
					'main'		=> '',
					'action'	=> 'read'
					],
					[ 
					'id'		=> '2',
					'name' 		=> 'Disponibilidad',
					'icon' 		=> '',
					'modules_id'=> '2',
					'routes'	=> 'availables',
					'available'	=> '',
					'main'		=> '',
					'action'	=> 'read'
					],
					[ 
					'id'		=> '5',
					'name' 		=> 'Reservas',
					'icon' 		=> '',
					'modules_id'=> '5',
					'routes'	=> 'reservations',
					'available'	=> '',
					'main'		=> '',
					'action'	=> 'read'
					],
					[ 
					'id'		=> '6',
					'name' 		=> 'Pasajeros',
					'icon' 		=> '',
					'modules_id'=> '6',
					'routes'	=> 'paxs',
					'available'	=> '',
					'main'		=> '',
					'action'	=> 'read'
					],
				];


	return $menu;

	}

}
?>