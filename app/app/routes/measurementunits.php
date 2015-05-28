<?php

	//GET
	Route::get('measurementunits/{model?}/{search?}', array('as' => 'measurementunits', 		'uses'  => 'MeasurementunitController@getIndex'));
	Route::get('measurementunits_nuevo', 				array('as' => 'measurementunits_new_form', 	'uses'  => 'MeasurementunitController@formModal'));
	Route::get('measurementunits_editar/{id?}', 		array('as' => 'measurementunits_edit_form',	'uses'	=> 'MeasurementunitController@formModal'));
	Route::get('measurementunits_borrar/{id?}', 		array('as' => 'measurementunits_delete',		'uses'	=> 'MeasurementunitController@getDel'));
	//POST
	Route::post('measurementunits_nuevo', 			array('as' => 'measurementunits_post_new', 	'uses' 	=> 'MeasurementunitController@postNew'));
	Route::post('measurementunits_editar/{id?}', 		array('as' => 'measurementunits_post_edit', 	'uses' 	=> 'MeasurementunitController@postEdit'));
?>