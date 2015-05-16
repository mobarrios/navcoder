<?php

class ItemsController extends BaseController
{
	protected $data 	 =  array();
	protected $img_path ;
	protected $search_by =  array();

	public function __construct()
	{
		
		if(Session::get('company') == 'aclv')
		{
			$this->data['modal'] = 'items_aclv';
		}
		elseif(Session::get('company') == 'laregaleria')
		{
			$this->data['modal'] = 'items_laregaleria';
		}
		else
		{
			$this->data['modal'] 		= 'items';
		}

		$this->data['modules_id']	= 1;
		$this->data['ruta'] 		= 'items';
		$this->data['model'] 		= 'Items';
		$this->data['modulo'] 		= 'Articulos';
		$this->data['seccion']		= '';

		//columnas de busqueda
		$this->search_by =  array('code','name','description');

		$this->img_path = Session::get('company')."/uploads/items/images/";

	}


	public function postNew()
	{


			$model = $this->data['model'];

			/*
			$validator = Validator::make(Input::all(),array('code'=>'required|unique:items'));

			if ($validator->fails())
			{
				return Redirect::back()->withErrors($validator)->withInput(Input::all());
			}
*/
			// Receive data


				$input 				= Input::all();

				$categories 		= Input::has('chk_category') ? Input::get('chk_category') : array();
		
				$up 				= new upload();
			
				unset($input['chk_category']);

				if(Input::has('check'))
				{
					$arr_items_providers = array();

					foreach($input['check'] as $key => $val )
					{

						array_push($arr_items_providers, array('providers_id'=>$key , 'cost_price'=> $input['cost_'.$key] ));
						unset($input['cost_'.$key]);
					}

					unset($input['check']);
				}
			
				if (Input::hasFile('image'))
				{	
					$up_file = $up->up($input['image'] , $this->img_path );
					
					if( $up_file != false)
					{
						$input['image']  = $up_file;
					}

				}

		// Create the objet
			

			//$item 		=  new Items();

			// Input Image

				
				
		// Save the object
						

			//$item->fill($input);
			//$item->save();
		

			$model_item = $model::create($input);

			if(!is_null($categories))
			{
				foreach($categories as $cat)
				{
					$model_cat 					= new ItemsCategories();
					$model_cat->items_id 		= $model_item->id;
					$model_cat->categories_id 	= $cat;
					$model_cat->save();
				}	
			}

			if(isset($arr_items_providers))
			{
				foreach($arr_items_providers as $provider_cost )
				{	
					$items_providers 				= new ItemsProviders();
					$items_providers->items_id 		= $model_item->id;
					$items_providers->providers_id	= $provider_cost['providers_id'];
					$items_providers->cost_price 	= $provider_cost['cost_price'];
					$items_providers->save();
				}
			}



			// si esta el campo hidden items_providers recorre los checkbox seleccionados y los guarda en una session con el id del proveedor y el precio de costo


			//$item->categories()->sync($categories);

			return Redirect::back();
	
	}


	//post edit
	public function postEdit($id = null)
	{	
		// Receive data

			$input 		= Input::all();

			$categories = Input::has('chk_category') ? Input::get('chk_category') : array();

			$up 		= new upload();
			
			unset($input['chk_category']);
			
			$item 		= Items::find($id);


			if(Input::has('check'))
			{
				$arr_items_providers = array();

				foreach($input['check'] as $key => $val )
				{
					//borra los items providers que estan cargados y los reemplaza x el nuevo
					$itProv = ItemsProviders::where('items_id','=',$item->id)->where('providers_id','=',$key)->first();

					if($itProv)
					{
						$itProv->cost_price = $input['cost_'.$key];
						$itProv->save();
					}
					else
					{
						//array_push($arr_items_providers, array('providers_id'=>$key , 'cost_price'=> $input['cost_'.$key] ));
						$itProv 				= new ItemsProviders();
						$itProv->items_id 		= $item->id;
						$itProv->providers_id 	= $key;
						$itProv->cost_price 	= $input['cost_'.$key];
						$itProv->save();
					}		
					
					unset($input['cost_'.$key]);
				}

				unset($input['check']);
			}


			$item->categories()->sync($categories);


				if (Input::hasFile('image'))
				{	
					if($item->image != NULL)
					{
						$up->del($item->image);
					}
						$up_file = $up->up($input['image'] , $this->img_path );
					
					if( $up_file != false)
					{
						$input['image']  = $up_file;
					}

				}
				else
				{
					$input['image'] = $item->image;
				}
		
		// Save the object

			$item->fill($input);
			$item->save();
			
			return Redirect::back();

	}

	public function getDel($id = null)
	{
		$model 	= $this->data['model'];
		$mod  	= $model::find($id);

		$categories 	= ItemsCategories::where('items_id','=',$id)->delete();
		$itemProvider 	= ItemsProviders::where('items_id','=',$id)->delete();

		$up 	= new upload();

		if($mod->image != NULL)
		{
			$up->del($mod->image);
		} 

		$mod->delete();

		return Redirect::back();
	}

}

?>