<?php namespace config;
class autoload{

	public static function iniciar(){
		spl_autoload_register(function($clase){
			$url=str_replace("\\", "/", $clase).".php";
			include_once $url;
		});
	}
}
?>