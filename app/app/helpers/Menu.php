<?php

class Menu 
{
	
	public static function getMenus()
	{
		$menus 		= 	Menus::all();
				
		return $menus;
	}	

	public static function build()
	{


	}
}