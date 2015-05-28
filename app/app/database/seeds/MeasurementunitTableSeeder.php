<?php

class MeasurementunitTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Measurementunit::create(array(
			'name' 			=> 'unidad',
			'description' 	=> '',
		));

		Measurementunit::create(array(
			'name' 			=> 'par',
			'description' 	=> '',
		));

		Measurementunit::create(array(
			'name' 			=> 'decena',
			'description' 	=> '',
		));

		Measurementunit::create(array(
			'name' 			=> 'docena',
			'description' 	=> '',
		));

		Measurementunit::create(array(
			'name' 			=> 'centimetro cubico cm3',
			'description' 	=> '',
		));

		Measurementunit::create(array(
			'name' 			=> 'metro cuadrado mt2',
			'description' 	=> '',
		));

	}

}