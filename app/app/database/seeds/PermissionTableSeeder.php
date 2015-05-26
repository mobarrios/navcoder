<?php

class PermissionTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//	traer al profile administrador
		$adminProfile 	= 	Profile::where('name','=',Config::get('constants.ADMIN_PROFILE_NAME'))->first();

		//	traer todos los modulos
		$modules		=	Module::all();

		//	Asignarle todos los permisos al 

		foreach($modules as $module)
		{
			//	Crear objeto permisos

			$permission 	=	new Permission;

			$permission->module_id 	= $module->id;
			$permission->profile_id = $adminProfile->id;
			$permission->read 		= true;
			$permission->edit 		= true;
			$permission->delete		= true;
			$permission->add 		= true;

			$permission->save();
		}

	}

}