<?php
require_once("../config.php");
require_once("../models/Bateria.php");
require_once("../models/Inversor.php");
require_once("../models/Panel.php");

if ( !IS_NULL($_POST["id"]) ) { 
$producto = new Producto($_POST["idProd"]);
?>
<input type="text" name="event" value="alter" class="hide">
<div class="form-group has-feedback">
	<label class="col-sm-2 control-label" for="nombre">* Nombre</label>
	<div class="col-sm-10">
		<input id="nombre" name="nombre" type="text" class="form-control" maxlength="30" required="required" value="<?php echo $producto->getNombre();?>"/>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="marca">* Marca</label>
	<div class="col-sm-10">
		<input id="marca" name="marca" type="text" class="form-control" maxlength="30" required="required" value="<?php echo $producto->getMarca();?>"/>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="modelo">Modelo</label>
	<div class="col-sm-10">
		<input id="modelo" name="modelo" type="text" class="form-control" maxlength="30" value="<?php echo $producto->getModelo();?>"/>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="descripcion">Descripcion</label>
	<div class="col-sm-10">
		<textarea id="descripcion" name="descripcion" class="form-control" maxlength="100" ><?php echo $producto->getDescripcion();?></textarea>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="precioCompra">* Precio Compra</label>
	<div class="input-group col-sm-5">
		<div class="input-group-addon">$</div>
		<input id="precioCompra" name="precioCompra" min="0" class="form-control" required="required" type="number" value="<?php echo $producto->getPrecioCompra();?>"/>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="precioVenta">* Precio Venta</label>
	<div class="input-group col-sm-5">
		<div class="input-group-addon">$</div>
		<input id="precioVenta" name="precioVenta" min="0" class="form-control" required="required" type="number" value="<?php echo $producto->getPrecioVenta();?>"/>
	</div>
</div>

<?php
	switch ($_POST["tipo"]) {
		case 'Batería':
			$bateria = new Bateria($_POST["id"]);
?>			
			<div class="form-group">
				<label class="col-sm-2 control-label" for="voltajeBateria">Voltaje Batería</label>
				<div class="col-sm-3">
					<select class="form-control" required="required" name="voltajeBateria">
	                  <option value="">Seleccione</option>
	                  <option value="2" <?php if ($bateria->getVoltajeBateria()=='2') echo 'selected="selected"';?> >2V</option>
	                  <option value="6" <?php if ($bateria->getVoltajeBateria()=='6') echo 'selected="selected"';?> >6V</option>
	                  <option value="12" <?php if ($bateria->getVoltajeBateria()=='12') echo 'selected="selected"';?> >12V</option>
	                </select>
				</div>				
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-5">
				<input type="text" name="idProducto" value="<?php echo $bateria->getId();?>" class="hide">
				<input type="text" name="subIdProducto" value="<?php echo $bateria->getSubId();?>" class="hide">
				<input type="text" name="tipoProducto" value="bateria" class="hide">
			</div>
</div>
<?php
			break;
		

		case 'Inversor':
			$inversor = new Inversor($_POST["id"]);
			print_r($inversor->getTipo());
?>	
			<div class="form-group">
				<label class="col-sm-2 control-label" for="tipoInversor">Tipo de Inversor</label>
				<div class="col-sm-3">
					<select id="tipoInversor" name="tipoInversor" class="form-control" required="required">
						<option value="">Seleccione</option>
						<option value="Aislado" <?php if ($inversor->getTipo()=='Aislado') echo 'selected="selected"';?> >Aislado</option>
						<option value="En Red" <?php if($inversor->getTipo()=='En Red') echo 'selected="selected"';?> >En Red</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="potenciaInversor">Potencia</label>
				<div class="col-sm-5">
					<input id="potenciaInversor" name="potenciaInversor" class="form-control" required="required" type="number" step="0.01" min="0" value="<?php echo $inversor->getPotenciaCA();?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="voltajeEntrada">Voltaje Entrada</label>
				<div class="col-sm-5">
					<input id="voltajeEntrada" name="voltajeEntrada" class="form-control" required="required" type="number" step="0.01" min="0" value="<?php echo $inversor->getVoltajeEntrada();?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="corrienteEntrada">Corriente Entrada</label>
				<div class="col-sm-5">
					<input id="corrienteEntrada" name="corrienteEntrada" class="form-control" required="required" type="number" step="0.01" min="0" value ="<?php echo $inversor->getCorrienteEntrada();?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="rendimiento">Rendimiento</label>
				<div class="col-sm-5">
					<input id="rendimiento" name="rendimiento" class="form-control" required="required" type="number" step="0.01" min="0" value="<?php echo $inversor->getRendimiento();?>" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-5">
				<input type="text" name="idProducto" value="<?php echo $inversor->getId();?>" class="hide">
				<input type="text" name="subIdProducto" value="<?php echo $inversor->getSubId();?>" class="hide">
				<input type="text" name="tipoProducto" value="inversor" class="hide">
			</div>		
<?php		
			break;


		case 'Panel':
			$panel = new Panel ($_POST["id"]);
?>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="potenciaPanel">Portencia Panel</label>
					<div class="col-sm-5">
						<input id="potenciaPanel" name="potenciaPanel" class="form-control" required="required" type="number" step="0.01" min="0" value="<?php echo $panel->getPotencia();?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="voltajeCorrienteAlterna">Voltaje Corriente Alterna</label>
					<div class="col-sm-5">
						<input id="voltajeCorrienteAlterna" name="voltajeCorrienteAlterna" class="form-control" type="number" step="0.01" min="0" value="<?php echo $panel->getVCA();?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="nominal">Potencia Nominal</label>
					<div class="col-sm-5">
						<input id="nominal" name="nominal" class="form-control" type="number" step="0.01" min="0" value="<?php echo $panel->getNominal();?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="rendimiento">Rendimiento</label>
					<div class="col-sm-5">
						<input id="rendimiento" name="rendimiento" class="form-control" type="number" step="0.01" min="0" value="<?php echo $panel->getRendimiento();?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="altoPanel">Alto del Panel</label>
					<div class="col-sm-5">
						<div class="input-group">
							<input id="altoPanel" name="altoPanel" class="form-control" type="number" step="0.01" min="0" value="<?php echo $panel->getAlto();?>"/>
							<span class="input-group-addon">Mts.</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="altoAncho">Alto del Ancho</label>
					<div class="col-sm-5">
						<div class="input-group">
							<input id="altoAncho" name="altoAncho" class="form-control" type="number" step="0.01" min="0" value="<?php echo $panel->getAncho();?>"/>
							<span class="input-group-addon">Mts.</span>
						</div>
					</div>
				</div>
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-5">
				<input type="text" name="idProducto" value="<?php echo $panel->getId();?>" class="hide">
				<input type="text" name="subIdProducto" value="<?php echo $panel->getSubId();?>" class="hide">
				<input type="text" name="tipoProducto" value="panel" class="hide">
			</div>	
	<?php
			break;
	} ?>

	<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk" ></span> Guardar</button>
<?php
} else {
	header("location: index.php");
}
?>