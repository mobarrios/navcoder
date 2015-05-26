<?php
	//medicalinsurances
	
	Route::get('medicalinsurances/{model?}/{search?}', 	array('as' => 'medicalinsurances', 				'uses'  => 'medicalinsurancesController@getIndex'));
	Route::get('medicalinsurances_nuevo', 				array('as' => 'medicalinsurances_new_form', 	'uses'  => 'medicalinsurancesController@formModal'));
	Route::get('medicalinsurances_editar/{id?}', 		array('as' => 'medicalinsurances_edit_form',	'uses'	=> 'medicalinsurancesController@formModal'));
	Route::get('medicalinsurances_borrar/{id?}', 		array('as' => 'medicalinsurances_delete',		'uses'	=> 'medicalinsurancesController@getDel'));

	Route::post('medicalinsurances_nuevo', 				array('as' => 'medicalinsurances_post_new', 	'uses' 	=> 'medicalinsurancesController@postNew'));
	Route::post('medicalinsurances_editar/{id?}', 		array('as' => 'medicalinsurances_post_edit', 	'uses' 	=> 'medicalinsurancesController@postEdit'));

?>