<?php
if($_SESSION['perfil']!=1){

	header("location:".RUTA."index");
}
?>

<div class="container">
	<table class="table table-striped">
		<p><center><font size="5"> <b>MATERIAS</b></font><i><font size="2" color="gray">&nbsp&nbsp(Registrar materias)</font></i></center></p>
		<p>
			<form action="" method="post" class="form-inline">
				<input type="text" name="nombre" placeholder="Nombre De La Materia" required/>&nbsp <input type="submit" name="registrar" value="REGISTRAR +" class="btn btn-info btn-sm">
			</form>
		</p>
		<tr>
			<th>Nombre</th>
			<th>Profesor(es)</th>
		</tr>


<?php
while ($materia=mysqli_fetch_array($datos[0])) {?>

		<tr>
			<td><b> <?php echo $materia['nombre']; ?></b></td>
			<td><?php

					$datosRompe=$materias->profesor_materia('idMateria',$materia['id']);
					while ($profesor_materia=mysqli_fetch_array($datosRompe)) {
						$profesor=mysqli_fetch_array($materias->verProfesor($profesor_materia['idUsuario']));
						echo "<a href=\"#\">".$profesor['nombre']." ".$profesor['apellido']."</a> | ";
					}
			    ?>
			</td>
		</tr>


<?php } ?>


	</table>
</div>
