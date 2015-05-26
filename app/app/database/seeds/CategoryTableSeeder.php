<?php

class CategoryTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Category::create(array(
			'name' 		=> 'category 1',
		));

		Category::create(array(
			'name' 		=> 'category 2',
		));

		Category::create(array(
			'name' 		=> 'category 3',
		));

	}

}

