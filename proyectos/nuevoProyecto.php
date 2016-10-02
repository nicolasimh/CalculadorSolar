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
			<?php include("../menu-lateral-2.php"); ?>
		</div>
		<div class="col-md-9 pull-left" id="body-wrapper">
			<h3 id="tituloPag">Nuevo Proyecto</h3>
			<form class="form-horizontal" method="post" action="../controller/productoController.php">
				<input type="text" name="event" value="new" class="hide">
				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" for="nombre">* Nombre</label>
					<div class="col-sm-8">
						<input id="nombre" name="nombre" type="text" class="form-control" maxlength="50" required="required" />
					</div>
				</div>
				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" for="nombre">Ubicación</label>
					<div class="col-sm-8">
						<input id="ubicacion" name="ubicacion" type="text" class="form-control" maxlength="100" required="required" />
						<div id="map"></div>
					</div>
				</div>
				
				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" for="nombre">Latitud</label>
					<div class="col-sm-3">
						<input id="latitud" name="latitud" type="text" class="form-control" required="required" readonly="readonly"/>
					</div>
					<label class="col-sm-2 control-label" for="nombre">Longitud</label>
					<div class="col-sm-3">
						<input id="longitud" name="longitud" type="text" class="form-control" required="required" readonly="readonly" />
					</div>
				</div>

			</form>
		</div>
	</div>

	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="<?php echo RUTA;?>js/bootstrap.min.js"></script>
	<script src="<?php echo RUTA?>js/functions.js"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY_GOOGLE_MAPS;?>"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		/*
		var map;
		var latitud;
		var longitud;*/

		localizame();
	});
    </script>
</body>
</html>