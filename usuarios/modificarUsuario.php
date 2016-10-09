<?php
require_once("../config.php");
require_once("../models/Usuario.php");

if ( !empty($_POST["id"]) ) { 
  $usuario = new Usuario ( $_POST["id"] );

?>
	<form class="form-horizontal" action="../controller/usuarioController.php" method="post">
          <div class="form-group">
            <label for="rut" class="col-sm-2 control-label">RUT</label>
              <div class="col-sm-3">
              <input type="text" class="form-control" id="rut" name="rut" readonly="readonly" value="<?php echo $usuario->getRut();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="nombre" class="col-sm-2 control-label">Nombre</label>
              <div class="col-sm-3">
              <input type="text" class="form-control" id="nombre" maxlength="40" name="nombre" required="required" value="<?php echo $usuario->getNombre();?>">
              </div>  
            <label for="apellido" class="col-sm-2 control-label">Apellido</label>
              <div class="col-sm-3">
              <input type="text" class="form-control" id="apellido" maxlength="40" name="apellido" required="required" value="<?php echo $usuario->getApellido();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="usuario" class="col-sm-2 control-label">Usuario</label>
              <div class="col-sm-3">
              <input type="text" class="form-control" id="usuario" maxlength="20" name="usuario" required="required" value="<?php echo $usuario->getUsuario();?>">
              </div>
            <label for="tipo" class="col-sm-2 control-label">Tipo</label>
              <div class="col-sm-3">
                <select class="form-control" required="required" name="tipo">
                  <option value="">Seleccione</option>
                  <option value="Administrador" <?php if ($usuario->getTipo()=='Administrador') echo 'selected="selected"';?> >Administrador</option>
                  <option value="Usuario" <?php if ($usuario->getTipo()=='Usuario') echo 'selected="selected"';?> >Usuario</option>
                </select>
              </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-4">
              <input type="email" class="form-control" id="email" maxlength="40" name="email" required="required" value="<?php echo $usuario->getEmail();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="clave" class="col-sm-2 control-label">Clave</label>
              <div class="col-sm-4 ">
              <input type="password" class="form-control" id="clave" maxlength="20" name="clave" value="<?php echo $usuario->getClave();?>">
              <h6>*Ingresar sólo si desea modificar clave anterior<h6></div>
          </div>
          <div class="form-group">
            <label for="estado" class="col-sm-2 control-label">Estado</label>
              <div class="col-sm-3">
              <select class="form-control" name="estado">
                  <option value="">Seleccione</option required="required">
                  <option value="1" <?php if ($usuario->getEstado()=='1')echo 'selected="selected"';?> >Activo</option>
                  <option value="0" <?php if ($usuario->getEstado()=='0')echo 'selected="selected"';?>>Inactivo</option>
                </select>
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
