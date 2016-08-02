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
    	<?php include ("_submenu.php");?>
		</div>
		<div class="col-md-9 pull-left" id="body-wrapper">
			<h3 id="tituloPag">Ingresar Producto</h3>
			<form class="form-horizontal">
				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" for="nombre">* Nombre</label>
					<div class="col-sm-8">
						<input id="nombre" type="text" class="form-control" maxlength="30" required="required" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="marca">* Marca</label>
					<div class="col-sm-8">
						<input id="marca" type="text" class="form-control" maxlength="30" required="required"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="modelo">Modelo</label>
					<div class="col-sm-8">
						<input id="modelo" type="text" class="form-control" maxlength="30" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="descripcion">Descripcion</label>
					<div class="col-sm-8">
						<textarea id="descripcion" class="form-control" maxlength="100" ></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="precioCompra">* Precio Compra</label>
					<div class="input-group col-sm-5">
						<div class="input-group-addon">$</div>
						<input id="precioCompra" class="form-control" required="required" type="number"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="precioVenta">* Precio Venta</label>
					<div class="input-group col-sm-5">
						<div class="input-group-addon">$</div>
						<input id="precioVenta" class="form-control" required="required" type="number"/>
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
		
	</script>
</body>
</html>