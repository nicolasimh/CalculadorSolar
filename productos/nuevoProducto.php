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
			<h3 id="tituloPag">Ingresar Producto</h3>
<?php 
			switch ($_GET["result"]) {
				case 'success':?>
			<div class="alert alert-success alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4>Exito!</h4>
				<p>La operación solicitada se ha realizado exitosamente</p>
			</div>
<?php				break;
				case 'error': ?>
			<div class="alert alert-danger alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4>Ups! Tenemos un problema</h4>
				<p>Los cambio solicitados no se han podido realizar. Favor reintente la operación, si el problema persiste contácte al proveedor del sistema.</p>
			</div>
<?php			break;
				case 'errorDelete'?>
			<div class="alert alert-danger alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4>Ups! El registro está ocupado</h4>
				<p>No hemos podido realizar la eliminación del registro, esto se debe a que se encuentra asociado a un proyecto.</p>
			</div>
<?php			
				break;
				case 'old'?>
			<div class="alert alert-warning alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4>Ups! Ya tenemos este registro</h4>
				<p>No hemos ingresado el registro solicitado debido a que ya se enceuntra en la base de datos. Verifique el estado en que este se encuentra</p>
			</div>
<?php			
				break;				
			}
?>				
			<form class="form-horizontal" method="post" action="../controller/productoController.php">
				<input type="text" name="event" value="new" class="hide">
				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" for="nombre">* Nombre</label>
					<div class="col-sm-3">
						<input id="nombre" name="nombre" type="text" class="form-control" maxlength="30" required="required" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="marca">* Marca</label>
					<div class="col-sm-3">
						<input id="marca" name="marca" type="text" class="form-control" maxlength="30" required="required"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="modelo">Modelo</label>
					<div class="col-sm-3">
						<input id="modelo" name="modelo" type="text" class="form-control" maxlength="30" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="descripcion">Descripcion</label>
					<div class="col-sm-8">
						<textarea id="descripcion" name="descripcion" class="form-control" maxlength="100" ></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="precioCompra">* Precio Compra</label>
					<div class="input-group col-sm-5">
						<div class="input-group-addon">$</div>
						<input id="precioCompra" name="precioCompra" min="0" class="form-control entero" required="required" type="int"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="precioVenta">* Precio Venta</label>
					<div class="input-group col-sm-5">
						<div class="input-group-addon">$</div>
						<input id="precioVenta" name="precioVenta" min="0" class="form-control entero" required="required" type="int"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Tipo</label>
					<div class="btn-group" data-toggle="buttons">
  						<label id="bateria" class="btn btn-default"><input type="radio" > Bateria</label>
  						<label id="inversor" class="btn btn-default"><input type="radio" > Inversor</label>
  						<label id="panel" class="btn btn-default"><input type="radio" > Panel</label>
					</div>
				</div>
				<div id="formTipoProducto">
					
				</div>
			</form>
		</div>
	</div>

	<script src="<?php echo RUTA;?>js/jquery-1.11.3.js"></script>
	<script type="text/javascript" src="<?php echo RUTA;?>js/jquery.numeric.js"></script>
  	<script src="<?php echo RUTA;?>js/bootstrap.min.js"></script>
  	<script src="<?php echo RUTA;?>js/functions.js"></script>
	<script type="text/javascript">
		$(document).ready(function ( ) {
			$('.entero').numeric();
    		$('.decimal').numeric(","); 
			$("#bateria").click(function(){
				$("#formTipoProducto").append().load("productoBateria.php");
			})

			$("#inversor").click(function(){
				$("#formTipoProducto").append().load("productoInversor.php");
			})

			$("#panel").click(function(){ 
				$("#formTipoProducto").append().load("productoPanel.php");
			})
		})
	</script>
</body>
</html>