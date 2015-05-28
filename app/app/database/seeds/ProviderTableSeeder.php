<?php

class ProviderTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Provider::create(array(
			'name' 		=> 'Ninguno',
			'last_name' => 'Ninguno',
			'dni' 		=> '0000000',
			'email' 	=> '',
			'phone' 	=> '',
			'cell_phone' 	=> '',
			'company_name' 	=> '',
			'cuit' 			=> '',
		));

		Provider::create(array(
			'name' 		=> 'provider name 1',
			'last_name' => 'provider last name 1',
			'dni' 		=> '1111111',
			'email' 	=> 'provider1@email.com',
			'phone' 	=> '1234567',
			'cell_phone' 	=> '7654321',
			'company_name' 	=> 'provider 1 company',
			'cuit' 			=> '123456789',
		));

		Provider::create(array(
			'name' 		=> 'provider name 2',
			'last_name' => 'provider last name 2',
			'dni' 		=> '2222222',
			'email' 	=> 'provider2@email.com',
			'phone' 	=> '8901234',
			'cell_phone' 	=> '5555555',
			'company_name' 	=> 'provider 2 company',
			'cuit' 			=> '987654321',
		));

		Provider::create(array(
			'name' 		=> 'provider name 3',
			'last_name' => 'provider last name 3',
			'dni' 		=> '3333333',
			'email' 	=> 'provider3@email.com',
			'phone' 	=> '9043759',
			'cell_phone' 	=> '0907779',
			'company_name' 	=> 'provider 3 company',
			'cuit' 			=> '345638645',
		));

	}

}