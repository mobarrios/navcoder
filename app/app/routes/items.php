<?php
	//items

	Route::get('items/{model?}/{search?}', 	array('as' => 'items', 	'uses'  => 'ItemController@getIndex'));

	

	Route::get('articulos_editar/{id?}', 		array('as' => 'items_edit_form','uses'	=> 'ItemController@formModal'));
	Route::post('articulos_editar/{id?}', 		array('as' => 'items_post_edit','uses' 	=> 'ItemController@postEdit'));	

	Route::get('articulos_borrar/{id?}', 		array('as' => 'items_delete',	'uses'	=> 'ItemController@getDel'));

	Route::get('items_new_form', 				array('as' => 'items_new_form', 'uses'  => 'ItemController@formModal'));
	Route::post('articulos_nuevo', 				array('as' => 'items_post_new', 'uses' 	=> 'ItemController@postNew'));