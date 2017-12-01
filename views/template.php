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
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA; ?>views/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA; ?>views/css/estilos.css">
</head>
<body>
	<nav class="navbar navbar-inverse" id="general">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo RUTA; ?>index">ACADEMICO</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
         <li><a href="<?php echo RUTA; ?>index">INICIO</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">CUENTA <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo RUTA; ?>usuarios">Datos</a></li>
						<li><a href="<?php echo RUTA; ?>usuarios/modificarContrasena">Modificar Contraseña</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MATERIAS <span class="caret"></span></a>
          <ul class="dropdown-menu">
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
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li>
					<a>
          <font color="#ffffff">Bienvenido(a)
            <b>
              <?php echo $_SESSION['nombre']; ?>
            </b>
          </font>
          <font size="2">
            <i>&nbsp(
              <?php if($_SESSION['perfil']==1){
        									echo "Administrador";
        								}elseif ($_SESSION['perfil']==2) {
        									echo "profesor";
        								} else{
        									echo "estudiante";
        								}
        								?>)
						</i>
					</font>
					</a>
        </li>
        <?php if($_SESSION['perfil']==1){ ?>
        <li><a href="<?php echo RUTA; ?>usuarios/registro">REGISTRO</a></li>
        <?php } ?>
        <li><a href="index.php?close=1">SALIR</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<p>
	<br><br><br>
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