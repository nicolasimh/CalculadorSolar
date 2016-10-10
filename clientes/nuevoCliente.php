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
<?php       break;
        case 'error': ?>
      <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4>Ups! Tenemos un problema</h4>
        <p>Los cambio solicitados no se han podido realizar. Favor reintente la operación, si el problema persiste contácte al proveedor del sistema.</p>
      </div>
<?php     break;
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
			<form class="form-horizontal" action="../controller/clienteController.php" method="post">
  				<div class="form-group">
    				<label for="rut" class="col-sm-2 control-label">* RUT</label>
    					<div class="col-sm-3">
							<input type="text" class="form-control rut_demo" id="rut" name="rut" required="required">
    					</div>
  				</div>
  				<div class="form-group">
    				<label for="razonSocial" class="col-sm-2 control-label">* Nombre</label>
    					<div class="col-sm-3">
							<input type="text" class="form-control" id="razonSocial" maxlength="50" name="razonsocial" required="required">
    					</div>
    				<label for="nombre" class="col-sm-1 control-label">* Alias</label>
    					<div class="col-sm-2">
							<input type="text" class="form-control" id="nombre" maxlength="40" name="nombrefantasia" required="required">
    					</div>
  				</div>
  				<div class="form-group">
    				<label for="direccion" class="col-sm-2 control-label">Dirección</label>
    					<div class="col-sm-6">
							<input type="text" class="form-control" id="direccion" maxlength="100" name="direccion" required="required">
    					</div>
  				</div>
  				<div class="form-group">
    				<label for="telefono" class="col-sm-2 control-label">Telefono</label>
    					<div class="col-sm-3">
							<input type="text" class="form-control" id="telefono" maxlength="11" placeholder="Ejemplo: 56966256263" onKeypress="soloNumeros(event)" name="telefono" required="required">
    					</div>
  				</div>
  				<div class="form-group">
    				<label for="contacto" class="col-sm-2 control-label">Nombre de Contacto</label>
    					<div class="col-sm-3">
							<input type="text" class="form-control" id="contacto" maxlength="50" name="contacto">
    					</div>
  				</div>
  				<div class="form-group">
    				<label for="email" class="col-sm-2 control-label">* Email</label>
    					<div class="col-sm-5">
							<input type="email" class="form-control" id="email" maxlength="50" name="email" placeholder="Ejemplo: ejemplo@ejemplo.cl" required="required">
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
  <script src="<?php echo RUTA;?>js/jquery.Rut.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.rut_demo').Rut({
      on_error: function(){ 
        $('.rut_demo').parent().find('span').remove();
        $('.rut_demo').parent().append('<span id="helpBlock2" class="help-block">Rut Inválido, favor ingrese nuevamente.</span>');
        $('.rut_demo').parent().parent().removeClass("has-success");
        $('.rut_demo').parent().parent().addClass("has-error");
        $('.rut_demo').val("");
         },

        on_success: function(){ 
          $('.rut_demo').parent().find('span').remove(); 
          $('.rut_demo').parent().append('<span id="helpBlock2" class="help-block">Rut válido.</span>');
          $('.rut_demo').parent().parent().removeClass("has-error");
          $('.rut_demo').parent().parent().addClass("has-success");
        },
      format_on: 'keyup'
});
    });
  </script>

</body>
</html>