<?php

class ItemController extends BaseController
{
	protected $data 	 =  array();
	protected $img_path ;
	protected $search_by =  array();

	public function __construct()
	{		

		$modelUpperCase 					= Config::get('constants.ITEM_MODEL_NAME_UPPER_CASE');
		$this->data['model'] 				= Config::get('constants.'.$modelUpperCase.'_MODEL_NAME');
		$this->data['module'] 				= Config::get('constants.'.$modelUpperCase.'_MODULE_NAME');
		$this->data['path'] 				= Config::get('constants.'.$modelUpperCase.'_MODULE_PATH');
		$this->data['newPathMethodGet'] 	= Config::get('constants.'.$modelUpperCase.'_NEW_PATH_METHOD_GET');
		$this->data['editPathMethodGet']	= Config::get('constants.'.$modelUpperCase.'_EDIT_PATH_METHOD_GET');
		$this->data['deletePathMethodGet']	= Config::get('constants.'.$modelUpperCase.'_DELETE_PATH_METHOD_GET');
		$this->data['newPathMethodPost']	= Config::get('constants.'.$modelUpperCase.'_NEW_PATH_METHOD_POST');
		$this->data['editPathMethodPost']	= Config::get('constants.'.$modelUpperCase.'_EDIT_PATH_METHOD_POST');

		//columnas de busqueda
		$this->search_by =  array('code','name','description');

		$this->img_path = Session::get('company')."/uploads/items/images/";
	}


	public function postNew()
	{
		//Receive data
		$input 		= Input::all();
		
		//Store categories
		$categories = Input::has('chk_category') ? Input::get('chk_category') : array();
		
		//Image
		$image 		= $input['image'];
		
		//Clear the input
		unset($input['chk_category']);
		unset($input['image']);

		// Create the objet
		$item 		= new Item($input);
		$item->save();
		// Input Categories
		$item->category()->sync($categories);

		// Input Image
		if(isset($input['image']))
		{
			$up 	= Upload::up($input['image'] , $this->img_path);
			$up 	= $this->img_path.$up;
		}
				
		// Save the object
		$item->save();
		
		return Redirect::back();	
	}


	//post edit
	public function postEdit($id = null)
	{	
		// Receive data
		$input 		= Input::all();

		//Store categories
		$categories = Input::has('chk_category') ? Input::get('chk_category') : array();
		
		//Clear the input
		unset($input['chk_category']);

		$item 		= Item::find($id);

		$item->category()->sync($categories);


		if (Input::hasFile('image'))
		{	
			if($item->image != NULL)
			{
				Upload::del($item->image);
			}
			
			$up_file = Upload::up($input['image'] , $this->img_path );
			$input['image']  = $up_file;			
		}
		else
		{
			unset($input['image']);
		}

		$item->fill($input);
		$item->save();
		
		return Redirect::back();

	}

	public function getDel($id = null)
	{
		$item  	= Item::find($id);

		if($item->image != NULL)
		{
			Upload::del($item->image);
		} 

		$item->delete();

		return Redirect::back();
	}

}