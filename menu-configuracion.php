    <?php
	require_once ("config.php");
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
	<nav class="navbar navbar-fixed-top navbar-inverse">
     	<?php include ("_menu.php");?>
    </nav>

    <div class="container" id="main">
    	<div>
    		<ul class="clearfix">
    			<li><a class="btn btn-danger" href="usuarios/index.php"><span class="glyphicon glyphicon-lock"></span><br><br>Mantenedor Usuarios</a></li>
    			<li><a class="btn btn-info" href="clientes/index.php"><span class="glyphicon glyphicon-user"></span><br><br>Mantenedor Clientes</a></li>
    		</ul>
    	</div>
    	<div >
    		<ul class= "clearfix">
    			<li><a class="btn btn-success" href="productos/index.php"><span class="glyphicon glyphicon-blackboard"></span><br><br> Mantener Productos</a></li>
    			<li><a class="btn btn-warning" href="artefactos/index.php"><span class="glyphicon glyphicon-lamp"></span><br><br>Mantener Artefactos <br> Eléctricos</a></li>
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
