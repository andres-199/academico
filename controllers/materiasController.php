<?php namespace controllers;

use models\materia as materia;
use models\usuario as usuario;
use models\rompe as rompe;

class materiasController{

	private $materia;
	private $usuario;
	private $rompe;

	public function __construct(){

		$this->materia=new materia();
		$this->usuario=new usuario();
		$this->rompe=new rompe();

	}

	public function estudiantes(){
		if($_POST){
			$datos=array();
			if(isset($_POST['buscar'])){
				$this->usuario->set('correo',$_POST['correo']);
				$datosUsuario=$this->usuario->ver();
				$usuario=mysqli_fetch_array($datosUsuario);
				$this->rompe->set('tabla','estudiante_curso');
				$this->rompe->set('idUsuario',$usuario['id']);
				$datos[2]=$usuario;
				$datos[0]=$this->rompe->verDesc();
					$d=date('d');
					$m=date('m');
					$a=date('Y');
					if($estudiante_curso=mysqli_fetch_array($datos[0])) {
						$this->rompe->set('tabla','estudiante_curso');
						$this->rompe->set('columna','fechaFin');
						$this->rompe->set('id',$estudiante_curso['id']);
						$diaFin=mysqli_fetch_array($this->rompe->getDay());
						$mesFin=mysqli_fetch_array($this->rompe->getMonth());
						$anoFin=mysqli_fetch_array($this->rompe->getYear());
						if($a<$anoFin['year']){
							$datos[1]=TRUE;
						}elseif($a>$anoFin['year']){
							$datos[1]=FALSE;
						}else{

							if ($m<$mesFin['month']) {
								$datos[1]=TRUE;
							}elseif ($m>$mesFin['month']) {
								$datos[1]=FALSE;
							}else{
								if($d<$diaFin['day']){
									$datos[1]=TRUE;
								}elseif ($d>$diaFin['day']) {
									$datos[1]=FALSE;
								}else{
									$datos[1]=TRUE;
								}
							}
						}
						return $datos;
					}else{
					$datos[1]=FALSE;
					return $datos;
				}
			}elseif (isset($_POST['registrarCurso'])) {
				$this->rompe->set('tabla','estudiante_curso');
				$this->rompe->set('idUsuario',$_POST['idUsuario']);
				$this->rompe->set('idCurso',$_POST['idCurso']);
				$this->rompe->agregar();
				$this->rompe->set('fechaInicio',$_POST['fechaInicio']);
				$this->rompe->completar();
				$this->rompe->set('fechaFin',$_POST['fechaFin']);
				$this->rompe->completar();
				$datos[1]=TRUE;
				return $datos;
				header("location:".RUTA."materias/estudiantes");
			}
		}
	}

	public function verProfesor($idUsuario){
		$this->usuario->set('id',$idUsuario);
		$datos=$this->usuario->ver();
		return $datos;
	}

	public function verMateria($idMateria){
		$this->materia->set('tabla','materia');
		$this->materia->set('id',$idMateria);
		$datos=$this->materia->ver();
		return $datos;
	}


	public function cursos(){

			if(isset($_POST['registrar'])){
			$this->materia->set('tabla','curso');
			$this->materia->set('nombre',$_POST['nombre']);
			$this->materia->agregar();
			header("location:".RUTA."materias/cursos");

			}elseif (isset($_POST['asignar'])) {
			$this->rompe->set('tabla','materia_curso');
			$this->rompe->set('idCurso',$_POST['idCurso']);
			$this->rompe->set('idProfesor_materia',$_POST['idProfesor_materia']);
			$this->rompe->agregarMateria_curso();
			header("location:".RUTA."materias/cursos");

			}elseif (isset($_POST['editar'])) {
			
			}else{
			if($_SESSION['perfil']==1){
				$this->materia->set('tabla','curso');
				$datos=$this->materia->listar();//lista los cursos
				return $datos;
			}
		}
	}

		public function materia_curso($atributo,$contenido){
		$this->rompe->set('tabla','materia_curso');
		$this->rompe->set($atributo,$contenido);
		$datos=$this->rompe->ver();
		return $datos;
	}


	public function profesor_materia($atributo,$contenido){
		if($atributo==0&&$contenido==0){
		$this->rompe->set('tabla','profesor_materia');
		$datos=$this->rompe->listar();
		return $datos;
		}else{
		$this->rompe->set('tabla','profesor_materia');
		$this->rompe->set($atributo,$contenido);
		$datos=$this->rompe->ver();
		return $datos;
		}
	}

	public function listarProfesores(){
		$this->usuario->set('perfil',2);
		$datos=$this->usuario->listar();	
		return $datos;
	}

	public function profesores(){

		if(isset($_POST['asignar'])){
			$this->rompe->set('tabla','profesor_materia');
			$this->rompe->set('idUsuario',$_POST['idUsuario']);
			$this->rompe->set('idMateria',$_POST['idMateria']);
			$this->rompe->agregar();
			header("location:".RUTA."materias/profesores");
		}elseif(isset($_POST['eliminar'])){
			$this->rompe->set('tabla','profesor_materia');
			$this->rompe->set('id',$_POST['idProfesor_materia']);
			$this->rompe->set('estado',0);
			$this->rompe->editar();
			header("location:".RUTA."materias/profesores");
		}else{
			if($_SESSION['perfil']==1){
				$this->materia->set('tabla','materia');
				$datos=$this->materia->listar();
				return $datos;
			}
		}

	}

	public function index(){

		$datos=array();

		if($_POST){
			$this->materia->set('tabla','materia');
			$this->materia->set('nombre',$_POST['nombre']);
			$this->materia->agregar();
			header("location:".RUTA."materias/");
		}else{
			if($_SESSION['perfil']==1){
				$this->materia->set('tabla','materia');
				$datos[0]=$this->materia->listar();
				return $datos;
			}
		}
	}

}
$materias=new materiasController();
?>