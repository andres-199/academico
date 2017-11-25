<?php

$usuario=mysqli_fetch_array($datos);

?>
<div class="container" id="formR">
<form class="form-horizontal  " action="" method="post">
  <fieldset>
    <p><h3><center>MODIFICAR DATOS ACUDIENTE</center></h3></p>
    <div class="form-group ">
      <label  class="col-lg-2 control-label ">Nombre</label>
      <div class="col-lg-6">
        <input type="text" class="form-control" value=" <?php echo $usuario['nombre']; ?> " name="nombre" required/>
      </div>
    </div>

    <div class="form-group">
      <label  class="col-lg-2 control-label">Apellido</label>
      <div class="col-lg-6">
        <input type="text" class="form-control"  value="<?php echo $usuario['apellido']; ?>" name="apellido" required/>
      </div>
    </div>

    <div class="form-group">
      <label  class="col-lg-2 control-label">Genero</label>
      <div class="col-lg-6">
        <input type="radio" name="genero" value="masculino"<?php if($usuario['genero']=="masculino"){echo "checked";}?>> Masculino&nbsp
        <input type="radio" name="genero" value="femenino"<?php if($usuario['genero']=="femenino"){echo "checked";}?>> Femenino&nbsp
      </div>
    </div>

<div class="form-group">
      <label class="col-lg-2 control-label">Identificacion</label>
      <div class="col-lg-6">
        <input type="text" class="form-control"  value="<?php echo $usuario['identificacion']; ?>" name="identificacion" required/>
      </div>
    </div>

<div class="form-group">
      <label class="col-lg-2 control-label">Telefono</label>
      <div class="col-lg-6">
        <input type="text" class="form-control"  value="<?php echo $usuario['telefono']; ?>" name="telefono" required />
      </div>
    </div>

    <div class="form-group">
      <label  class="col-lg-2 control-label">Correo</label>
      <div class="col-lg-6">
        <input type="text" class="form-control"  value="<?php echo $usuario['correo']; ?>" name="correo" required/>
      </div>
    </div>

<div class="form-group">
      <label class="col-lg-2 control-label">Direccion</label>
      <div class="col-lg-6">
        <input type="text" class="form-control"  value="<?php echo $usuario['direccion']; ?>" name="direccion" required/>
      </div>
    </div>

    <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

  <br>
    <div class="form-group">
      <center>
        <input type="submit" name="aceptar" value="  ACEPTAR  " class="btn btn-success">&nbsp &nbsp
        
      </center>
    </div>

         
</fieldset>

</form>
</div>
