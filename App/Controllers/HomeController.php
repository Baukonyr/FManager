<?php
namespace App\Controller;



class HomeController{
	public function index(){
		$root = $_SERVER['DOCUMENT_ROOT'] . '/FManagement';
		$files = array_diff(scandir($root), array('..', '.'));
		$array = self::tree($files, $root);
		//print_r($array);
		require_once('App/View/test.php');
		
		return true;
	}
	
	public static function tree($files, $root){
		
		$array = array();
		
		foreach($files as $number => $name){
			$path = $root . '/' . $name;
			if(is_dir($path)){
				$array[$number][$name]= array_diff(scandir($path), array('..', '.'));
				$array[$number][$name] = self::tree($array[$number][$name], $path);
			}else{
				$array[$number] = $name;

			}
		}
		rsort($array);
		return $array;
	}
	
	public static function setTree($array){
		foreach($array as $key => $item){
			if(is_array($item)){
				include('App/View/include/TreeInclude/subMenu.php');
			}else{
				//print_r($item);
				include('App/View/include/TreeInclude/item.php');
			}
		}
	}

}
?>