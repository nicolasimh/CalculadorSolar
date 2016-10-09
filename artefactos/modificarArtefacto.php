<?php
require_once("../config.php");
require_once("../models/Artefacto.php");

if ( !empty($_POST["id"]) ) { 
  $artefacto = new Artefacto ( $_POST["id"] );

?>
	<form class="form-horizontal" action="../controller/artefactoController.php" method="post">
          <div class="form-group">
            <label for="id" class="col-sm-2 control-label">ID</label>
              <div class="col-sm-4">
              <input type="text" class="form-control" id="id" name="id" readonly="readonly" value="<?php echo $artefacto->getID();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="nombre" class="col-sm-2 control-label">*Nombre</label>
              <div class="col-sm-3">
              <input type="text" class="form-control" id="nombre" maxlength="30" name="nombre" value="<?php echo $artefacto->getNombre();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="consumo" class="col-sm-2 control-label">*Consumo</label>
              <div class="col-sm-3">
              <input type="int" class="form-control entero" id="consumo" name="consumo" value="<?php echo $artefacto->getConsumo();?>">
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
  <script src="<?php echo RUTA;?>js/jquery-1.11.3.js"></script>
  <script type="text/javascript" src="<?php echo RUTA;?>js/jquery.numeric.js"></script>
  <script src="<?php echo RUTA;?>js/bootstrap.min.js"></script>
  <script src="<?php echo RUTA;?>js/functions.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
    $('.entero').numeric();
    $('.decimal').numeric(","); 
  });
  </script>
