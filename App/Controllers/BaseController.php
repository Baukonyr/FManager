<?php
namespace App\Controller;



class BaseController{
	
	public function index($controllerName, $actionName){
		
		
		//$controllerObject = new $controllerName;
    //$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
		echo 'Say BaseController';
	}
}
?>