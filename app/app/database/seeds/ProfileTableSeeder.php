<?php

class ProfileTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$adminProfileName 	= Config::get('constants.ADMIN_PROFILE_NAME');

		$profile 			= new Profile();
		$profile->name 		= $adminProfileName;
		$profile->save();
	}

}