<?php

class InitController extends BaseController
{

	public function inicio()
	{
		return View::make('init.login');
	}
	
	public function postInicio()
	{
		if(Input::get('user') == 'admin' &&  Hash::check(Input::get('pass'),'$2y$10$jLIWNz61ubXUIHq.tzhNAumUxkKvn4eAdmfZLEG7DUE4pNSo99liW'))
		{
			return View::make('init.index');
		}	
		
		return "ACCESO DENEGADO...";
	}

	public function postInit()
	{
		// Set the tenant DB name and fire it up as the new default DB connection
		//$db = CompanyDb::where('company_name','=',Session::get('company'))->first();

		Config::set('database.connections.mysql.database',Input::get('nombre_db'));
		Config::set('database.connections.mysql.username',Input::get('user'));
		Config::set('database.connections.mysql.password',Input::get('pass'));
		
		
		DB::setDefaultConnection('mysql');
		DB::connection("mysql");

		DBupdate::create();

		return "ok";
	}
}

?>