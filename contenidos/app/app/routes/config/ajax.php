<?php

		Route::get('ajax',function(){

				//$j = array('data'=> array(array('id'=>'2','name'=>'Tiger Nixon')));

				$m 		= Items::all();				
				



			//	$mod 	= array();

				foreach($m as $model)
				{
					
			//		array_push($mod, array('id' => $model->id ,'name'=> $model->name));
				}

				$items['data'] = $mod;

			
			return Response::json($items);

			});
?>