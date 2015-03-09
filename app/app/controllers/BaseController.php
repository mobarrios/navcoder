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
		$model 						= $this->data['model'];
		$this->data['seccion']		= 'Inicio';

		if(isset($search))
		{
			$this->data['model'] 	= $model::where('id' ,'like','%'.$search.'%')->orderBy('id' ,'ASC')->paginate('10');
		}
		else
		{
			$this->data['model'] 	= $model::orderBy('id' ,'ASC')->paginate('10');
		}
			

		return View::make('view')->with($this->data);
	}

	//open form modal
	public function formModal($id = null)
	{
		$model 					= $this->data['model'];
		$this->data['seccion']	= 'Nuevo';

		if(!is_null($id))
		{
			$this->data['seccion']	= 'Editar';

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
}
