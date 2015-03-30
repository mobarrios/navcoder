<?php
	//items
	
	Route::group(array('before'=>'validation:items-read'),function()
	{
		Route::get('articulos/{model?}/{search?}', 	array('as' => 'items', 			'uses'  => 'ItemsController@getIndex'));
	});

	Route::group(array('before'=>'validation:items-edit'),function()
	{
		Route::get('articulos_editar/{id?}', 		array('as' => 'items_edit_form','uses'	=> 'ItemsController@formModal'));
		Route::post('articulos_editar/{id?}', 		array('as' => 'items_post_edit','uses' 	=> 'ItemsController@postEdit'));	
	});

	Route::group(array('before'=>'validation:items-delete'),function()
	{
		Route::get('articulos_borrar/{id?}', 		array('as' => 'items_delete',	'uses'	=> 'ItemsController@getDel'));
	});

	Route::group(array('before'=>'validation:items-add'),function()
	{
		Route::get('articulos_nuevo', 				array('as' => 'items_new_form', 'uses'  => 'ItemsController@formModal'));
		Route::post('articulos_nuevo', 				array('as' => 'items_post_new', 'uses' 	=> 'ItemsController@postNew'));
	});


	
	
	

?>