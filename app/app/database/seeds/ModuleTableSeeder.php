<?php

class ModuleTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		$modules = array(
						array(
							"name" => Config::get('constants.ITEM_MODULE_NAME'),
							"path" => Config::get('constants.ITEM_MODULE_PATH')
						),
						array(
							"name" => Config::get('constants.CATEGORY_MODULE_NAME'),
							"path" => Config::get('constants.CATEGORY_MODULE_PATH')
						),
						array(
							"name" => Config::get('constants.USER_MODULE_NAME'),
							"path" => Config::get('constants.USER_MODULE_PATH')
						),
						array(
							"name" => Config::get('constants.PROFILE_MODULE_NAME'),
							"path" => Config::get('constants.PROFILE_MODULE_PATH')
						),
						array(
							"name" => Config::get('constants.PROVIDER_MODULE_NAME'),
							"path" => Config::get('constants.PROVIDER_MODULE_PATH')
						),
						array(
							"name" => Config::get('constants.CLIENT_MODULE_NAME'),
							"path" => Config::get('constants.CLIENT_MODULE_PATH')
						),
						array(
							"name" => Config::get('constants.SALE_MODULE_NAME'),
							"path" => Config::get('constants.SALE_MODULE_PATH')
						),
						array(
							"name" => Config::get('constants.PURCHASE_MODULE_NAME'),
							"path" => Config::get('constants.PURCHASE_MODULE_PATH')
						),
						array(
							"name" => Config::get('constants.DOCTOR_MODULE_NAME'),
							"path" => Config::get('constants.DOCTOR_MODULE_PATH')
						),
						array(
							"name" => Config::get('constants.MEDICALINSURANCE_MODULE_NAME'),
							"path" => Config::get('constants.MEDICALINSURANCE_MODULE_PATH')
						),
						array(
							"name" => Config::get('constants.MEASUREMENTUNIT_MODULE_NAME'),
							"path" => Config::get('constants.MEASUREMENTUNIT_MODULE_PATH')
						),
					);

		foreach($modules as $module)
		{
			$newModule = new Module();
			$newModule->name = $module['name'];
			$newModule->path = $module['path'];
			$newModule->save();
		}

	}

}
