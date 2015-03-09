<?php
	//providers
	//GET
	Route::get('proveedores/{model?}/{search?}', array('as' => 'providers', 		'uses'  => 'ProvidersController@getIndex'));
	Route::get('proveedores_nuevo', 		array('as' => 'providers_new_form', 	'uses'  => 'ProvidersController@formModal'));
	Route::get('proveedores_editar/{id?}', 	array('as' => 'providers_edit_form',	'uses'	=> 'ProvidersController@formModal'));
	Route::get('proveedores_borrar/{id?}', 	array('as' => 'providers_delete',		'uses'	=> 'ProvidersController@getDel'));
	//POST
	Route::post('proveedores_nuevo', 		array('as' => 'providers_post_new', 	'uses' 	=> 'ProvidersController@postNew'));
	Route::post('proveedores_editar/{id?}', array('as' => 'providers_post_edit', 	'uses' 	=> 'ProvidersController@postEdit'));
?>