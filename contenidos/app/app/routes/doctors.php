<?php
	//doctors
	
	Route::group(array('before'=>'validation:9-read'),function()
	{	
		Route::get('doctores/{model?}/{search?}', 	array('as' => 'doctors', 			'uses'  => 'DoctorsController@getIndex'));	
	});

	Route::group(array('before'=>'validation:9-edit'),function()
	{
		Route::get('doctores_editar/{id?}', 		array('as' => 'doctors_edit_form',	'uses'	=> 'DoctorsController@formModal'));
		Route::post('doctores_editar/{id?}', 		array('as' => 'doctors_post_edit', 	'uses' 	=> 'DoctorsController@postEdit'));
	});

	Route::group(array('before'=>'validation:9-delete'),function()
	{
		Route::get('doctores_borrar/{id?}', 		array('as' => 'doctors_delete',		'uses'	=> 'DoctorsController@getDel'));
	});

	Route::group(array('before'=>'validation:9-add'),function()
	{
		Route::get('doctores_nuevo', 				array('as' => 'doctors_new_form', 	'uses'  => 'DoctorsController@formModal'));
		Route::post('doctores_nuevo', 				array('as' => 'doctors_post_new', 	'uses' 	=> 'DoctorsController@postNew'));
	});
	

?>