<?php namespace models;

class inicioSesion {
	private $contrasena;
	private $idUsuario;
	private $conDB;

	public function __construct(){
		$this->conDB = new conexion();
	}

	public function set($atributo, $contenido){
		$this->$atributo=$contenido;
	}

	public function ver(){
		$query="SELECT * from iniciosesion where idUsuario = '{$this->idUsuario}'";
		$datos=$this->conDB->consultaRetorna($query);
		return $datos;
	}
	

	public function agregar(){
		$query="INSERT into inicioSesion (contrasena,idUsuario) values ('{$this->contrasena}','{$this->idUsuario}')";
		$this->conDB->consulta($query);
	}
	public function editar(){
		$query="UPDATE inicioSesion set contrasena='{$this->contrasena}' where idUsuario='{$this->idUsuario}'";
		$this->conDB->consulta($query);
	}

	public function eliminar(){
		$query="DELETE from inicioSesion where idUsuario='{$this->idUsuario}'";
		$this->conDB->consulta($query);
	}
	
}
?>