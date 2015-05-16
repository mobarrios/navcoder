<?php
	//reservations

	Route::group(array('before'=>'validation:5-read'),function()
	{	
		Route::get('reservations/{model?}/{search?}', 	array('as' => 'reservations', 					'uses'  => 'ReservationsController@getIndex'));	
	});

	Route::group(array('before'=>'validation:5-edit'),function()
	{
		Route::get('reservations_editar/{id?}', 		array('as' => 'reservations_edit_form',			'uses'	=> 'ReservationsController@formModal'));	
		Route::post('reservations_editar/{id?}', 		array('as' => 'reservations_post_edit', 		'uses' 	=> 'ReservationsController@postEdit'));
	});

	Route::group(array('before'=>'validation:5-delete'),function()
	{
		Route::get('reservations_borrar/{id?}', 		array('as' => 'reservations_delete',			'uses'	=> 'ReservationsController@getDel'));
	
	});

	Route::group(array('before'=>'validation:5-add'),function()
	{
		Route::get('reservations_nuevo', 				array('as' => 'reservations_new_form', 			'uses'  => 'ReservationsController@formModal'));
		Route::post('reservations_nuevo', 				array('as' => 'reservations_post_new', 			'uses' 	=> 'ReservationsController@postNew'));
	});

?>