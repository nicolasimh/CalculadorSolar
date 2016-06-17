<?php
	require_once ("config.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css" href="<?php echo RUTA;?>css/bootstrap.min.css"></style>
	<style type="text/css" href="<?php echo RUTA;?>css/bootstrap-theme.min.css"></style>
	<style type="text/css" href="<?php echo RUTA;?>css/normalize.css"></style>
	<link href="<?php echo RUTA;?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo RUTA;?>css/main.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-fixed-top navbar-inverse">
     	<?php include ("_menu.php");?>
    </nav>

    <div class="container" id="main">
    	<div>
    		<ul>
    			<li><a class="btn btn-warning" href="">Mis proyectos</a></li>
    			<li><a class="btn btn-primary" href="">Calculadora</a></li>
    		</ul>
    	</div>
    	<div>
    		<ul>
    			<li><a class="btn btn-warning">Cotización</a></li>
    			<li><a class="btn btn-success" href="">Proveedores</a></li>
    		</ul>
    	</div>
    </div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="<?php echo RUTA;?>js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			
		});
	</script>
</body>
</html>
