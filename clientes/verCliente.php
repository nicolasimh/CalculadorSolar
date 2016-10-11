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
              <input type="text" class="form-control" readonly="readonly" value="<?php echo $cliente->getRut();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="razonSocial" class="col-sm-2 control-label">Nombre</label>
              <div class="col-sm-4">
              <input type="text" class="form-control" readonly="readonly" value="<?php echo $cliente->getRazonsocial();?>">
              </div>
            <label for="nombre" class="col-sm-1 control-label">Alias</label>
              <div class="col-sm-4">
              <input type="text" class="form-control" readonly="readonly" value="<?php echo $cliente->getNombrefantasia();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="direccion" class="col-sm-2 control-label">Dirección</label>
              <div class="col-sm-6">
              <input type="text" class="form-control" readonly="readonly" value="<?php echo $cliente->getDireccion();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="telefono" class="col-sm-2 control-label">Telefono</label>
              <div class="col-sm-3">
              <input type="text" class="form-control" readonly="readonly" value="<?php echo $cliente->getTelefono();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="contacto" class="col-sm-2 control-label">Nombre Contacto</label>
              <div class="col-sm-3">
              <input type="text" class="form-control" readonly="readonly" value="<?php echo $cliente->getContacto();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-5">
              <input type="email" class="form-control" readonly="readonly" value="<?php echo $cliente->getEmail();?>">
              </div>
          </div>
      </form>

<?php } ?>