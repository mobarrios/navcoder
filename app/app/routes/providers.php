<?php
	//Provider Routes	
	
	$modelUpperCase = Config::get('constants.PROVIDER_MODEL_NAME_UPPER_CASE');
	$controller 	= Config::get('constants.'.$modelUpperCase.'_MODEL_NAME').'Controller';
	$module 		= Config::get('constants.'.$modelUpperCase.'_MODULE_NAME');

	//variables
	$moduleNewPathMethodGET 	= Config::get('constants.'.$modelUpperCase.'_NEW_PATH_METHOD_GET');
	$moduleEditPathMethodGET 	= Config::get('constants.'.$modelUpperCase.'_EDIT_PATH_METHOD_GET');
	$moduleDeletePathMethodGET 	= Config::get('constants.'.$modelUpperCase.'_DELETE_PATH_METHOD_GET');

	$moduleNewPathMethodPOST 	= Config::get('constants.'.$modelUpperCase.'_NEW_PATH_METHOD_POST');
	$moduleEditPathMethodPOST 	= Config::get('constants.'.$modelUpperCase.'_EDIT_PATH_METHOD_POST');


	//GET
	Route::get($module.'/{model?}/{search?}', 		array('as' => $module, 						'uses'  => $controller.'@getIndex'));
	Route::get($moduleNewPathMethodGET, 			array('as' => $moduleNewPathMethodGET,		'uses'  => $controller.'@formModal'));
	Route::get($moduleEditPathMethodGET.'/{id?}',	array('as' => $moduleEditPathMethodGET,		'uses'	=> $controller.'@formModal'));
	Route::get($moduleDeletePathMethodGET.'/{id?}',	array('as' => $moduleDeletePathMethodGET,	'uses'	=> $controller.'@getDel'));
	
	//POST
	Route::post($moduleNewPathMethodPOST, 			array('as' => $moduleNewPathMethodPOST, 	'uses' 	=> $controller.'@postNew'));
	Route::post($moduleEditPathMethodPOST.'/{id?}', array('as' => $moduleEditPathMethodPOST, 	'uses' 	=> $controller.'@postEdit'));
