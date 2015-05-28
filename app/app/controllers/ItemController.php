<?php

class ItemController extends BaseController
{
	protected $data 	 =  array();
	protected $img_path ;
	protected $search_by =  array();

	public function __construct()
	{		
		$this->data['module'] 		= Config::get('constants.ITEM_MODULE_NAME');
		$this->data['path'] 		= Config::get('constants.ITEM_MODULE_PATH');
		$this->data['model'] 		= Config::get('constants.ITEM_MODEL_NAME');

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

		$categories = Input::has('chk_category') ? Input::get('chk_category') : array();
		
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
			//$input['image'] = $item->image;
			unset($input['image']);
		}
	
	// Save the object

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

?>