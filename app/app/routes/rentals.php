<?php
	//Alquileres

		Route::group(array('before'=>'validation:13-read'),function()
		{	
			Route::get('alquileres', 					array('as' => 'rentals', 				'uses'  => 'RentalsController@getNew'));
			Route::get('alquileres_lista', 				array('as' => 'rentals_list', 		'uses'  => 'RentalsController@getList'));
			Route::get('remito_rentals/{id}', 			array('as'=>'rentals_remito', 		'uses'	=>'RentalsController@getRemito'));

		});

		Route::group(array('before'=>'validation:13-edit'),function()
		{
			Route::get('alquileres_editar/{id?}', 			array('as' => 'rentals_edit_form',	'uses'	=> 'RentalsController@formModal'));
			Route::post('alquileres_editar/{id?}', 			array('as' => 'rentals_post_edit', 	'uses' 	=> 'RentalsController@postEdit'));
		
		
		});

		Route::group(array('before'=>'validation:13-delete'),function()
		{
			Route::get('alquileres_borrar/{id?}', 		array('as' => 'rentals_delete',		'uses'	=> 'RentalsController@getDel'));
			Route::get('delitem_rentals/{id}',			array('as'=>'rentals_delitem', 'uses'=>'RentalsController@getDelitem'));
		

		});

		Route::group(array('before'=>'validation:13-add'),function()
		{
			Route::get('alquileres_nuevo_pagina', 			array('as' => 'rentals_new_page',		'uses'  => 'RentalsController@getNew'));
			Route::get('alquileres_nuevo', 					array('as' => 'rentals_new_form', 	'uses'  => 'RentalsController@formModal'));	
			Route::post('alquileres_nuevo', 				array('as' => 'rentals_post_new', 	'uses' 	=> 'RentalsController@postNew'));
			
			Route::post('additem_rentals', 'RentalsController@postAdditem');
			Route::post('additem_sancus_rentals', 'RentalsController@postAdditemSancus');

			Route::get('process_rentals_sancus', 	   	array('as'=>'rentals_process_sancus', 'uses'	=>'RentalsController@getProcessSancus'));
			Route::get('process_rentals', 	   			array('as'=>'rentals_process', 		'uses'	=>'RentalsController@getProcess'));
			Route::get('cancelar', 						array('as' => 'rentals_cancel', 		'uses' 	=> 'RentalsController@getCancel'));

		});

	//Route::get('compras/{model?}/{search?}', 	array('as' => 'purchases', 				'uses'  => 'PurchasesController@getIndex'));
	

	



?>