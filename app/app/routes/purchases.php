<?php
	//compras

	//Route::get('compras/{model?}/{search?}', 	array('as' => 'purchases', 				'uses'  => 'PurchasesController@getIndex'));
	Route::get('compras', 						array('as' => 'purchases', 				'uses'  => 'PurchasesController@getNew'));
	Route::get('compras Lista', 				array('as' => 'purchases_list', 		'uses'  => 'PurchasesController@getList'));
	
	Route::get('compras_nuevo_pagina', 			array('as' => 'purchase_new_page',		'uses'  => 'PurchasesController@getNew'));
	Route::get('compras_nuevo', 				array('as' => 'purchases_new_form', 	'uses'  => 'PurchasesController@formModal'));
	
	Route::get('compras_editar/{id?}', 			array('as' => 'purchases_edit_form',	'uses'	=> 'PurchasesController@formModal'));
	Route::get('compras_borrar/{id?}', 			array('as' => 'purchases_delete',		'uses'	=> 'PurchasesController@getDel'));

	Route::post('compras_nuevo', 				array('as' => 'purchases_post_new', 	'uses' 	=> 'PurchasesController@postNew'));
	Route::post('compras_editar/{id?}', 		array('as' => 'purchases_post_edit', 	'uses' 	=> 'PurchasesController@postEdit'));
	Route::post('cerrar_compra', 				array('as' => 'purchases_post_close', 	'uses'  => 'PurchasesController@postNewpurchase'));

	Route::post('additem', 'PurchasesController@postAdditem');

	Route::get('delitem/{id}',				 array('as'=>'purchases_delitem', 'uses'=>'PurchasesController@getDelitem'));
	Route::get('process_purchases', 	   array('as'=>'purchases_process', 'uses'=>'PurchasesController@getProcess'));

	Route::get('remito_purchase/{id}', array('as'=>'purchases_remito', 'uses'=>'PurchasesController@getRemito'));

?>