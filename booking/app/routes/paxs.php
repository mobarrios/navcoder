<?php
	//paxs
	//GET
	Route::group(array('before'=>'validation:6-read'),function()
	{
		Route::get('paxs/{model?}/{search?}', array('as' => 'paxs', 		'uses'  => 'PaxsController@getIndex'));
	});

	Route::group(array('before'=>'validation:6-edit'),function()
	{
		Route::get('paxs_editar/{id?}', 		array('as' => 'paxs_edit_form',	'uses'	=> 'PaxsController@formModal'));
		Route::post('paxs_editar/{id?}', 		array('as' => 'paxs_post_edit', 	'uses' 	=> 'PaxsController@postEdit'));
	});

	Route::group(array('before'=>'validation:6-delete'),function()
	{
		Route::get('paxs_borrar/{id?}', 		array('as' => 'paxs_delete',		'uses'	=> 'PaxsController@getDel'));
	});

	Route::group(array('before'=>'validation:6-delete'),function()
	{
		Route::get('paxs_nuevo', 				array('as' => 'paxs_new_form', 	'uses'  => 'PaxsController@formModal'));
		Route::post('paxs_nuevo', 			array('as' => 'paxs_post_new', 	'uses' 	=> 'PaxsController@postNew'));
	});

	
?>