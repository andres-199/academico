<?php namespace models;
class usuario {
	private $id;
	private $nombre;
	private $apellido;
	private $identificacion;
	private $telefono;
	private $direccion;
	private $fechaNacimiento;
	private $rh;
	private $correo;
	private $perfil;
	private $genero;
	private $conDB;
	private $atrib;

	public function __construct(){
		$this->conDB=new conexion();
	}
	public function set($atributo, $contenido){
		$this->$atributo=$contenido;
		$this->atrib=$atributo;
	}
	public function listar(){
		$query="SELECT * from usuario where perfil = '{$this->perfil}'";
		$datos=$this->conDB->consultaRetorna($query);
		return $datos;
	}
	public function ver(){
		$atributo=$this->atrib;
		$query="SELECT * from usuario where $atributo= '{$this->$atributo}'";
		$datos=$this->conDB->consultaRetorna($query);
		return $datos;
	}
	

	public function agregar(){
		$query="INSERT into usuario (nombre,apellido,identificacion,telefono,direccion,fechaNacimiento,rh,correo,perfil,genero) values ('{$this->nombre}','{$this->apellido}','{$this->identificacion}','{$this->telefono}','{$this->direccion}','{$this->fechaNacimiento}','{$this->rh}','{$this->correo}','{$this->perfil}','{$this->genero}')";
		$this->conDB->consulta($query);
	}

	public function editar(){
		$query="UPDATE usuario set nombre='{$this->nombre}',apellido='{$this->apellido}',identificacion='{$this->identificacion}',telefono='{$this->telefono}',direccion='{$this->direccion}',rh='{$this->rh}',correo='{$this->correo}',genero='{$this->genero}' where id='{$this->id}'";
		$this->conDB->consulta($query);
		echo $query;
	}
/*	public function eliminar(){
		$query="DELETE from usuario where id= '{$this->id}'";
	}
*/
}
?>
