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
			<ul class="nav nav-pills nav-stacked">
				<li role="presentation" class="tituloMenuLateral">Mantenedor de Proyectos</li>
				<li role="presentation"><a href="#">Nuevo Proyecto</a></li>
 				<li role="presentation"><a href="index.php">Listado de Proyectos</a></li>
 				<li role="presentation" class="tituloMenuLateral">Mantenedor de Clientes</li>			
 				<li role="presentation" class="active"><a href="nuevoCliente.php">Nuevo Cliente</a></li>
 				<li role="presentation"><a href="listadoClientes.php">Listado de  Clientes</a></li>
			</ul>
		</div>
		<div class="col-md-9 pull-left" id="body-wrapper">
			<h3 id="tituloPag">Nuevo Cliente</h3>
			<form class="form-horizontal">
  				<div class="form-group">
    				<label for="rut" class="col-sm-2 control-label">RUT</label>
    					<div class="col-sm-4">
							<input type="text" class="form-control" id="rut" placeholder="Ejemplo: 11.111.111-1">
    					</div>
  				</div>
  				<div class="form-group">
    				<label for="razonSocial" class="col-sm-2 control-label">Razón Social</label>
    					<div class="col-sm-10">
							<input type="text" class="form-control" id="razonSocial" maxlength="50">
    					</div>
  				</div>
  				<div class="form-group">
    				<label for="nombre" class="col-sm-2 control-label">Nombre</label>
    					<div class="col-sm-10">
							<input type="text" class="form-control" id="nombre" maxlength="40">
    					</div>
  				</div>
  				<div class="form-group">
    				<label for="direccion" class="col-sm-2 control-label">Dirección</label>
    					<div class="col-sm-10">
							<input type="text" class="form-control" id="direccion" maxlength="100">
    					</div>
  				</div>
  				<div class="form-group">
    				<label for="telefono" class="col-sm-2 control-label">Telefono</label>
    					<div class="col-sm-4">
							<input type="number" class="form-control" id="telefono" min="10000000000" max="99999999999" placeholder="Ejemplo: 56966256263">
    					</div>
  				</div>
  				<div class="form-group">
    				<label for="contacto" class="col-sm-2 control-label">Contacto</label>
    					<div class="col-sm-10">
							<input type="text" class="form-control" id="contacto" maxlength="50">
    					</div>
  				</div>
  				<div class="form-group">
    				<label for="email" class="col-sm-2 control-label">Email</label>
    					<div class="col-sm-10">
							<input type="email" class="form-control" id="email" maxlength="50">
    					</div>
  				</div>
  				<div class="form-group">
    				<div class="col-sm-offset-2 col-sm-10">
      					<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
    				</div>
  				</div>
			</form>
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