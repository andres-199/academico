<?php
use functions\functions as functions;
$usuario=mysqli_fetch_array($datos);
$functions=new functions();
?>





<div class="container">
	<table class="table table-striped">
		<p><h3><center>DATOS DE ACUDIENTE</center></h3></p>
		<tr>
			<td >Nombre</td>
			<td> <?php echo $usuario['nombre']; ?> </td>
		</tr>

		<tr>	
			<td>Apellido</td>
			<td>  <?php echo $usuario['apellido']; ?>  </td>
		</tr>

		<tr>	
			<td>Genero</td>
			<td>  <?php echo $usuario['genero']; ?>  </td>
		</tr>

		<tr>
			<td>Identificacion</td>
			<td>  <?php echo $usuario['identificacion']; ?>  </td>
		</tr>

		<tr>
			<td>Telefono</td>
			<td> <?php echo $usuario['telefono']; ?>  </td>
		</tr>

		<tr>
			<td>Correo</td>
			<td>   <?php echo $usuario['correo']; ?> </td>
		</tr>

		<tr>
			<td>Direccion</td>
			<td> <?php echo $usuario['direccion']; ?>   </td>
		</tr>

	</table>
	<div><center><p><a href="<?php echo RUTA ?>usuarios/modificarDatosAcudiente/<?php echo $functions->strToHex($usuario['id']); ?>"><button type="button" class="btn btn-warning">MODIFICAR DATOS</button></a></p></center></div>
	
</div>