<?php
	//compras

	Route::get('compras/{model?}/{search?}', 	array('as' => 'purchases', 				'uses'  => 'PurchasesController@getIndex'));
	Route::get('compras_nuevo_pagina', 			array('as' => 'purchase_new_page',		'uses'  => 'PurchasesController@getNew'));
	Route::get('compras_nuevo', 				array('as' => 'purchases_new_form', 	'uses'  => 'PurchasesController@formModal'));
	Route::get('compras_editar/{id?}', 			array('as' => 'purchases_edit_form',	'uses'	=> 'PurchasesController@formModal'));
	Route::get('compras_borrar/{id?}', 			array('as' => 'purchases_delete',		'uses'	=> 'PurchasesController@getDel'));

	Route::post('compras_nuevo', 				array('as' => 'purchases_post_new', 	'uses' 	=> 'PurchasesController@postNew'));
	Route::post('compras_editar/{id?}', 		array('as' => 'purchases_post_edit', 	'uses' 	=> 'PurchasesController@postEdit'));

	Route::post('additem', 'PurchasesController@postAdditem');

?>