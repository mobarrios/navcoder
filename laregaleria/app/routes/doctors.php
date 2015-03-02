<?php
	//doctors
	
	Route::get('doctores/{model?}/{search?}', 	array('as' => 'doctors', 			'uses'  => 'DoctorsController@getIndex'));
	Route::get('doctores_nuevo', 				array('as' => 'doctors_new_form', 	'uses'  => 'DoctorsController@formModal'));
	Route::get('doctores_editar/{id?}', 		array('as' => 'doctors_edit_form',	'uses'	=> 'DoctorsController@formModal'));
	Route::get('doctores_borrar/{id?}', 		array('as' => 'doctors_delete',		'uses'	=> 'DoctorsController@getDel'));

	Route::post('doctores_nuevo', 				array('as' => 'doctors_post_new', 	'uses' 	=> 'DoctorsController@postNew'));
	Route::post('doctores_editar/{id?}', 		array('as' => 'doctors_post_edit', 	'uses' 	=> 'DoctorsController@postEdit'));

?>