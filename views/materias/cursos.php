<?php
if($_SESSION['perfil']!=1){

	header("location:".RUTA."index");
}
?>

<div class="container">
	<table class="table table-striped">
		<p><center><font size="5"> <b>CURSOS</b></font><i><font size="2" color="gray">&nbsp&nbsp(Registrar cursos y asignar materias)</font></i></center></p>
		<p>
			<form action="" method="post" class="form-inline">
				<input type="text" name="nombre" placeholder="Nombre de el curso" required/>&nbsp <input type="submit" name="registrar" value="REGISTRAR +" class="btn btn-info btn-sm">
			</form>
		</p>
		<tr>
			<th>Curso</th>
			<th>Materias</th>
			<th>Asignar materia</th>
			<th>Eliminar materia</th>
		</tr>

<?php
while ($curso=mysqli_fetch_array($datos)) {
?>
		<tr>
			<td><b><?php echo $curso['nombre']; ?></b></td>
			<td>
<?php
$datosMateria_curso=$materias->materia_curso('idCurso',$curso['id']);
while ($materia_curso=mysqli_fetch_array($datosMateria_curso)){
	$datosProfesor_materia=$materias->profesor_materia('id',$materia_curso['idProfesor_materia']);
	$profesor_materia=mysqli_fetch_array($datosProfesor_materia);
	$datosMateria=$materias->verMateria($profesor_materia['idMateria']);
	$materia=mysqli_fetch_array($datosMateria);
	$datosProfesor=$materias->verProfesor($profesor_materia['idUsuario']);
	$profesor=mysqli_fetch_array($datosProfesor);

	echo $materia['nombre']." <i><font size=\"2\" color=\"gray\">(".$profesor['nombre']." ".$profesor['apellido'].")</font></i><br>";

}
?>
			</td>
			<td>
				<form action="" method="post" class="form-inline">
				<select name="idProfesor_materia">
<?php
$datosProfesor_materia=$materias->profesor_materia(0,0);
while ($profesor_materia=mysqli_fetch_array($datosProfesor_materia)) {
	$datosMateria=$materias->verMateria($profesor_materia['idMateria']);
	$materia=mysqli_fetch_array($datosMateria);
	$datosProfesor=$materias->verProfesor($profesor_materia['idUsuario']);
	$profesor=mysqli_fetch_array($datosProfesor);
	$datosMateria_curso=$materias->materia_curso('idProfesor_materia',$profesor_materia['id']);
	$materia_curso=mysqli_fetch_array($datosMateria_curso);
	if($materia_curso['idCurso']!=$curso['id']){

?>
					<option value="<?php echo $profesor_materia['id']; ?>"><?php echo $materia['nombre']." (".$profesor['nombre']." ".$profesor['apellido'].")"; ?></option>
<?php
	}
}
?>
				</select>
				<input type="hidden" name="idCurso" value="<?php echo $curso['id']; ?>">
		  &nbsp	<input type="submit" name="asignar" value="ASIGNAR" class="btn btn-info btn-sm">
			</form>
			</td>
			<td><i>pendiente...</i></td>
		</tr>

<?php
}
?>

	</table>
</div>
