<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	
	//inicio
	public function getIndex( $model= null , $search = null )
	{

		$model 	= $this->data['model'];		

		if(isset($search))
		{
			
			$mod  = $model::where('id','like','%'.$search.'%');
			
			foreach($this->search_by as $col)
			{
				$mod = $mod->orWhere($col,'like','%'.$search.'%');
			}
			
			$mod  = $mod->paginate('10');

			$this->data['model'] = $mod;
			
		}
		else
		{
			error_log("modelo : " . $model);
			$this->data['model'] 	= $model::orderBy('id' ,'ASC')->paginate('10');
		}
			
		return View::make('view')->with($this->data);

	}



	//open form modal
	public function formModal($id = null)
	{
		$model 					= $this->data['model'];

		$this->data['action']	= Config::get('constants.ACTION_ADD');

		if(!is_null($id))
		{
			$this->data['action']	= Config::get('constants.ACTION_EDIT');

			$this->data['model_edit'] 	= $model::find($id);
			
			return View::make('modal')->with($this->data);
		}

		return View::make('modal')->with($this->data);
	}

	// borra los datos
	public function getDel($id = null)
	{
		$model = $this->data['model'];
		$model::find($id)->delete();

		return Redirect::back();
	}


	//post nuevo
	public function postNew()
	{	
		$model = $this->data['model'];
	 	$model::create(Input::all());

	 	return Redirect::back();
	}

	//post edit
	public function postEdit($id = null)
	{	
		$model = $this->data['model'];
	 	$model = $model::find($id);

	 	$model->fill(Input::all());
	 	$model->save();
	 
	 	return Redirect::back();
	}

	//set data array for the constructors
	public static function setDataArray($model)
	{		
		error_log("Modelo desde el controlador Base : ".$model);
		$modelUpperCase 			= strtoupper($model);
		$data 						= array();
		$data['model'] 				= Config::get('constants.'.$modelUpperCase.'_MODEL_NAME');
		$data['module'] 			= Config::get('constants.'.$modelUpperCase.'_MODULE_NAME');
		$data['path'] 				= Config::get('constants.'.$modelUpperCase.'_MODULE_PATH');
		$data['newPathMethodGet'] 	= Config::get('constants.'.$modelUpperCase.'_NEW_PATH_METHOD_GET');
		$data['editPathMethodGet']	= Config::get('constants.'.$modelUpperCase.'_EDIT_PATH_METHOD_GET');
		$data['deletePathMethodGet']= Config::get('constants.'.$modelUpperCase.'_DELETE_PATH_METHOD_GET');
		$data['newPathMethodPost']	= Config::get('constants.'.$modelUpperCase.'_NEW_PATH_METHOD_POST');
		$data['editPathMethodPost']	= Config::get('constants.'.$modelUpperCase.'_EDIT_PATH_METHOD_POST');
		error_log("Modelo Salida de	el controlador : ".$data['model']);
		return $data;
	}
}
