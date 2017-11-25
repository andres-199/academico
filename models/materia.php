<?php namespace models;

class materia{
	private $id;
	private $nombre;
	private $tabla;
	private $conDB;

	public function __construct(){
		$this->conDB = new conexion();
	}
	public function set($atributo, $contenido){
		$this->$atributo=$contenido;
	}
	public function listar(){
		$query="SELECT * from $this->tabla order by nombre";
		$datos=$this->conDB->consultaRetorna($query);
		return $datos;
	}
	public function ver(){
		$query="SELECT * from $this->tabla where id='{$this->id}'";
		$datos=$this->conDB->consultaRetorna($query);
		return $datos;
	}

	public function agregar(){
		$query="INSERT into $this->tabla (nombre) values ('{$this->nombre}')";
		$this->conDB->consulta($query);
	}
	public function editar(){
		$query="UPDATE $this->tabla set nombre='{$this->nombre}' where id='{$this->id}'";
		$this->conDB->consulta($query);
	}

	public function eliminar(){
		$query="DELETE from $this->tabla where id='{$this->id}'";
		$this->conDB->consulta($query);
	}
	
}
?>