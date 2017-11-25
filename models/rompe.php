<?php namespace models;

class rompe{

	private $id;
	private $tabla;
	private $idUsuario;
	private $idProfesor_materia;
	private $idMateria_curso;
	private $idMateria;
	private $idAcudiente;
	private $idCurso;
	private $estado;
	private $fechaInicio;
	private $fechaFin;
	private $atrib;
	private $tipo;
	private $columna;
	private $conDB;

	public function __construct(){
		$this->conDB=new conexion();
	}
	public function set($atributo, $contenido){
		$this->$atributo=$contenido;
		$this->atrib=$atributo;
	}
	public function ver(){
		$atributo=$this->atrib;
		$query="SELECT * from $this->tabla where $atributo= '{$this->$atributo}'";
		$datos=$this->conDB->consultaRetorna($query);
		return $datos;
	}
	public function verDesc(){
		$atributo=$this->atrib;
		$query="SELECT * from $this->tabla where $atributo= '{$this->$atributo}'  ORDER BY id DESC";
		$datos=$this->conDB->consultaRetorna($query);
		return $datos;
	}
	public function listar(){
		$query="SELECT * from $this->tabla";
		$datos=$this->conDB->consultaRetorna($query);
		return $datos;
	}
	public function agregar(){
		$atributo=$this->atrib;
		$query="INSERT into $this->tabla (idUsuario,$atributo) values ('{$this->idUsuario}','{$this->$atributo}')";
		$this->conDB->consulta($query);
	}
	public function agregarMateria_curso(){
		$atributo=$this->atrib;
		$query="INSERT into $this->tabla (idCurso,$atributo) values ('{$this->idCurso}','{$this->$atributo}')";
		$this->conDB->consulta($query);
	}
	public function editar(){
		$atributo=$this->atrib;
		$query="UPDATE $this->tabla set $atributo='{$this->$atributo}' where id='{$this->id}'";
		$this->conDB->consulta($query);
	}
	public function completar(){
		$query="SELECT * FROM $this->tabla ORDER BY id DESC";
		$datos=$this->conDB->consultaRetorna($query);
		$datosTabla=mysqli_fetch_array($datos);
		$id=$datosTabla['id'];
		$atributo=$this->atrib;
		$query="UPDATE $this->tabla set $atributo='{$this->$atributo}' where id=$id";
		$this->conDB->consulta($query);
	}
	public function eliminar(){
		$query="DELETE from $this->tabla where id='{$this->id}'";
		$this->conDB->consulta($query);
	}
	public function getDay(){
		$query="SELECT extract(day from $this->columna) as day from $this->tabla where id='{$this->id}'";
		$datos=$this->conDB->consultaRetorna($query);
		return $datos;

	}
	public function getMonth(){
		$query="SELECT extract(month from $this->columna) as month from $this->tabla where id='{$this->id}'";
		$datos=$this->conDB->consultaRetorna($query);
		return $datos;

	}
	public function getYear(){
		$query="SELECT extract(year from $this->columna) as year from $this->tabla where id='{$this->id}'";
		$datos=$this->conDB->consultaRetorna($query);
		return $datos;

	}
}

?>