<?php
	//availables
	//GET
	Route::group(array('before'=>'validation:7-read'),function()
	{
		Route::get('types/{model?}/{search?}', array('as' => 'types', 		'uses'  => 'TypesController@getIndex'));
	});

	Route::group(array('before'=>'validation:7-edit'),function()
	{
		Route::get('types_editar/{id?}', 		array('as' => 'types_edit_form',	'uses'	=> 'TypesController@formModal'));
		Route::post('types_editar/{id?}', 		array('as' => 'types_post_edit', 	'uses' 	=> 'TypesController@postEdit'));
	});

	Route::group(array('before'=>'validation:7-delete'),function()
	{
		Route::get('types_borrar/{id?}', 		array('as' => 'types_delete',		'uses'	=> 'TypesController@getDel'));
	});

	Route::group(array('before'=>'validation:7-delete'),function()
	{
		Route::get('types_nuevo', 				array('as' => 'types_new_form', 	'uses'  => 'TypesController@formModal'));
		Route::post('types_nuevo', 			array('as' => 'types_post_new', 	'uses' 	=> 'TypesController@postNew'));
	});

	
?>