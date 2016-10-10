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
              <input type="text" class="form-control" readonly="readonly" value="<?php echo $usuario->getNombre();?>">
              </div>  
            <label for="apellido" class="col-sm-2 control-label">Apellido</label>
              <div class="col-sm-3">
              <input type="text" class="form-control" readonly="readonly" value="<?php echo $usuario->getApellido();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="usuario" class="col-sm-2 control-label">Usuario</label>
              <div class="col-sm-3">
              <input type="text" class="form-control" readonly="readonly" value="<?php echo $usuario->getUsuario();?>">
              </div>
            <label for="tipo" class="col-sm-2 control-label">Tipo</label>
              <div class="col-sm-3">
                <select class="form-control" readonly="readonly">
                  <option value="">Seleccione</option>
                  <option value="Administrador" <?php if ($usuario->getTipo()=='Administrador') echo 'selected="selected"';?> >Administrador</option>
                  <option value="Usuario" <?php if ($usuario->getTipo()=='Usuario') echo 'selected="selected"';?> >Usuario</option>
                </select>
              </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-4">
              <input type="email" class="form-control" readonly="readonly" value="<?php echo $usuario->getEmail();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="estado" class="col-sm-2 control-label">Estado</label>
              <div class="col-sm-3">
              <select class="form-control" readonly="readonly">
                  <option value="">Seleccione</option>
                  <option value="1" <?php if ($usuario->getEstado()=='1')echo 'selected="selected"';?> >Activo</option>
                  <option value="0" <?php if ($usuario->getEstado()=='0')echo 'selected="selected"';?>>Inactivo</option>
                </select>
              </div>
          </div>
      </form>

<?php } ?>