<?php
	//obras
	
	Route::get('obrassociales/{model?}/{search?}', 	array('as' => 'obras', 				'uses'  => 'ObrasController@getIndex'));
	Route::get('obrassociales_nuevo', 				array('as' => 'obras_new_form', 	'uses'  => 'ObrasController@formModal'));
	Route::get('obrassociales_editar/{id?}', 		array('as' => 'obras_edit_form',	'uses'	=> 'ObrasController@formModal'));
	Route::get('obrassociales_borrar/{id?}', 		array('as' => 'obras_delete',		'uses'	=> 'ObrasController@getDel'));

	Route::post('obrassociales_nuevo', 				array('as' => 'obras_post_new', 	'uses' 	=> 'ObrasController@postNew'));
	Route::post('obrassociales_editar/{id?}', 		array('as' => 'obras_post_edit', 	'uses' 	=> 'ObrasController@postEdit'));

?>