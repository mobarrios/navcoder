<?php
	//Rooms
	
	Route::group(array('before'=>'validation:1-read'),function()
	{
		Route::get('rooms/{model?}/{search?}', 	array('as' => 'rooms', 	'uses'  => 'RoomsController@getIndex'));
	});

	Route::group(array('before'=>'validation:1-edit'),function()
	{
		Route::get('rooms_editar/{id?}', 		array('as' => 'rooms_edit_form','uses'	=> 'RoomsController@formModal'));
		Route::post('rooms_editar/{id?}', 		array('as' => 'rooms_post_edit','uses' 	=> 'RoomsController@postEdit'));	
	});

	Route::group(array('before'=>'validation:1-delete'),function()
	{
		Route::get('rooms_borrar/{id?}', 		array('as' => 'rooms_delete',	'uses'	=> 'RoomsController@getDel'));
	});

	Route::group(array('before'=>'validation:1-add'),function()
	{
		Route::get('rooms_nuevo', 				array('as' => 'rooms_new_form', 'uses'  => 'RoomsController@formModal'));
		Route::post('rooms_nuevo', 				array('as' => 'rooms_post_new', 'uses' 	=> 'RoomsController@postNew'));
	});	

?>
