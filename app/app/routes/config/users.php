<?php
	//users
	
	Route::get('usuarios/{model?}/{search?}', 	array('as' => 'users', 				'uses'  => 'UsersController@getIndex'));
	Route::get('usuarios_nuevo', 				array('as' => 'users_new_form', 	'uses'  => 'UsersController@formModal'));
	Route::get('usuarios_editar/{id?}', 		array('as' => 'users_edit_form',	'uses'	=> 'UsersController@formModal'));
	Route::get('usuarios_borrar/{id?}', 		array('as' => 'users_delete',		'uses'	=> 'UsersController@getDel'));

	Route::post('usuarios_nuevo', 				array('as' => 'users_post_new', 	'uses' 	=> 'UsersController@postNew'));
	Route::post('usuarios_editar/{id?}', 		array('as' => 'users_post_edit', 	'uses' 	=> 'UsersController@postEdit'));

?>