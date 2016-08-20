<?php
require_once("../config.php");
require_once("../models/Usuario.php");

if ( !empty($_POST["id"]) ) { 
  $usuario = new Usuario ( $_POST["id"] );

?>
	<form class="form-horizontal" action="../controller/usuarioController.php" method="post">
          <div class="form-group">
            <label for="rut" class="col-sm-2 control-label">RUT</label>
              <div class="col-sm-4">
              <input type="text" class="form-control" id="rut" name="rut" readonly="readonly" value="<?php echo $usuario->getRut();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="nombre" class="col-sm-2 control-label">Nombre</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" id="nombre" maxlength="40" name="nombre" value="<?php echo $usuario->getNombre();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="apellido" class="col-sm-2 control-label">Apellido</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" id="apellido" maxlength="40" name="apellido" value="<?php echo $usuario->getApellido();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="usuario" class="col-sm-2 control-label">Usuario</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" id="usuario" maxlength="20" name="usuario" value="<?php echo $usuario->getUsuario();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-4">
              <input type="email" class="form-control" id="email" maxlength="40" name="email" value="<?php echo $usuario->getEmail();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="clave" class="col-sm-2 control-label">Clave</label>
              <div class="col-sm-10">
              <input type="password" class="form-control" id="clave" maxlength="20" name="clave" value="<?php echo $usuario->getClave();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="tipo" class="col-sm-2 control-label">Tipo</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" id="tipo" maxlength="35" name="tipo" value="<?php echo $usuario->getTipo();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="estado" class="col-sm-2 control-label">Estado</label>
              <div class="col-sm-10">
              <input type="int" class="form-control" id="estado" name="estado" value="<?php echo $usuario->getEstado();?>">
              </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input class="hide" name="accion" value="alter">
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Modificar</button>
            </div>
          </div>
      </form>

<?php } ?>
