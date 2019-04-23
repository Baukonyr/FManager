<?php

class router{
	
	private $routes;
	
	// get route 
	public function __construct(){
		$this->routes = include('route.php');
	}
	
	// set uri
	private function getURI(){
		if(!empty($_SERVER['REQUEST_URI'])){
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}
	
	public function start(){
		$uri = $this->getURI();

		foreach ($this->routes as $uriPattern => $path){

      if(preg_match("~$uriPattern~", $uri)){

        $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
				
        $segments = explode('/', $internalRoute);
				
				// get nameController and action
        $controllerName ='App\\Controller\\' . array_shift($segments) . 'Controller';
        $actionName = array_shift($segments);
				
				$parameters = $segments;

          $controllerObject = new $controllerName;
          $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
          
            if ($result !== Null){
              break;
            }
        
      }
    }
	} 
	
}

?>