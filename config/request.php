<?php namespace config;

class request {

	private $controlador;
	private $metodo;
	private $argumento;

	public function __construct(){
		if(isset($_GET['url'])){
			$url=filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);//filtra la url en este caso almcenada en la variable url por el metodo GET, este filtro elimina caracteres
			$url=explode("/", $url); // divide un string en un array en este caso cada que encuentre un /
			$url=array_filter($url);//filtra el array eliminando espacios vacios
			if($url[0]=="index"){
				$this->controlador = "default";
			}else{
			$this->controlador = strtolower(array_shift($url));//*minusculas ** quita el primer elemento del array *obtenemos el controlador
			}
			$this->metodo = strtolower(array_shift($url));//obtenemos el metodo
			if(!$this->metodo){
				$this->metodo="index";
			}
			$this->argumento=$url;
		}
	}

	public function controlador(){
		return $this->controlador;
	}
	public function metodo(){
		return $this->metodo;
	}
	public function argumento(){
		return $this->argumento;
	}
}

?>