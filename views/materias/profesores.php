<?php
if($_SESSION['perfil']!=1){

	header("location:".RUTA."index");
}
?>

<div class="container">
	<table class="table table-striped">
		<p><center><font size="5"> <b>PROFESORES</b></font><i><font size="2" color="gray">&nbsp&nbsp(Asignar profesores a las materias)</font></i></center></p>
		<tr>
			<th>Nombre</th>
			<th>Profesor(es)</th>
			<th>Asignar</th>
			<th>Eliminar</th>
		</tr>


<?php
while ($materia=mysqli_fetch_array($datos)) {?>

		<tr>
			<td><b> <?php echo $materia['nombre']; ?></b></td>
			<td><?php

					$datosRompe=$materias->profesor_materia('idMateria',$materia['id']);
					while ($profesor_materia=mysqli_fetch_array($datosRompe)) {
						$profesor=mysqli_fetch_array($materias->verProfesor($profesor_materia['idUsuario']));
						if($profesor_materia['estado']==1){
						echo "<a href=\"#\">".$profesor['nombre']." ".$profesor['apellido']."</a> <br>";
						}
					}

			    ?>
			</td>

			<td>
				<form action="" method="post" class="form-inline">
						<select name="idUsuario">
							<?php
							 $datosProfesor=$materias->listarProfesores();
							 while ($profesor=mysqli_fetch_array($datosProfesor)){
							 			$comprueba=false;
							 			$datosProfesor_materia=$materias->profesor_materia('idUsuario',$profesor['id']);
							 		while ($profesor_materia=mysqli_fetch_array($datosProfesor_materia)){
							 			if($profesor_materia['idMateria']==$materia['id']){
							 				$comprueba=true;
							 			}
							 		}

							 		if($comprueba==false){
							 ?>
									<option value="<?php echo $profesor['id']; ?>"><?php echo $profesor['nombre']." ".$profesor['apellido'];?>
									</option>
							<?php
									}
							} ?>
						</select>
						<input type="hidden" name="idMateria" value="<?php echo $materia['id']; ?>">
				  &nbsp	<input type="submit" name="asignar" value="ASIGNAR" class="btn btn-warning btn-sm">
				</form>
			</td>

			<td>
				<form action="" method="post" class="form-inline">
						<select name="idProfesor_materia">
							<?php
							 $datosProfesor=$materias->listarProfesores();
							 while ($profesor=mysqli_fetch_array($datosProfesor)){
							 			$comprueba=false;
							 			$datosProfesor_materia=$materias->profesor_materia('idUsuario',$profesor['id']);
							 		while ($profesor_materia=mysqli_fetch_array($datosProfesor_materia)){
							 			if($profesor_materia['estado']==1){
							 				if($profesor_materia['idMateria']==$materia['id']){
							 					$comprueba=true;
							 					$idProfesor_materia=$profesor_materia['id'];
							 				}
							 			}
							 		}

							 		if($comprueba!=false){
							 ?>
									<option value="<?php echo $idProfesor_materia; ?>"><?php echo $profesor['nombre']." ".$profesor['apellido'];?>
									</option>
							<?php
									}
							} ?>
						</select>
				  &nbsp	<input type="submit" name="eliminar" value="ELIMINAR" class="btn btn-danger btn-sm">
				</form>
			</td>
		</tr>


<?php } ?>


	</table>
</div>