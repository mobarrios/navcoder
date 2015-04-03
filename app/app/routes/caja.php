<?php
	//caja

	//GET
	Route::get('caja/{model?}/{search?}', 	array('as' => 'caja', 					'uses'  => 'CajaController@getIndex'));
	Route::get('caja_nuevo', 				array('as' => 'caja_new_form', 			'uses'  => 'CajaController@formModal'));
	Route::get('caja_editar/{id?}', 		array('as' => 'caja_edit_form',			'uses'	=> 'CajaController@formModal'));
	Route::get('caja_borrar/{id?}', 		array('as' => 'caja_delete',			'uses'	=> 'CajaController@getDel'));
	//POST
	Route::post('caja_nuevo', 				array('as' => 'caja_post_new', 			'uses' 	=> 'CajaController@postNew'));
	Route::post('caja_editar/{id?}', 		array('as' => 'caja_post_edit', 		'uses' 	=> 'CajaController@postEdit'));
?>