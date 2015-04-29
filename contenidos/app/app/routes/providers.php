<?php
	//providers

	Route::group(array('before'=>'validation:5-read'),function()
	{	
		Route::get('proveedores/{model?}/{search?}', array('as' => 'providers', 		'uses'  => 'ProvidersController@getIndex'));
	});

	Route::group(array('before'=>'validation:5-edit'),function()
	{
		Route::get('proveedores_editar/{id?}', 	array('as' => 'providers_edit_form',	'uses'	=> 'ProvidersController@formModal'));
		Route::post('proveedores_editar/{id?}', array('as' => 'providers_post_edit', 	'uses' 	=> 'ProvidersController@postEdit'));
	});

	Route::group(array('before'=>'validation:5-delete'),function()
	{
		Route::get('proveedores_borrar/{id?}', 	array('as' => 'providers_delete',		'uses'	=> 'ProvidersController@getDel'));
	});

	Route::group(array('before'=>'validation:5-add'),function()
	{
		Route::get('proveedores_nuevo', 		array('as' => 'providers_new_form', 	'uses'  => 'ProvidersController@formModal'));
		Route::post('proveedores_nuevo', 		array('as' => 'providers_post_new', 	'uses' 	=> 'ProvidersController@postNew'));
	});
	

?>