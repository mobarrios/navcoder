<?php
//Permissions

Route::get('permisos/{id?}', 	array('as' => 'permissions', 'uses'  => 'PermissionsController@getEdit'));
	

?>