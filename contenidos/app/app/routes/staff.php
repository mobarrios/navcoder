<?php
	//categories
	//GET
	Route::group(array('before'=>'validation:13-read'),function()
	{
		Route::get('staff/{model?}/{search?}', array('as' => 'staff_list', 		'uses'  => 'StaffController@getIndex'));
	});

	Route::group(array('before'=>'validation:13-edit'),function()
	{
		Route::get('staff_editar/{id?}', 		array('as' => 'staff_edit_form',	'uses'	=> 'StaffController@formModal'));
		Route::post('staff_editar/{id?}', 		array('as' => 'staff_post_edit', 	'uses' 	=> 'StaffController@postEdit'));
	});

	Route::group(array('before'=>'validation:13-delete'),function()
	{
		Route::get('staff_borrar/{id?}', 		array('as' => 'staff_delete',		'uses'	=> 'StaffController@getDel'));
	});

	Route::group(array('before'=>'validation:13-delete'),function()
	{
		Route::get('staff_nuevo', 				array('as' => 'staff_new_form', 	'uses'  => 'StaffController@formModal'));
		Route::post('staff_nuevo', 			array('as' => 'staff_post_new', 	'uses' 	=> 'StaffController@postNew'));
	});

	
?>