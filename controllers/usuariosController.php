<?php namespace controllers;

use models\usuario as usuario;
use models\inicioSesion as loggin;
use models\rompe as rompe;
use functions\functions as functions;

class usuariosController{

	private $usuario;
	private $loggin;
	private $rompe;
	private $functions;

	public function __construct(){
		$this->usuario=new usuario();
		$this->loggin=new loggin();
		$this->rompe=new rompe();
		$this->functions=new functions();
	}
 
	public function index(){
		$datos= array();
		$this->usuario->set("id",$_SESSION['idUsuario']);
		$datos= array(0=>$this->usuario->ver());
		$this->rompe->set("tabla","estudiante_acudiente");
		$this->rompe->set("idUsuario",$_SESSION['idUsuario']);
		$rompe=$this->rompe->ver();
		if($datosRompe=mysqli_fetch_array($rompe)){
			$this->usuario->set("id",$datosRompe['idAcudiente']);
			$datos[1]=$this->usuario->ver();
		}
		return $datos;
	}

	public function modificarDatosAcudiente($idAcudiente){

		if($_POST){

			$this->usuario->set('id',$_POST['id']);
			$this->usuario->set('nombre',$_POST['nombre']);
			$this->usuario->set('apellido',$_POST['apellido']);
			$this->usuario->set('genero',$_POST['genero']);
			$this->usuario->set('identificacion',$_POST['identificacion']);
			$this->usuario->set('telefono',$_POST['telefono']);
			$this->usuario->set('correo',$_POST['correo']);
			$this->usuario->set('direccion',$_POST['direccion']);
			$this->usuario->editar();

			header("location:".RUTA."usuarios/datosAcudiente");

		}else{

		$this->rompe->set("tabla","estudiante_acudiente");
		$this->rompe->set("idUsuario",$_SESSION['idUsuario']);
		$rompe=$this->rompe->ver();	

			if($datosRompe=mysqli_fetch_array($rompe)){

				if ($datosRompe['idAcudiente']==$this->functions->hexToStr($idAcudiente)) {
					$this->usuario->set("id",$this->functions->hexToStr($idAcudiente));
					$datos = $this->usuario->ver();
					return $datos;
				}else{
					echo"<center><font color=\"red\" size=\"3\">El Identificador De Acudiente No Corresponde.</font></center>";
				}
			
			}else{
				echo"<center><font color=\"red\" size=\"3\">No Existe Acudiente Registrado.</font></center>";
			}

		}
	}

	public function modificarDatos(){

		if($_POST){
		$correo=$_POST['correo'];
		$this->usuario->set('correo',$correo);
		$datos=$this->usuario->ver();

		if($usuarioDatos=mysqli_fetch_array($datos) && $correo!=$_SESSION['correo']){

		echo"<center><font color=\"red\" size=\"3\">El Correo Ingresado Ya Se Encuentra Registrado.</font></center>";

		$this->usuario->set("id",$_SESSION['idUsuario']);
		$datos = $this->usuario->ver();
		return $datos;


		}else{

			$this->usuario->set('id',$_SESSION['idUsuario']);
			$this->usuario->set('nombre',$_POST['nombre']);
			$this->usuario->set('apellido',$_POST['apellido']);
			$this->usuario->set('genero',$_POST['genero']);
			$this->usuario->set('identificacion',$_POST['identificacion']);
			$this->usuario->set('telefono',$_POST['telefono']);
			$this->usuario->set('correo',$_POST['correo']);
			$this->usuario->set('direccion',$_POST['direccion']);
			$this->usuario->set('rh',$_POST['rh']);
			$this->usuario->editar();

			header("location:".RUTA."usuarios/index");

		}

		}else{

		$this->usuario->set("id",$_SESSION['idUsuario']);
		$datos = $this->usuario->ver();
		return $datos;

		}
	}

