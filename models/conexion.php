<?php namespace models;

class conexion {
	private $datosDB = array(
		'location'=>'localhost',
		'user'=>'root',
		'pass'=>'',
		'db'=>'proyecto'
		);
	private $con;
	

	public function __construct(){
		$this ->con= new \mysqli($this->datosDB['location'],$this->datosDB['user'],$this->datosDB['pass'],$this->datosDB['db']);
	}

	public function consulta($query){
		$this->con->query($query);

	}
	public function consultaRetorna($query){
		$contenido=$this->con->query($query);
		return $contenido;
	}
	public function __destruct(){
		$this->con->close();
	}
}

?>