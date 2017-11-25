<?php namespace config;

class enrrutador{

	public static function iniciar(Request $request){
		$controlador=$request->controlador()."Controller";
		$url=DIR."controllers".SEPARADOR.$controlador.".php";
		$metodo=$request->metodo();
		if($metodo=="index.php"){
			$metodo="index";
		}
		$argumento=$request->argumento();

		//llamada del controlador
		if(is_readable($url)){
			require_once $url;
			$clase="controllers\\".$controlador;
			$controlador= new $clase;
			if(!isset($argumento)){
				$datos=call_user_func(array($controlador,$metodo));//llama al objeto $controlador, metodo $metodo
				//$datos=$controlador->$metodo();

			}else{
				$datos=call_user_func_array(array($controlador,$metodo),$argumento);//llama al objeto $controlador, metodo $metodo, parametro $argumento
				//$datos=$controlador->$metodo($argumento);
			}
		}
		//llamada de las vistas
		$controller=$request->controlador();
		$url=DIR."views".SEPARADOR.$request->controlador().SEPARADOR.$metodo.".php";
		if(is_readable($url)){
			require_once $url;
		}else{
			if(isset($controller)){
			echo"<h1>404 no existe en el servidor...</h1>";
		}
		}
	}
}

?>