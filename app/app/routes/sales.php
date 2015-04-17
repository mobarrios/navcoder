<?php
	//Ventas

	Route::group(array('before'=>'validation:7-read'),function()
	{	
		Route::get('ventas', 						array('as' => 'sales', 				'uses'  => 'SalesController@getNew'));
		Route::get('ventas_lista', 					array('as' => 'sales_list', 		'uses'  => 'SalesController@getList'));
		Route::get('remito_sales/{id}', 			array('as'=>'sales_remito', 'uses'=>'SalesController@getRemito'));

	});

	Route::group(array('before'=>'validation:7-edit'),function()
	{
		Route::get('ventas_editar/{id?}', 			array('as' => 'sales_edit_form',	'uses'	=> 'SalesController@formModal'));
		Route::post('ventas_editar/{id?}', 			array('as' => 'sales_post_edit', 	'uses' 	=> 'SalesController@postEdit'));
	
	
	});

	Route::group(array('before'=>'validation:7-delete'),function()
	{
		Route::get('ventas_borrar/{id?}', 			array('as' => 'sales_delete',		'uses'	=> 'SalesController@getDel'));
		Route::get('delitem_sales/{id}',			array('as'=>'sales_delitem', 'uses'=>'SalesController@getDelitem'));
	

	});

	Route::group(array('before'=>'validation:7-add'),function()
	{
		Route::get('ventas_nuevo_pagina', 			array('as' => 'sales_new_page',		'uses'  => 'SalesController@getNew'));
		Route::get('ventas_nuevo', 					array('as' => 'sales_new_form', 	'uses'  => 'SalesController@formModal'));	
		Route::post('ventas_nuevo', 				array('as' => 'sales_post_new', 	'uses' 	=> 'SalesController@postNew'));
		Route::post('additem_sales', 'SalesController@postAdditem');
		Route::get('process_sales', 	   			array('as'=>'sales_process', 'uses'=>'SalesController@getProcess'));
		Route::get('cancelar', 						array('as' => 'sales_cancel', 'uses' => 'SalesController@getCancel'));

	});

	//Route::get('compras/{model?}/{search?}', 	array('as' => 'purchases', 				'uses'  => 'PurchasesController@getIndex'));
	

	



?>