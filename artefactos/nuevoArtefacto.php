<?php
	require_once ("../config.php");
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
    	<div class="col-md-3 pull-right" id="option-wrapper">
        <?php include("../menu-lateral-1.php"); ?>
		</div>
		<div class="col-md-9 pull-left" id="body-wrapper">
			<h3 id="tituloPag">Nuevo Artefacto</h3>
			<form class="form-horizontal" action="../controller/artefactoController.php" method="post">
  				<div class="form-group">
    				
  				</div>
  				<div class="form-group">
    				<label for="Nombre" class="col-sm-2 control-label">* Nombre</label>
    					<div class="col-sm-3">
							<input type="text" class="form-control" id="nombre" maxlength="30" name="nombre" required="required">
    					</div>
  				</div>
  				<div class="form-group">
    				<label for="consumo" class="col-sm-2 control-label">* Consumo kWh </label>
    					<div class="col-sm-3">
							<input type="int" class="form-control entero" id="consumo" name="consumo" required="required">
    					</div>
  				</div>
  				<di
  				<div class="form-group">
    				<div class="col-sm-offset-2 col-sm-10">
      					<input class="hide" name="accion" value="new">
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
    				</div>
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
  });
  </script>

</body>
</html>