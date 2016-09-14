<?php
require_once("../config.php");
require_once("../models/Bateria.php");

if ( !IS_NULL($_POST["id"]) ) { 
	switch ($_POST["tipo"]) {
		case 'Batería':
			$bateria = new Bateria($_POST["id"]);?>
			<input type="text" name="event" value="alter" class="hide">
			<div class="form-group has-feedback">
				<label class="col-sm-2 control-label" for="nombre">* Nombre</label>
				<div class="col-sm-10">
					<input id="nombre" name="nombre" type="text" class="form-control" maxlength="30" required="required" value="<?php echo $bateria->getNombre();?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="marca">* Marca</label>
				<div class="col-sm-10">
					<input id="marca" name="marca" type="text" class="form-control" maxlength="30" required="required" value="<?php echo $bateria->getMarca();?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="modelo">Modelo</label>
				<div class="col-sm-10">
					<input id="modelo" name="modelo" type="text" class="form-control" maxlength="30" value="<?php echo $bateria->getModelo();?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="descripcion">Descripcion</label>
				<div class="col-sm-10">
					<textarea id="descripcion" name="descripcion" class="form-control" maxlength="100" ><?php echo $bateria->getDescripcion();?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="precioCompra">* Precio Compra</label>
				<div class="input-group col-sm-5">
					<div class="input-group-addon">$</div>
					<input id="precioCompra" name="precioCompra" min="0" class="form-control" required="required" type="number" value="<?php echo $bateria->getPrecioCompra();?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="precioVenta">* Precio Venta</label>
				<div class="input-group col-sm-5">
					<div class="input-group-addon">$</div>
					<input id="precioVenta" name="precioVenta" min="0" class="form-control" required="required" type="number" value="<?php echo $bateria->getPrecioVenta();?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="voltajeBateria">Voltaje Batería</label>
				<div class="col-sm-5">
					<input id="voltajeBateria" name="voltajeBateria" class="form-control" required="required" type="number" min="0" value="<?php echo $bateria->getVoltajeBateria();?>"/>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-5">
					<input type="text" name="idProducto" value="<?php echo $bateria->getId();?>" class="hide">
					<input type="text" name="subIdProducto" value="<?php echo $bateria->getSubId();?>" class="hide">
					<input type="text" name="tipoProducto" value="bateria" class="hide">
					<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk" ></span> Guardar</button>
				</div>
			</div>
<?php
			break;
		
		default:
			# code...
			break;
	}
} else {
	header("location: index.php");
}
?>