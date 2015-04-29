<?php
	//categories
	//GET
	Route::group(array('before'=>'validation:2-read'),function()
	{
		Route::get('categorias/{model?}/{search?}', array('as' => 'categories', 		'uses'  => 'CategoriesController@getIndex'));
	});

	Route::group(array('before'=>'validation:2-edit'),function()
	{
		Route::get('categorias_editar/{id?}', 		array('as' => 'categories_edit_form',	'uses'	=> 'CategoriesController@formModal'));
		Route::post('categorias_editar/{id?}', 		array('as' => 'categories_post_edit', 	'uses' 	=> 'CategoriesController@postEdit'));
	});

	Route::group(array('before'=>'validation:2-delete'),function()
	{
		Route::get('categorias_borrar/{id?}', 		array('as' => 'categories_delete',		'uses'	=> 'CategoriesController@getDel'));
	});

	Route::group(array('before'=>'validation:2-delete'),function()
	{
		Route::get('categorias_nuevo', 				array('as' => 'categories_new_form', 	'uses'  => 'CategoriesController@formModal'));
		Route::post('categorias_nuevo', 			array('as' => 'categories_post_new', 	'uses' 	=> 'CategoriesController@postNew'));
	});

	
?>