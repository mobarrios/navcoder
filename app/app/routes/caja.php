<?php
	//caja

	Route::group(array('before'=>'validation:11-read'),function()
	{	
		Route::get('caja/{model?}/{search?}', 	array('as' => 'caja', 					'uses'  => 'CajaController@getIndex'));	
	});

	Route::group(array('before'=>'validation:11-edit'),function()
	{
		Route::get('caja_editar/{id?}', 		array('as' => 'caja_edit_form',			'uses'	=> 'CajaController@formModal'));	
		Route::post('caja_editar/{id?}', 		array('as' => 'caja_post_edit', 		'uses' 	=> 'CajaController@postEdit'));
	});

	Route::group(array('before'=>'validation:11-delete'),function()
	{
		Route::get('caja_borrar/{id?}', 		array('as' => 'caja_delete',			'uses'	=> 'CajaController@getDel'));
	
	});

	Route::group(array('before'=>'validation:11-add'),function()
	{
		Route::get('caja_nuevo', 				array('as' => 'caja_new_form', 			'uses'  => 'CajaController@formModal'));
		Route::post('caja_nuevo', 				array('as' => 'caja_post_new', 			'uses' 	=> 'CajaController@postNew'));
	});

?>