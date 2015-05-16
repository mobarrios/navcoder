<?php
	//availables
	//GET
	Route::group(array('before'=>'validation:2-read'),function()
	{
		Route::get('availables/{model?}/{search?}', array('as' => 'availables', 		'uses'  => 'AvailablesController@getIndex'));
	});

	Route::group(array('before'=>'validation:2-edit'),function()
	{
		Route::get('availables_editar/{id?}', 		array('as' => 'availables_edit_form',	'uses'	=> 'AvailablesController@formModal'));
		Route::post('availables_editar/{id?}', 		array('as' => 'availables_post_edit', 	'uses' 	=> 'AvailablesController@postEdit'));
	});

	Route::group(array('before'=>'validation:2-delete'),function()
	{
		Route::get('availables_borrar/{id?}', 		array('as' => 'availables_delete',		'uses'	=> 'AvailablesController@getDel'));
	});

	Route::group(array('before'=>'validation:2-delete'),function()
	{
		Route::get('availables_nuevo', 				array('as' => 'availables_new_form', 	'uses'  => 'AvailablesController@formModal'));
		Route::post('availables_nuevo', 			array('as' => 'availables_post_new', 	'uses' 	=> 'AvailablesController@postNew'));
	});

	
?>