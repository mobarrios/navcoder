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

			$validator = Validator::make(Input::all(),array('code'=>'required|unique:items'));

			if ($validator->fails())
			{
				return Redirect::back()->withErrors($validator)->withInput(Input::all());
			}

		// Receive data

				$input 		= Input::all();

				$categories = Input::has('chk_category') ? Input::get('chk_category') : array();

				//$up 		= new upload();
			
				unset($input['chk_category']);


		// Create the objet
			

			//$item 		=  new Items();

			// Input Image

				
				
		// Save the object
						

			//$item->fill($input);
			//$item->save();
		

			$model::create($input);

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

			// Input Image
				/*
				if (Input::hasFile('image'))
				{					
					if($item->image != null)
					{
						$up->del($item->image);	

						return "aa".$item->image;
					}

					$up_file = $up->up($input['image'] , $this->img_path);

					if( $up_file != false )
					{					
						

						$input['image'] =  $this->img_path.$up_file;

						$item->image    =  $input['image'];
					}
					else
					{
						$item['image'] = $item->image;
					}

				}
				else
				{
					$item['image'] = $item->image;
				}
				*/
				
		// Save the object

			$item->fill($input);
			$item->save();
			
			return Redirect::back();

	}

	public function getDel($id = null)
	{
		$model 	= $this->data['model'];
		$mod  	= $model::find($id);
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