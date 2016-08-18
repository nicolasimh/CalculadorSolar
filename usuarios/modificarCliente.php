<?php
require_once("../config.php");
require_once("../models/Cliente.php");

if ( !empty($_POST["id"]) ) { 
  $cliente = new Cliente ( $_POST["id"] );

?>
	<form class="form-horizontal" action="../controller/clienteController.php" method="post">
          <div class="form-group">
            <label for="rut" class="col-sm-2 control-label">RUT</label>
              <div class="col-sm-4">
              <input type="text" class="form-control" id="rut" name="rut" readonly="readonly" value="<?php echo $cliente->getRut();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="razonSocial" class="col-sm-2 control-label">Razón Social</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" id="razonSocial" maxlength="50" name="razonsocial" value="<?php echo $cliente->getRazonsocial();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="nombre" class="col-sm-2 control-label">Nombre Corto</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" id="nombre" maxlength="40" name="nombrefantasia" value="<?php echo $cliente->getNombrefantasia();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="direccion" class="col-sm-2 control-label">Dirección</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" id="direccion" maxlength="100" name="direccion" value="<?php echo $cliente->getDireccion();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="telefono" class="col-sm-2 control-label">Telefono</label>
              <div class="col-sm-4">
              <input type="text" class="form-control" id="telefono" maxlength="11" onKeypress="soloNumeros(event)" name="telefono" value="<?php echo $cliente->getTelefono();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="contacto" class="col-sm-2 control-label">Contacto</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" id="contacto" maxlength="50" name="contacto" value="<?php echo $cliente->getContacto();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
              <input type="email" class="form-control" id="email" maxlength="50" name="email" value="<?php echo $cliente->getEmail();?>">
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
