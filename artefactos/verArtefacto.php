<?php
require_once("../config.php");
require_once("../models/Artefacto.php");

if ( !empty($_POST["id"]) ) { 
  $artefacto = new Artefacto ( $_POST["id"] );
?>
<form class="form-horizontal" action="../controller/artefactoController.php" method="post">
          <div class="form-group">
            <label for="id" class="col-sm-2 control-label">ID</label>
              <div class="col-sm-2">
              <input type="text" class="form-control" id="id" name="id" readonly="readonly" value="<?php echo $artefacto->getID();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="nombre" class="col-sm-2 control-label">*Nombre</label>
              <div class="col-sm-5">
              <input type="text" class="form-control" readonly="readonly" value="<?php echo $artefacto->getNombre();?>">
              </div>
          </div>
          <div class="form-group">
            <label for="consumo" class="col-sm-2 control-label">*Consumo</label>
              <div class="col-sm-3">
              <input type="int" class="form-control" readonly="readonly" value="<?php echo $artefacto->getConsumo();?>">
              </div>
          </div>
      </form>

<?php } ?>

