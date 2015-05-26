<?php

class ItemTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Item::create(array(
			'code' 				=> '001', 
			'name' 				=> 'Item 1',
			'description' 		=> 'Item 1 description',
			'cost_price'		=>  1000,
			'sell_price'		=>  1500,
			'expiration_date'	=> '',
			'stock' 			=>  100,
			'image' 			=> '',
			'rent_price_per_day'=>  100,
			'total_weight'		=>  50,
			'maximun_weight'	=>  60,
			'color' 			=> 'red',
			'size' 				=> 'XL',
			'measure' 			=> 'Unidad',
			'provider_id'		=> '1',
		));

		Item::create(array(
			'code' 				=> '002', 
			'name' 				=> 'Item 2',
			'description' 		=> 'Item 2 description',
			'cost_price'		=>  1000,
			'sell_price'		=>  1500,
			'expiration_date'	=> '',
			'stock' 			=>  100,
			'image' 			=> '',
			'rent_price_per_day'=>  100,
			'total_weight'		=>  50,
			'maximun_weight'	=>  60,
			'color' 			=> 'blue',
			'size' 				=> 'L',
			'measure' 			=> 'Box x 50',
			'provider_id'		=> '2',
		));

		Item::create(array(
			'code' 				=> '003', 
			'name' 				=> 'Item 3',
			'description' 		=> 'Item 3 description',
			'cost_price'		=>  1000,
			'sell_price'		=>  1500,
			'expiration_date'	=> '',
			'stock' 			=>  100,
			'image' 			=> '',
			'rent_price_per_day'=>  100,
			'total_weight'		=>  50,
			'maximun_weight'	=>  60,
			'color' 			=> 'orange',
			'size' 				=> 'M',
			'measure' 			=> 'cm3',
			'provider_id'		=> '3',
		));

	}

}