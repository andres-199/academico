<?php 
	require_once 'config/autoload.php';
	config\autoload::iniciar();
	session_start();
	if(isset($_SESSION['idUsuario'])){

		header("location: index");
	}
	?>
<html>
<head>
<meta charset="utf-8">
	<title>Academico-login</title>
	<link rel="stylesheet" type="text/css" href="views/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="views/css/css.css">

</head>
<body>
<div id="general"></div>
	<p>
		<br><br>
	</p>
		<p>
		<br><br>
	</p>
<br>
<div class="container well" id="sha">
	


<div class="row">
<div class="col-xs-12">
<img src="logo-ejecutivo.jpg" class="img-responsive" id="ejecutivo">	
</div>
<div class="col-xs-12">
<p><br></p>
<i><center><font color="gray">&nbsp &nbsp Academico-login </font></center></i>
</div>	
</div>
<form class="login" action="login.php" method="POST">
<div class="form-group">
<input type="email" name="correo" class="form-control" placeholder="correo electronico" required autosave>
	
</div>
<div class="form-group">
<input type="password" name="contrasena" class="form-control" placeholder="contraseña" required="">
	
</div>
<button class="btn btn-ig btn-success btn-block" type="submit" name="aceptar">
	ACEPTAR
</button>

<div class="checkbox">
<label>
<input type="checkbox" name="remember" value="1">No cerrar sesion
	</label>
	<p class="help-block"><a href="#">¿No puedes acceder a tu cuenta?</a></p>
</div>

	
</form>
	
</div>

<?php
if(isset($_POST['aceptar'])){
	$correo=$_POST['correo'];
	$contrasena=$_POST['contrasena'];
	$inicioSesion=new models\inicioSesion();
	$usuario=new models\usuario();

	$usuario->set('correo',$correo);
	$datosU=mysqli_fetch_array($usuario->ver());
	$inicioSesion->set('idUsuario',$datosU['id']);
	$datosI=mysqli_fetch_array($inicioSesion->ver());
	if($datosU['correo']==$correo){
		if($datosI['contrasena']==$contrasena){
			$_SESSION['idUsuario']=$datosU['id'];
			$_SESSION['nombre']=$datosU['nombre'];
			$_SESSION['perfil']=$datosU['perfil'];
			$_SESSION['contrasena']=$contrasena;
			$_SESSION['correo']=$correo;
			header("location: index");
		}else{
			echo "la contrasena no conincide";
		}
	}else{
		echo "el correo no existe<br>";
	}

}


?>


	</div>
	<script src="views/js/jquery-3.2.1.js"></script>
	<script src="views/js/jquery-3.2.1.min.js	"></script>
	<script src="views/js/bootstrap.min.js"></script>

</body>
	<footer >
		<p>
			<center><font color="#ffffff" size="2"><b>ACADEMICO&nbsp</b><i>(plataforma de gestion academica)</i></font><br>
				<font color="#ffffff" size="1">&nbsp&nbspTodos Los Derechos Reservados &copy 2017</font></center><br>
		</p>
	</footer>
</html>
