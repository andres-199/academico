<?php
$usuario=mysqli_fetch_array($datos[0]);
?>





<div class="container">
	<table class=" table table-striped ">
<thead class="thead-inverse">
    <tr>
		 <div class="well">
			 <th colspan="2"><center>DATOS DE USUARIO</center></th>
		</div>
    </tr>
  </thead>

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

			<td>Direccion</td>
			<td> <?php echo $usuario['direccion']; ?>   </td>
		</tr>

			<tr>

			<td>fecha Nacimiento</td>
			<td>  <?php echo $usuario['fechaNacimiento']; ?>  </td>
		</tr>

			<tr>

			<td>RH</td>
			<td> <?php echo $usuario['rh']; ?>   </td>
		</tr>

			<tr>

			<td>Correo</td>
			<td>   <?php echo $usuario['correo']; ?> </td>
		</tr>
		<?php
			if($_SESSION['perfil']==3){
				?>
				<tr>
			<td >Acudiente</td>
			<td> <?php if(isset($datos[1])){
				$acudiente=mysqli_fetch_array($datos[1]);
				echo $acudiente['nombre']." <a href=\"".RUTA."usuarios/datosAcudiente\"> <button class=\"btn btn-info btn-sm\">VER</button></a>";
			}else{?>
			<a href="<?php echo RUTA ?>usuarios/registro"><button class="btn btn-info btn-sm">Registrar Acudiente</button></a>
			<?php
			}
			 ?> </td>
		</tr>
				<?php
			}
		?>




	</table>

	<div><center><p><a href="<?php echo RUTA ?>usuarios/modificarDatos"><button type="button" class="btn btn-warning">MODIFICAR DATOS</button></a></p></center></div>

</div>