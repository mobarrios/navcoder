<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('ModuleTableSeeder');
		$this->call('ProfileTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('PermissionTableSeeder');
		$this->call('ProviderTableSeeder');
		$this->call('CategoryTableSeeder');
		$this->call('ItemTableSeeder');
	}

}
