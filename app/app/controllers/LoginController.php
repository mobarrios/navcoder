<?php

class LoginController extends BaseController
{
	public function login()
	{
		$input    = Input::all();
		$remember = Input::has('remember') ? true : false ;
	

		if(Auth::attempt(array('name' => $input['username'], 'password' => $input['password']),$remember))
		{
			return Redirect::to('/inicio');	
		}
		else
		{
			return Redirect::back()->withErrors('Usuario o Password Invalido');
		}
	}

	public function logOut()
	{
		Auth::logout();

		return Redirect::to('/login');
	}
}
?>