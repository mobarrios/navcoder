<?php
	//planes
	
	Route::group(array('before'=>'validation:10-read'),function()
	{	
		Route::get('planes/{model?}/{search?}', 	array('as' => 'planes', 				'uses'  => 'PlanesController@getIndex'));
	});
	Route::group(array('before'=>'validation:10-edit'),function()
	{
		Route::get('planes_editar/{id?}', 		array('as' => 'planes_edit_form',	'uses'	=> 'PlanesController@formModal'));
		Route::post('planes_editar/{id?}', 		array('as' => 'planes_post_edit', 	'uses' 	=> 'PlanesController@postEdit'));
	});

	Route::group(array('before'=>'validation:10-delete'),function()
	{
		Route::get('planes_borrar/{id?}', 		array('as' => 'planes_delete',		'uses'	=> 'PlanesController@getDel'));
	});

	Route::group(array('before'=>'validation:10-add'),function()
	{
		Route::get('planes_nuevo/{id}', 			array('as' => 'planes_new_form', 	'uses'  => 'PlanesController@formModal'));
		Route::post('planes_nuevo', 				array('as' => 'planes_post_new', 	'uses' 	=> 'PlanesController@postNew'));

	});

	
	
?>