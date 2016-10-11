<div class="form-group">
	<label class="col-sm-2 control-label" for="rendimiento">*Rendimiento</label>
	<div class="col-sm-2">
		<select id="rendimiento" name="rendimiento" required="required" class="form-control">
			<option value="">Seleccione</option>
			<option value="0">0</option>
			<option value="1">1%</option>
			<option value="2">2%</option>
			<option value="3">3%</option>
			<option value="4">4%</option>
			<option value="5">5%</option>
			<option value="6">6%</option>
			<option value="7">7%</option>
			<option value="8">8%</option>
			<option value="9">9%</option>
			<option value="10">10%</option>
			<option value="11">11%</option>
			<option value="12">12%</option>
			<option value="13">13%</option>
			<option value="14">14%</option>
			<option value="15">15%</option>
			<option value="16">16%</option>
			<option value="17">17%</option>
			<option value="18">18%</option>
			<option value="19">19%</option>
			<option value="20">20%</option>
			<option value="21">21%</option>
			<option value="22">22%</option>
			<option value="23">23%</option>
			<option value="24">24%</option>
			<option value="25">25%</option>
			<option value="26">26%</option>
			<option value="27">27%</option>
			<option value="28">28%</option>
			<option value="29">29%</option>
			<option value="30">30%</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="nominal">Potencia Nominal(W)</label>
	<div class="col-sm-2">
		<input id="nominal" name="nominal" class="form-control entero" required="required"/>
	</div>
	<label class="col-sm-2 control-label" for="voltajeCorrienteAlterna">Voltaje Circuito Abierto (V)</label>
	<div class="col-sm-2">
		<input id="voltajeCorrienteAlterna" name="voltajeCorrienteAlterna" class="form-control entero" type="int" required="required"/>
	</div>
</div>
	<input id="potenciaPanel" name="potenciaPanel" class="hide" value="0"/>
<div class="form-group">
	<label class="col-sm-2 control-label" for="altoPanel">* Alto</label>
	<div class="col-sm-2">
		<div class="input-group">
			<input id="altoPanel" name="altoPanel" class="form-control decimal" type="number" step="0.1" min="0"required="required" />
			<span class="input-group-addon">Mts.</span>
		</div>
	</div>
	<label class="col-sm-2 control-label" for="altoAncho">* Ancho</label>
	<div class="col-sm-2">
		<div class="input-group">
			<input id="altoAncho" name="altoAncho" class="form-control decimal" type="number" step="0.1" min="0" required="required"/>
			<span class="input-group-addon">Mts.</span>
		</div>
	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
	<input type="text" name="tipoProducto" value="nuevoPanel" class="hide">
		<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk" ></span> Guardar</button>
	</div>
</div>
<script type="text/javascript">
		$(document).ready(function(){
    $('.entero').numeric();
    $('.decimal').numeric(","); 
	});
  </script>