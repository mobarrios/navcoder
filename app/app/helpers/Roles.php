<?php 

class Roles
{

	public static function validate($module = null , $action = null)
	{
			$module 		= Modules::where('name','=',$module)->first()->id;
			$action 		= $action;
			$user_profile 	= Auth::User()->profiles_id;

			$permission 	= Permissions::where('modules_id','=',$module)->where('profiles_id','=',$user_profile);

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

}

?>