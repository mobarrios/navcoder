<?php
	//items

	Route::get('articulos/{model?}/{search?}', 	array('as' => 'items', 			'uses'  => 'ItemsController@getIndex'));
	Route::get('articulos_nuevo', 				array('as' => 'items_new_form', 'uses'  => 'ItemsController@formModal'));
	Route::get('articulos_editar/{id?}', 		array('as' => 'items_edit_form','uses'	=> 'ItemsController@formModal'));
	Route::get('articulos_borrar/{id?}', 		array('as' => 'items_delete',	'uses'	=> 'ItemsController@getDel'));

	Route::post('articulos_nuevo', 				array('as' => 'items_post_new', 'uses' 	=> 'ItemsController@postNew'));
	Route::post('articulos_editar/{id?}', 		array('as' => 'items_post_edit','uses' 	=> 'ItemsController@postEdit'));
?>