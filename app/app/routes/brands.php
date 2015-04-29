<?php
	//categories
	//GET
	Route::group(array('before'=>'validation:12-read'),function()
	{
		Route::get('marcas/{model?}/{search?}', array('as' => 'brands', 		'uses'  => 'BrandsController@getIndex'));
	});

	Route::group(array('before'=>'validation:12-edit'),function()
	{
		Route::get('marcas_editar/{id?}', 		array('as' => 'brands_edit_form',	'uses'	=> 'BrandsController@formModal'));
		Route::post('marcas_editar/{id?}', 		array('as' => 'brands_post_edit', 	'uses' 	=> 'BrandsController@postEdit'));
	});

	Route::group(array('before'=>'validation:12-delete'),function()
	{
		Route::get('marcas_borrar/{id?}', 		array('as' => 'brands_delete',		'uses'	=> 'BrandsController@getDel'));
	});

	Route::group(array('before'=>'validation:12-delete'),function()
	{
		Route::get('marcas_nuevo', 				array('as' => 'brands_new_form', 	'uses'  => 'BrandsController@formModal'));
		Route::post('marcas_nuevo', 			array('as' => 'brands_post_new', 	'uses' 	=> 'BrandsController@postNew'));
	});

	
?>