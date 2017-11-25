<?php namespace views;

	use config\request as request;

	$template=new template();


	class template{

	public function __construct(){
			session_start();
	if(isset($_GET['close'])){
		$_SESSION = array();
		header("location: ".RUTA."login.php");
	}
	if(!isset($_SESSION['idUsuario'])){

		header("location: ".RUTA."login.php");
	}

	$request = new request();

			?>
<html>
<head>
	<title>ACADEMICO <?php
	 echo"-".$request->controlador();
	   echo"-".$request->metodo();
	    ?>
	     </title>
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA; ?>views/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA; ?>views/css/css.css">
</head>
<body>
	<div id="general">
		<div class="container-fluid">
			<div class="row" id="margen">
				<?php if($_SESSION['perfil']!=1){?>
							<div class="col-md-8">
								<?php }else{ ?>
								<div class="col-md-7">
									<?php } ?>
					<div class="dropdown">
						
						<a href="<?php echo RUTA; ?>index"><button type="button" class="btn btn-success">INICIO</button></a>
						<li class="dropdown btn btn-info btn-success" id="menudesplegable">
							<a  class="dropdown-toggle " data-toggle="dropdown" >CUENTA</a>
								<ul class="dropdown-menu" >
									<li><a href="<?php echo RUTA; ?>usuarios">Datos</a></li>
									<li><a href="<?php echo RUTA; ?>usuarios/modificarContrasena">ModificarContraseña</a></li>
								</ul>
						</li>
					
						<li class="dropdown btn-success btn-info btn"  id="menudesplegable">
							<a class="dropdown-toggle" data-toggle="dropdown">MATERIAS</a>
								<ul class="   dropdown-menu" >
									<?php if($_SESSION['perfil']==1){ ?>
									<li><a href="<?php echo RUTA; ?>materias/cursos">Cursos</a></li>
									<li><a href="<?php echo RUTA; ?>materias/">Materias</a></li>
									<li><a href="<?php echo RUTA; ?>materias/profesores">Profesores</a></li>
									<li><a href="<?php echo RUTA; ?>materias/estudiantes">Estudiantes</a></li>
									<li><a href="#">Notas</a></li>
									<?php }else{ ?>
									<li><a href="#">Contenido</a></li>
									<li><a href="#">Notas</a></li>
									<?php } ?>
								</ul>
						</li>	
					</div>
				</div>
				
						<div class="col-md-3">
							<p class="text-right">
								<font color="#ffffff">Bienvenido(a)<b> <?php echo $_SESSION['nombre']; ?></b></font>
								<font color="#ffffff" size="1"><i>&nbsp(<?php if($_SESSION['perfil']==1){
									echo "Administrador";
								}elseif ($_SESSION['perfil']==2) {
									echo "profesor";
								} else{
									echo "estudiante";
								}
								?>)</i></font>
							</p>
							</div>
							<?php if($_SESSION['perfil']!=1){?>
							<div class="col-md-1">
								<?php }else{ ?>
								<div class="col-md-2">
									<?php } ?>
								 <font color="gray">|</font>
								<?php if($_SESSION['perfil']==1){ ?>
								<a href="<?php echo RUTA; ?>usuarios/registro" class="btn-success"><button class="btn btn-success btn-sm">REGISTRO</button></a>
								 <font color="gray">|</font>
								<?php } ?>

								
								 <a href="index.php?close=1"><button class="btn btn-info btn-sm">SALIR</button></a>
						</div>
			</div>		




		</div>
		
	</div>


		<p>
		<br><br>
	</p>

			<?php

		}
		public function __destruct(){

			?>

		<script src="<?php echo RUTA; ?>views/js/jquery-3.2.1.js"></script>
	<script src="<?php echo RUTA; ?>views/js/jquery-3.2.1.min.js	"></script>
	<script src="<?php echo RUTA; ?>views/js/bootstrap.min.js"></script>
	<p>
		<br><br>
	</p>
</body>
		<footer >
			
		<p>
			<center><font color="#ffffff" size="2"><b>ACADEMICO&nbsp</b><i>(plataforma de gestion academica)</i></font><br>
				<font color="#ffffff" size="1">&nbsp&nbspTodos Los Derechos Reservados &copy 2017</font></center><br>
		</p>
			
		</footer>
</html>

			<?php

		}
	}
?>