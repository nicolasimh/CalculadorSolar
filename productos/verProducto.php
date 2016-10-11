<?php
require_once("../config.php");
require_once("../models/Bateria.php");
require_once("../models/Inversor.php");
require_once("../models/Panel.php");

if ( !IS_NULL($_POST["id"]) ) { 
$producto = new Producto($_POST["idProd"]);
?>
<div class="form-group has-feedback">
	<label class="col-sm-2 control-label" for="nombre">Nombre</label>
	<div class="col-sm-5">
		<input class="form-control" readonly="readonly" required="required" value="<?php echo $producto->getNombre();?>"/>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="marca">Marca</label>
	<div class="col-sm-3">
		<input class="form-control" readonly="readonly" value="<?php echo $producto->getMarca();?>"/>
	</div>
	<label class="col-sm-2 control-label" for="modelo">Modelo</label>
	<div class="col-sm-3">
		<input class="form-control" readonly="readonly" value="<?php echo $producto->getModelo();?>"/>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="descripcion">Descripcion</label>
	<div class="col-sm-8">
		<textarea class="form-control" readonly="readonly"><?php echo $producto->getDescripcion();?></textarea>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="precioCompra">Precio Compra</label>
	<div class="input-group col-sm-5">
		<div class="input-group-addon">$</div>
		<input class="form-control" readonly="readonly" value="<?php echo $producto->getPrecioCompra();?>"/>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="precioVenta">Precio Venta</label>
	<div class="input-group col-sm-5">
		<div class="input-group-addon">$</div>
		<input class="form-control" required="required" readonly="readonly" value="<?php echo $producto->getPrecioVenta();?>"/>
	</div>
</div>

<?php
	switch ($_POST["tipo"]) {
		case 'Batería':
			$bateria = new Bateria($_POST["id"]);
?>			
			<div class="form-group">
				<label class="col-sm-2 control-label" readonly="readonly" for="voltajeBateria">Voltaje Batería</label>
				<div class="col-sm-3">
					<select class="form-control" required="required" readonly="readonly" name="voltajeBateria">
	                  <option value="">Seleccione</option>
	                  <option value="2" <?php if ($bateria->getVoltajeBateria()=='2') echo 'selected="selected"';?> >2V</option>
	                  <option value="6" <?php if ($bateria->getVoltajeBateria()=='6') echo 'selected="selected"';?> >6V</option>
	                  <option value="12" <?php if ($bateria->getVoltajeBateria()=='12') echo 'selected="selected"';?> >12V</option>
	                </select>
				</div>				
			</div>
</div>
<?php
			break;
		

		case 'Inversor':
			$inversor = new Inversor($_POST["id"]);	
?>	
			<div class="form-group">
				<label class="col-sm-2 control-label" for="tipoInversor">* Tipo de Inversor</label>
				<div class="col-sm-3">
					<select class="form-control" readonly="readonly">
						<option value="">Seleccione</option>
						<option value="Aislado" <?php if ($inversor->getTipo()=='Aislado') echo 'selected="selected"';?> >Aislado</option>
						<option value="En Red" <?php if($inversor->getTipo()=='En Red') echo 'selected="selected"';?> >En Red</option>
					</select>
				</div>
				<label class="col-sm-2 control-label" for="rendimiento">*Rendimiento</label>
				<div class="col-sm-3">
					<select readonly="readonly" class="form-control">
						<option value="">Seleccione</option>
						<option value="0.9" <?php if($inversor->getRendimiento()=="0.9") echo 'selected="selected"' ;?> >90%</option>
						<option value="0.91" <?php if($inversor->getRendimiento()=="0.91") echo 'selected="selected"';?> >91%</option>
						<option value="0.92" <?php if($inversor->getRendimiento()=="0.92") echo 'selected="selected"' ;?> >92%</option>
						<option value="0.93" <?php if($inversor->getRendimiento()=="0.93") echo 'selected="selected"' ;?>>93%</option>
						<option value="0.94" <?php if($inversor->getRendimiento()=="0.94") echo 'selected="selected"' ;?>>94%</option>
						<option value="0.95" <?php if($inversor->getRendimiento()=="0.95") echo 'selected="selected"' ;?>>95%</option>
						<option value="0.96" <?php if($inversor->getRendimiento()=="0.96") echo 'selected="selected"' ;?>>96%</option>
						<option value="0.97" <?php if($inversor->getRendimiento()=="0.97") echo 'selected="selected"' ;?>>97%</option>
						<option value="0.98" <?php if($inversor->getRendimiento()=="0.98") echo 'selected="selected"' ;?>>98%</option>
						<option value="0.99" <?php if($inversor->getRendimiento()=="0.99") echo 'selected="selected"' ;?>>99%</option>
						<option value="1" <?php if($inversor->getRendimiento()=="1") echo 'selected="selected"' ;?>>100%</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="potenciaInversor">*Potencia(W)</label>
				<div class="col-sm-3">
					<input class="form-control entero" readonly="readonly" value="<?php echo $inversor->getPotenciaCA();?>"/>
				</div>
				<label class="col-sm-2 control-label" for="voltajeEntrada">*Voltaje Entrada(V)</label>
				<div class="col-sm-3">
					<select class="form-control" readonly="readonly">
						<option value="">Seleccione</option>
						<option value="12" <?php if($inversor->getVoltajeEntrada()=="12") echo 'selected="selected"';?>>12V</option>
						<option value="24" <?php if($inversor->getVoltajeEntrada()=="24") echo 'selected="selected"';?>>24V</option>
						<option value="48" <?php if($inversor->getVoltajeEntrada()=="48") echo 'selected="selected"';?>>48V</option>
						<option value="72" <?php if($inversor->getVoltajeEntrada()=="72") echo 'selected="selected"';?>>72V</option>
					</select>
				</div>
			</div>
				
<?php		
			break;


		case 'Panel':
			$panel = new Panel ($_POST["id"]);
?>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="rendimiento">Rendimiento</label>
					<div class="col-sm-3">
						<select id="rendimiento" name="rendimiento" readonly="readonly" required="required" class="form-control">
							<option value="">Seleccione</option>
							<option value="0" <?php if($panel->getRendimiento()=="0")echo 'selected="selected"';?>>0</option>
							<option value="1" <?php if($panel->getRendimiento()=="1")echo 'selected="selected"';?>>1%</option>
							<option value="2" <?php if($panel->getRendimiento()=="2")echo 'selected="selected"';?>>2%</option>
							<option value="3" <?php if($panel->getRendimiento()=="3")echo 'selected="selected"';?>>3%</option>
							<option value="4" <?php if($panel->getRendimiento()=="4")echo 'selected="selected"';?>>4%</option>
							<option value="5" <?php if($panel->getRendimiento()=="5")echo 'selected="selected"';?>>5%</option>
							<option value="6" <?php if($panel->getRendimiento()=="6")echo 'selected="selected"';?>>6%</option>
							<option value="7" <?php if($panel->getRendimiento()=="7")echo 'selected="selected"';?>>7%</option>
							<option value="8" <?php if($panel->getRendimiento()=="8")echo 'selected="selected"';?>>8%</option>
							<option value="9" <?php if($panel->getRendimiento()=="9")echo 'selected="selected"';?>>9%</option>
							<option value="10" <?php if($panel->getRendimiento()=="10")echo 'selected="selected"';?>>10%</option>
							<option value="11" <?php if($panel->getRendimiento()=="11")echo 'selected="selected"';?>>11%</option>
							<option value="12" <?php if($panel->getRendimiento()=="12")echo 'selected="selected"';?>>12%</option>
							<option value="13" <?php if($panel->getRendimiento()=="13")echo 'selected="selected"';?>>13%</option>
							<option value="14" <?php if($panel->getRendimiento()=="14")echo 'selected="selected"';?>>14%</option>
							<option value="15" <?php if($panel->getRendimiento()=="15")echo 'selected="selected"';?>>15%</option>
							<option value="16" <?php if($panel->getRendimiento()=="16")echo 'selected="selected"';?>>16%</option>
							<option value="17" <?php if($panel->getRendimiento()=="17")echo 'selected="selected"';?>>17%</option>
							<option value="18" <?php if($panel->getRendimiento()=="18")echo 'selected="selected"';?>>18%</option>
							<option value="19" <?php if($panel->getRendimiento()=="19")echo 'selected="selected"';?>>19%</option>
							<option value="20" <?php if($panel->getRendimiento()=="20")echo 'selected="selected"';?>>20%</option>
							<option value="21" <?php if($panel->getRendimiento()=="21")echo 'selected="selected"';?>>21%</option>
							<option value="22" <?php if($panel->getRendimiento()=="22")echo 'selected="selected"';?>>22%</option>
							<option value="23" <?php if($panel->getRendimiento()=="23")echo 'selected="selected"';?>>23%</option>
							<option value="24" <?php if($panel->getRendimiento()=="24")echo 'selected="selected"';?>>24%</option>
							<option value="25" <?php if($panel->getRendimiento()=="25")echo 'selected="selected"';?>>25%</option>
							<option value="26" <?php if($panel->getRendimiento()=="26")echo 'selected="selected"';?>>26%</option>
							<option value="27" <?php if($panel->getRendimiento()=="27")echo 'selected="selected"';?>>27%</option>
							<option value="28" <?php if($panel->getRendimiento()=="28")echo 'selected="selected"';?>>28%</option>
							<option value="29" <?php if($panel->getRendimiento()=="29")echo 'selected="selected"';?>>29%</option>
							<option value="30" <?php if($panel->getRendimiento()=="30")echo 'selected="selected"';?>>30%</option>
						</select>
					</div>
				</div>
	
				<div class="form-group">
					<label class="col-sm-2 control-label" for="nominal">Potencia Nominal(W)</label>
					<div class="col-sm-3">
						<input id="nominal" name="nominal" class="form-control " readonly="readonly"  value="<?php echo $panel->getNominal();?>"/>
					</div>
					<label class="col-sm-3 control-label" for="voltajeCorrienteAlterna">Voltaje Circuito Abierto(V)</label>
					<div class="col-sm-3">
						<input id="voltajeCorrienteAlterna" name="voltajeCorrienteAlterna" readonly="readonly" class="form-control" value="<?php echo $panel->getVCA();?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="altoPanel">* Alto</label>
					<div class="col-sm-3">
						<div class="input-group">
							<input id="altoPanel" name="altoPanel" class="form-control"  readonly="readonly" value="<?php echo $panel->getAlto();?>"/>
							<span class="input-group-addon">Mts.</span>
						</div>
					</div>
					<label class="col-sm-3 control-label" for="altoAncho">* Ancho</label>
					<div class="col-sm-3">
						<div class="input-group">
							<input id="altoAncho" name="altoAncho" class="form-control" readonly="readonly"  value="<?php echo $panel->getAncho();?>"/>
							<span class="input-group-addon">Mts.</span>
						</div>
					</div>
				</div>

			</div>	
	<?php
			break;
	} ?>

<?php
} else {
	header("location: index.php");
}
?>

<script src="<?php echo RUTA;?>js/jquery-1.11.3.js"></script>
	<script type="text/javascript" src="<?php echo RUTA;?>js/jquery.numeric.js"></script>
  	<script src="<?php echo RUTA;?>js/bootstrap.min.js"></script>
  	<script src="<?php echo RUTA;?>js/functions.js"></script>
	<script type="text/javascript">
		$(document).ready(function ( ) {
			$('.entero').numeric();
    		$('.decimal').numeric(","); 
		})
	</script>