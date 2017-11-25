
<?php 

	define('SEPARADOR', DIRECTORY_SEPARATOR);
	define('DIR', realpath(dirname(__FILE__)) . SEPARADOR);
	define('RUTA',"http://192.168.0.20/proyecto/");
	require_once 'config/autoload.php';
	config\autoload::iniciar();
	require_once 'views/template.php';
	config\enrrutador::iniciar(new config\request());



	?>


	



	
		
		