<?php
  require_once ("../config.php");
  require_once ("../models/Proyecto.php");
  require_once ("../models/Panel.php");
  require_once ("../models/Inversor.php");
  require_once ("../models/Bateria.php");
  require_once ("../models/Mantenimiento.php");

	$proyecto= new Proyecto(null);
	$listaProyecto = $proyecto->getListado();

  ?>
  <!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?php echo RUTA;?>css/normalize.css" rel="stylesheet">
  <link href="<?php echo RUTA;?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo RUTA;?>css/main.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-fixed-top navbar-inverse" id="menu">
      <?php include("../_menu.php");?>
  </nav>
    <div class="clearfix" id="wrapper">
    <div class="col-md-9 pull-left" id="body-wrapper">
      <h3 id="tituloPag">Cotizar Sistema Fotovoltaico</h3>
      <form class="form-horizontal" action="../controller/calcularController.php" method="post"> 
          <input class="hide" id="estadoproyecto" value="">
          <div class="form-group">
            <label for="proyecto" class="col-sm-2 control-label">Proyecto</label>
              <div class="col-sm-4">
              <select class="form-control" name="proyecto" id="proyecto" required="required">
                    <option value="">Seleccione un Proyecto</option>
                    <?php 
                    foreach ($listaProyecto as $row) {
                          if($row->PROY_ESTADO=="1") 
                            echo '<option value="'.$row->PROY_ID.'">'.$row->PROY_NOMBRE.'</option>';  
                    }?>
              </select>
            </div>
          </div>
          <div id="formTipo">
        </div>
     </form>
    </div>
  </div>

<script src="<?php echo RUTA;?>js/jquery-1.11.3.js"></script>
  <script type="text/javascript" src="<?php echo RUTA;?>js/jquery.numeric.js"></script>
  <script src="<?php echo RUTA;?>js/bootstrap.min.js"></script>
  <script src="<?php echo RUTA;?>js/functions.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
    $('.entero').numeric();
    $('.decimal').numeric(","); 
    $('#proyecto').change(function(){
      var texto = $('#proyecto').val();
      $.ajax({
              url: "estadoProyecto.php",
              method: "POST",
              data: { "id" : texto },
              dataType: "html"
            }).done(
              function(html) {
                $("#formTipo").html( html );
              }
            );
    })
    });

  
  </script>

</body>
</html>