<?php
if($_SESSION['perfil']!=1&&$_SESSION['perfil']!=3){
  header("location:".RUTA."index");
}
?>
<div class="container well" id="formR">
<form class="form-horizontal  " action="" method="post">
  <fieldset>
    <p><h3><center>REGISTRO DE USUARIOS<?php if($_SESSION['perfil']==3){ echo " ACUDIENTE";} ?></center></h3></p>
    <div class="form-group ">
      <label  class="col-lg-2 control-label ">Nombre</label>
      <div class="col-lg-6">
        <input type="text" class="form-control" placeholder="nombre" name="nombre" required/>
      </div>
    </div>

    <div class="form-group">
      <label  class="col-lg-2 control-label">Apellido</label>
      <div class="col-lg-6">
        <input type="text" class="form-control"  placeholder="apellidos" name="apellido" required/>
      </div>
    </div>

    <div class="form-group">
      <label  class="col-lg-2 control-label">Genero</label>
      <div class="col-lg-6">
        <input type="radio" name="genero" value="masculino"> Masculino&nbsp
        <input type="radio" name="genero" value="femenino"> Femenino&nbsp
      </div>
    </div>

<div class="form-group">
      <label class="col-lg-2 control-label">Identificacion</label>
      <div class="col-lg-6">
        <input type="text" class="form-control"  placeholder="numero de identificacion" name="identificacion" required/>
      </div>
    </div>

<div class="form-group">
      <label class="col-lg-2 control-label">Telefono</label>
      <div class="col-lg-6">
        <input type="text" class="form-control"  placeholder="Telefeno" name="telefono" required />
      </div>
    </div>

    <div class="form-group">
      <label  class="col-lg-2 control-label">Correo</label>
      <div class="col-lg-6">
        <input type="text" class="form-control"  placeholder="ejemplo@ejemplo.com" name="correo" required/>
      </div>
    </div>

<div class="form-group">
      <label class="col-lg-2 control-label">Direccion</label>
      <div class="col-lg-6">
        <input type="text" class="form-control"  placeholder="Direccion" name="direccion" required/>
      </div>
    </div>
<?php if($_SESSION['perfil']==1){ ?>
<div class="form-group">
      <label  class="col-lg-3 control-label">Fecha Nacimiento</label>
      <div class="col-lg-6">
        <input type="date" class="form-control"  name="fechaNacimiento" required/>
      </div>
    </div>

<div class="form-group">
      <label  class="col-lg-2 control-label">RH</label>
      <div class="col-lg-6">
        <input type="radio" name="rh" value="O+"> O+&nbsp
        <input type="radio" name="rh" value="O-"> O-&nbsp
        <input type="radio" name="rh" value="A+"> A+&nbsp
        <input type="radio" name="rh" value="A-"> A-<br>
        <input type="radio" name="rh" value="B+"> B+&nbsp
        <input type="radio" name="rh" value="B-"> B-&nbsp
        <input type="radio" name="rh" value="AB+"> AB+&nbsp
        <input type="radio" name="rh" value="AB-"> AB-
      </div>
    </div>

<div class="form-group">
      <label for="inputPerfil" class="col-lg-2 control-label">Perfil</label>
      <div class="col-lg-6">
        <select name="perfil" required/>
        	<option></option>
        	<option value="1">Administrador</option>
        	<option value="2">Profesor</option>
        	<option value="3">Alumno</option>
        </select>
      </div>
    </div>
    <?php }else{  ?>
    <input type="hidden" name="perfil" value="4">
  <?php  } ?>

	<br>
    <div class="form-group">
    	<center>
    		<input type="submit" name="aceptar" value="ACEPTAR" class="btn btn-primary">&nbsp &nbsp
    		<input type="reset" name="borrar" value="BORRAR" class="btn btn-warning">
    	</center>
    </div>


</fieldset>

</form>
</div>
