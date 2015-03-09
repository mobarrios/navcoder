<?php
	//categories
	//GET
	Route::get('categorias/{model?}/{search?}', array('as' => 'categories', 		'uses'  => 'CategoriesController@getIndex'));
	Route::get('categorias_nuevo', 				array('as' => 'categories_new_form', 	'uses'  => 'CategoriesController@formModal'));
	Route::get('categorias_editar/{id?}', 		array('as' => 'categories_edit_form',	'uses'	=> 'CategoriesController@formModal'));
	Route::get('categorias_borrar/{id?}', 		array('as' => 'categories_delete',		'uses'	=> 'CategoriesController@getDel'));
	//POST
	Route::post('categorias_nuevo', 			array('as' => 'categories_post_new', 	'uses' 	=> 'CategoriesController@postNew'));
	Route::post('categorias_editar/{id?}', 		array('as' => 'categories_post_edit', 	'uses' 	=> 'CategoriesController@postEdit'));
?>