	public function datosAcudiente(){
		$this->rompe->set("tabla","estudiante_acudiente");
		$this->rompe->set("idUsuario",$_SESSION['idUsuario']);
		$rompe=$this->rompe->ver();	
		if($datosRompe=mysqli_fetch_array($rompe)){
			$this->usuario->set("id",$datosRompe['idAcudiente']);
			$datos=$this->usuario->ver();

			return $datos;
		}
	}

	public function modificarContrasena(){
		if($_POST){
			if($_SESSION['contrasena']==$_POST['actual']){

				if($_POST['nueva']==$_POST['verificar']){

					$this->loggin->set('idUsuario',$_SESSION['idUsuario']);
					$this->loggin->set('contrasena',$_POST['nueva']);
					$this->loggin->editar();
					echo "<font color=\"green\" size=\"2\"> Contraseña Modificiada Exitosamente</font>";

				}else{
					echo "<font color=\"red\" size=\"2\">Las Contraseñas No Coinciden</font>";
				}

			}else{
				echo "<font color=\"red\" size=\"2\">La Contraseña Actual Es Incorrecta</font>";
			}

		}
	}

	public function registro(){
		if($_POST){
		$correo=$_POST['correo'];


		$this->usuario->set('correo',$correo);
		$datos=$this->usuario->ver();
		
		if($usuarioDatos=mysqli_fetch_array($datos)){
			if($_SESSION['perfil']==3&&$usuarioDatos['perfil']==4){  //*****acudiente*****

				$this->rompe->set("tabla","estudiante_acudiente");
				$this->rompe->set("idUsuario",$_SESSION['idUsuario']);

				$this->usuario->set('correo',$correo);
				$datos=$this->usuario->ver();
				$usuarioDatos=mysqli_fetch_array($datos);

				$this->rompe->set('idAcudiente',$usuarioDatos['id']);
				$this->rompe->agregar();

				header("location:".RUTA."usuarios/index");

			}else{
			echo"<center><font color=\"red\" size=\"3\">El Correo Ingresado Ya Se Encuentra Registrado Como Usuario.</font></center>";
			}
		}else{
		$this->usuario->set('nombre',$_POST['nombre']);
		$this->usuario->set('apellido',$_POST['apellido']);
		$this->usuario->set('genero',$_POST['genero']);
		$this->usuario->set('identificacion',$_POST['identificacion']);
		$this->usuario->set('telefono',$_POST['telefono']);
		$this->usuario->set('direccion',$_POST['direccion']);
		if($_SESSION['perfil']==1){
		$this->usuario->set('fechaNacimiento',$_POST['fechaNacimiento']);
		$this->usuario->set('rh',$_POST['rh']);
		}
		$this->usuario->set('correo',$_POST['correo']);
		$this->usuario->set('perfil',$_POST['perfil']);
		$this->usuario->agregar();

		if($_SESSION['perfil']==1){   //********loggin******
				$this->usuario->set('correo',$correo);
				$datos=$this->usuario->ver();
				$usuarioDatos=mysqli_fetch_array($datos);

				$this->loggin->set('idUsuario',$usuarioDatos['id']);
				$this->loggin->set('contrasena',$usuarioDatos['identificacion']);
				$this->loggin->agregar();
				echo"<center><font color=\"green\" size=\"3\">Usuario Creado Con Exito (La contraseña es el numero de identificacion, y el usuario es el correo)</font></center>";
			}else{ //*****acudiente*****

				$this->rompe->set("tabla","estudiante_acudiente");
				$this->rompe->set("idUsuario",$_SESSION['idUsuario']);

				$this->usuario->set('correo',$correo);
				$datos=$this->usuario->ver();
				$usuarioDatos=mysqli_fetch_array($datos);

				$this->rompe->set('idAcudiente',$usuarioDatos['id']);
				$this->rompe->agregar();
				header("location:".RUTA."usuarios/index");

			}

		}
		
		
		}
	}
}

$usuario= new usuariosController();


?>