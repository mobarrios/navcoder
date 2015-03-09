<?php
	//clients

	Route::get('clientes/{model?}/{search?}', 	array('as' => 'clients', 			'uses'  => 'ClientsController@getIndex'));
	Route::get('clientes_nuevo', 				array('as' => 'clients_new_form', 	'uses'  => 'ClientsController@formModal'));
	Route::get('clientes_editar/{id?}', 		array('as' => 'clients_edit_form',	'uses'	=> 'ClientsController@formModal'));
	Route::get('clientes_borrar/{id?}', 		array('as' => 'clients_delete',		'uses'	=> 'ClientsController@getDel'));

	Route::post('clientes_nuevo', 				array('as' => 'clients_post_new', 	'uses' 	=> 'ClientsController@postNew'));
	Route::post('clientes_editar/{id?}', 		array('as' => 'clients_post_edit', 	'uses' 	=> 'ClientsController@postEdit'));
	
?>