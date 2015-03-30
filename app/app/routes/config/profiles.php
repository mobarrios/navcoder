<?php
	//profiles
	
	Route::get('perfiles/{model?}/{search?}', 	array('as' => 'profiles', 				'uses'  => 'ProfilesController@getIndex'));
	Route::get('perfiles_nuevo', 				array('as' => 'profiles_new_form', 		'uses'  => 'ProfilesController@formModal'));
	Route::get('perfiles_editar/{id?}', 		array('as' => 'profiles_edit_form',		'uses'	=> 'ProfilesController@formModal'));
	Route::get('perfiles_borrar/{id?}', 		array('as' => 'profiles_delete',		'uses'	=> 'ProfilesController@getDel'));

	Route::post('perfiles_nuevo', 				array('as' => 'profiles_post_new', 		'uses' 	=> 'ProfilesController@postNew'));
	Route::post('perfiles_editar/{id?}', 		array('as' => 'profiles_post_edit', 	'uses' 	=> 'ProfilesController@postEdit'));

?>