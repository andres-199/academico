<?php
if($_SESSION['perfil']!=1){

	header("location:".RUTA."index");
}
?>

<p><center><font size="5"> <b>ESTUDIANTES</b></font><i><font size="2" color="gray">&nbsp&nbsp(Matricular materias a estudiantes)</font></i></center></p>
<div class="container" id="formR">
		
<?php
if(!$_POST){
?>
			
<form action="" method="post" > 
<div class="row">
  <div class="col-lg-8">
    <div class="input-group">
      <input type="text" name="correo" class="form-control" placeholder="Ingrese el correo de el estudiante" required />
      <span class="input-group-btn">
        <button class="btn btn-default btn-sm" type="submit" name="buscar">Buscar</button>
      </span>
    </div>
  </div>
</div>
</form>
			
<?php
}
?>
			
<?php
if(isset($_POST['buscar'])){
	if($datos[1]==TRUE){//comprueba si el estudiante esta registrado en un curso
		echo "datos";
	}else{
		if($datos[2]['perfil']!=3){
			echo"<center><font color=\"red\" size=\"3\">El Correo Ingresado no corresponde a una cuenta de estudiante</font><a href=\"".RUTA."materias/estudiantes\">  regresar atras <<</a></center>";
		}else{
?>
<p><font color="red">El estudiante <b><?php echo $datos[1]." ".$datos[2]['nombre']." ".$datos[2]['apellido']; ?></b> no se encuentra registrado en ningun curso "Activo" </font></p>
			<td>
				<form action="" method="post" >
				<div class="form-group ">
     			 <label  class="col-lg-8 control-label ">	Elija el curso a registrar</label>
      				<div class="col-lg-6">
       				<select name="idCurso">
<?php
$datosCurso=$materias->cursos();
while ($curso=mysqli_fetch_array($datosCurso)) {
?>
					<option value="<?php echo $curso['id']; ?>"><?php echo $curso['nombre']; ?></option>
<?php
}
?>						
					</select>
     			 	</div>
				</div>
			<div class="form-group ">	
					<label  class="col-lg-6 control-label ">Fecha inicio</label>
      			<div class="col-lg-6">
					<input type="date" name="fechaInicio" required />
				</div>
			</div>

			<div class="form-group ">	
					<label  class="col-lg-6 control-label ">Fecha fin</label>
      			<div class="col-lg-6">
					<input type="date" name="fechaFin" required />
				</div>
			</div>
			<div class="form-group ">
				<div class="col-lg-6">
					<input type="hidden" name="idUsuario" value="<?php echo $datos[2]['id']?>">
					<input type="submit" name="registrarCurso" value="REGISTRAR" class="btn btn-success btn-sm">
				</div>
			</div>
				</form>
			
<?php
		}
	}
}
?>
			

</div>