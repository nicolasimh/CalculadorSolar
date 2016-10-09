<?php 
require_once('../config.php');
require_once('../models/Proyecto.php');
require_once('../models/Cliente.php');

$cliente = new Cliente ( null );
$listaClientes = $cliente->getListado();
$proyecto = new Proyecto( $_POST["id"] );
?>

	<input type="text" name="event" value="alter" class="hide">
	<input type="text" name="id" value="<?php echo $proyecto->getId();?>" class="hide">
	<div class="form-group has-feedback">
		<label class="col-sm-2 control-label" for="nombre">Cliente</label>
		<div class="col-sm-8">
			<select class="form-control" required="required" name ="cliente">
				<?php
					foreach ($listaClientes as $row) { ?>
						<option value"">Seleccione un Cliente</option>
						<option <?php if ( $row->CL_RUT == $proyecto->getRut()) echo 'selected="selected"' ?> value="<?php echo $row->CL_RUT?>"><?php echo $row->CL_RUT.' | '.$row->CL_RAZONSOCIAL; ?> </option>
				<?php 
					}
				?>
			</select>
		</div>
	</div>
	<div class="form-group has-feedback">
		<label class="col-sm-2 control-label" for="nombre">Nombre</label>
		<div class="col-sm-10">
			<input id="nombre" name="nombre" type="text" class="form-control" maxlength="50" required="required" value="<?php echo $proyecto->getNombre();?>" />
		</div>
	</div>
	<div class="form-group has-feedback">
		<label class="col-sm-2 control-label" for="nombre">Ubicación</label>
		<div class="col-sm-10">
			<div class="input-group">
				<input id="ubicacion" name="ubicacion" type="text" class="form-control" maxlength="100" required="required" value="<?php echo $proyecto->getUbicacion();?>" />
				<span class="input-group-btn">
					<button id="buscarDireccion" class="btn btn-default" type="button">Ubicar Dirección</button>
					</span>
				</div>
			<div id="map"></div>
		</div>
	</div>
	
	<div class="form-group has-feedback">
		<label class="col-sm-2 control-label" for="nombre">Latitud</label>
		<div class="col-sm-3">
			<input id="latitud" name="latitud" type="text" class="form-control" required="required" readonly="readonly" value="<?php echo $proyecto->getLatitud();?>"/>
		</div>
		<label class="col-sm-2 control-label" for="nombre">Longitud</label>
		<div class="col-sm-3">
			<input id="longitud" name="longitud" type="text" class="form-control" required="required" readonly="readonly" value="<?php echo $proyecto->getLongitud();?>"/>
		</div>
	</div>
	<div class="form-group has-feedback">
		<label class="col-sm-2 control-label" for="nombre">Tipo de Proyecto</label>
		<div class="col-sm-10">
			<div class="btn-group" data-toggle="buttons">
					<label id="red" class="btn btn-default <?php if($proyecto->getTipo() == 0) echo 'active'; ?>">
					<input name="tipoProyecto" type="radio" value="0" required="required" <?php if($proyecto->getTipo() == 0) echo 'checked'; ?> > Sistema en Red
				</label>
				<label id="red" class="btn btn-default <?php if($proyecto->getTipo() == 1) echo 'active'; ?>">
				    <input name="tipoProyecto" type="radio" value="1" required="required" <?php if($proyecto->getTipo() == 1) echo 'checked'; ?>> Sistema Aislado
				</label>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
    		<button onclick="return confirm('¿Está seguro que desea modificar el proyecto?\nEl estado cambiará a \”Creado\” y se eliminarán todos los cálculos');" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
		</div>
	</div>
	<script type="text/javascript">
	$(document).ready(function(){
		/*
		var lat = $("#latitud").val();
		var lon = $("#longitud").val();
		initMapCoordenadasModificar(lat,lon);	
*/
		//initMapCoordenadasModificar();
		initMapDireccion();

		$("#buscarDireccion").click(
			function(){
				initMapDireccion();
			}
		);	
				});

	</script>