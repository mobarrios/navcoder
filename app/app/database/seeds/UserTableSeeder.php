<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$adminProfileName 	= Config::get('constants.ADMIN_PROFILE_NAME');
		$adminUserName    	= Config::get('constants.ADMIN_USER_NAME');
		$adminUserLastName 	= Config::get('constants.ADMIN_USER_LAST_NAME');
		$adminUserEmail		= Config::get('constants.ADMIN_USER_EMAIL');
		$adminUserPassword	= Config::get('constants.ADMIN_USER_PASS');

		$adminProfile 		= Profile::where('name','=',$adminProfileName)->first();

		$user 				= new User();
		$user->name 		= $adminUserName;
		$user->last_name 	= $adminUserLastName;
		$user->email 		= $adminUserEmail;
		$user->password 	= Hash::make($adminUserPassword);
		$user->profile_id   = $adminProfile->id;
		$user->save();
	}

}