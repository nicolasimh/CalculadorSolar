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
			<h3 id="tituloPag">Nuevo Cliente</h3>
			<form class="form-horizontal" action="../controller/clienteController.php" method="post">
  				<div class="form-group">
    				<label for="rut" class="col-sm-2 control-label">RUT</label>
    					<div class="col-sm-4">
							<input type="text" class="form-control" id="rut" placeholder="Ejemplo: 11.111.111-1" name="rut">
    					</div>
  				</div>
  				<div class="form-group">
    				<label for="razonSocial" class="col-sm-2 control-label">Razón Social</label>
    					<div class="col-sm-10">
							<input type="text" class="form-control" id="razonSocial" maxlength="50" name="razonsocial">
    					</div>
  				</div>
  				<div class="form-group">
    				<label for="nombre" class="col-sm-2 control-label">Nombre Corto</label>
    					<div class="col-sm-10">
							<input type="text" class="form-control" id="nombre" maxlength="40" name="nombrefantasia">
    					</div>
  				</div>
  				<div class="form-group">
    				<label for="direccion" class="col-sm-2 control-label">Dirección</label>
    					<div class="col-sm-10">
							<input type="text" class="form-control" id="direccion" maxlength="100" name="direccion">
    					</div>
  				</div>
  				<div class="form-group">
    				<label for="telefono" class="col-sm-2 control-label">Telefono</label>
    					<div class="col-sm-4">
							<input type="text" class="form-control" id="telefono" maxlength="11" placeholder="Ejemplo: 56966256263" onKeypress="soloNumeros(event)" name="telefono">
    					</div>
  				</div>
  				<div class="form-group">
    				<label for="contacto" class="col-sm-2 control-label">Contacto</label>
    					<div class="col-sm-10">
							<input type="text" class="form-control" id="contacto" maxlength="50" name="contacto">
    					</div>
  				</div>
  				<div class="form-group">
    				<label for="email" class="col-sm-2 control-label">Email</label>
    					<div class="col-sm-10">
							<input type="email" class="form-control" id="email" maxlength="50" name="email">
    					</div>
  				</div>
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
	<script src="<?php echo RUTA;?>js/bootstrap.min.js"></script>
  <script src="<?php echo RUTA;?>js/functions.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		
		});
	</script>

</body>
</html>