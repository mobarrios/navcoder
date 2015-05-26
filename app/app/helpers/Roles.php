<?php 

class Roles
{

	public static function validate($module = null , $action = null)
	{
			$module 		= Module::where('name','=',$module)->first()->id;
			$action 		= $action;
			$user_profile 	= Auth::User()->profile_id;

			$permission 	= Permission::where('module_id','=',$module)->where('profile_id','=',$user_profile);

			if($permission->count() != 0)
			{
				if($permission->first()->$action == 1)
				{
					return true;	
				}
					return false;	
			}
			else
			{
				return false;
			}
	}

	public static function availableModules()
	{
		$actions = array(
							'read',
							'edit',
							'delete',
							'add'
						);

		$availableModules = array();

		//get modules
		$modules = Module::all();

		//process modules
		foreach($modules as $module){
			foreach($actions as $action){

				switch ($action) {
					case 'read':
						$availableModules[] = $module;
						break 2;

					case 'edit':
						$availableModules[] = $module;
						break 2;

					case 'delete':
						$availableModules[] = $module;
						break 2;

					case 'add':
						$availableModules[] = $module;
						break 2;
				}

			}
			
		}

		return $availableModules;
	}

}

?>