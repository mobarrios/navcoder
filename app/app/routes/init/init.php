<?php

	Route::get('iniciar', array('as'=>'init', 'uses'=>'InitController@inicio'));
	Route::post('iniciar', array('as'=>'post_loginit', 'uses'=>'InitController@postInicio'));
	Route::post('iniciar_post',array('as'=>'post_init', 'uses'=>'InitController@postInit'));


?>