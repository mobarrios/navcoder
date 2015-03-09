<?php

class InitController extends BaseController
{

	public function getIndex()
	{
		return View::make('init.init');
		
	}
}

?>