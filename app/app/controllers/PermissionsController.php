<?php

class PermissionsController extends BaseController
{
	public function getEdit($id = null)
	{
		$m		= Modules::all();
		//$p		= Permissions::where('profiles_id','=',$id)->get();

		foreach($m as $a)
		{
			echo($a->Permissions);
		}

		return;
		return View::make('permissions.form')->with($data);
	}
}

?>