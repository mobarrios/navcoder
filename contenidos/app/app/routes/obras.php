<?php
	//obras
	
	Route::group(array('before'=>'validation:10-read'),function()
	{	
		Route::get('obras/{model?}/{search?}', 	array('as' => 'obras', 				'uses'  => 'ObrasController@getIndex'));
	});
	Route::group(array('before'=>'validation:10-edit'),function()
	{
		Route::get('obras_editar/{id?}', 		array('as' => 'obras_edit_form',	'uses'	=> 'ObrasController@formModal'));
		Route::post('obras_editar/{id?}', 		array('as' => 'obras_post_edit', 	'uses' 	=> 'ObrasController@postEdit'));
	});

	Route::group(array('before'=>'validation:10-delete'),function()
	{
		Route::get('obras_borrar/{id?}', 		array('as' => 'obras_delete',		'uses'	=> 'ObrasController@getDel'));
	});

	Route::group(array('before'=>'validation:10-add'),function()
	{
		Route::get('obras_nuevo', 				array('as' => 'obras_new_form', 	'uses'  => 'ObrasController@formModal'));
		Route::post('obras_nuevo', 				array('as' => 'obras_post_new', 	'uses' 	=> 'ObrasController@postNew'));
	});

	
	
?>