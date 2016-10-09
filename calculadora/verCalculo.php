<?php
  require_once ("../config.php");
  require_once ("../models/Proyecto.php");
  require_once ("../models/Panel.php");
  require_once ("../models/Inversor.php");
  require_once ("../models/Mantenimiento.php");
  
  $proyecto = new Proyecto (null);

  session_start();
  print_r($_SESSION);
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
			<h3 id="tituloPag">Informe Sistema Solar Fotovoltaico</h3>
			<h4>Datos del Proyecto</h4>
			<br>
			<table>
				<tbody>
					<tr>
						<td><strong> Nombre del Proyecto</strong></td>
						<td>:</td>
						<td>Proyecto nombre bla bla bla</td>
					</tr>
					<tr>
						<td>RUT Cliente</td>
						<td>:</td>
						<td>17.613.991-9</td>
					</tr>
					<tr>
						<td>Cliente</td>
						<td>:</td>
						<td>Nombre del cliente</td>
					</tr>
					<tr>
						<td>Ubicación</td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>

			<th>Insumos</th>

			<th>Calculo</th>
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
<?php 
//$_SESSION["calculo"]= null;
?>
</html>
