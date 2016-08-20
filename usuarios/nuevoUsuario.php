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
			<h3 id="tituloPag">Nuevo Usuario</h3>
			<form class="form-horizontal" action="../controller/usuarioController.php" method="post">
  				<div class="form-group">
    				<label for="rut" class="col-sm-2 control-label">RUT</label>
    					<div class="col-sm-4">
							<input type="text" class="form-control" id="rut" placeholder="Ejemplo: 11.111.111-1" name="rut">
    					</div>
  				</div>
  				<div class="form-group">
    				<label for="nombre" class="col-sm-2 control-label">Nombre</label>
    					<div class="col-sm-10">
							<input type="text" class="form-control" id="nombre" maxlength="40" name="nombre">
    					</div>
  				</div>
  				<div class="form-group">
    				<label for="apellido" class="col-sm-2 control-label">Apellido</label>
    					<div class="col-sm-10">
							<input type="text" class="form-control" id="apellido" maxlength="40" name="apellido">
    					</div>
  				</div>
  				<div class="form-group">
    				<label for="usuario" class="col-sm-2 control-label">Usuario</label>
    					<div class="col-sm-10">
							<input type="text" class="form-control" id="usuario" maxlength="20" name="usuario">
    					</div>
  				</div>
  				<div class="form-group">
    				<label for="email" class="col-sm-2 control-label">Email</label>
    					<div class="col-sm-10">
							<input type="email" class="form-control" id="email" maxlength="50" name="email">
    					</div>
  				</div>
          <div class="form-group">
            <label for="clave" class="col-sm-2 control-label">Clave</label>
              <div class="col-sm-10">
              <input type="password" class="form-control" id="clave" maxlength="20" name="clave">
              </div>
          </div>
          <div class="form-group">
            <label for="tipo" class="col-sm-2 control-label">Tipo</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" id="tipo" maxlength="35" name="tipo">
              </div>
          </div>
          <div class="form-group">
            <label for="estado" class="col-sm-2 control-label">Estado</label>
              <div class="col-sm-10">
              <input type="int" class="form-control" id="estado" name="estado">
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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="<?php echo RUTA;?>js/bootstrap.min.js"></script>
  <script src="<?php echo RUTA;?>js/functions.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		
		});
	</script>

</body>
</html>