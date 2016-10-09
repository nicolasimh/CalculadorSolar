<div class="form-group">
	<label class="col-sm-2 control-label" for="potenciaPanel">*Potencia Panel</label>
	<div class="col-sm-2">
		<input id="potenciaPanel" name="potenciaPanel" class="form-control entero" required="required" type="int" step="0.01" min="0" />
	</div>
	<label class="col-sm-2 control-label" for="voltajeCorrienteAlterna">*Voltaje Corriente Alterna</label>
	<div class="col-sm-2">
		<input id="voltajeCorrienteAlterna" name="voltajeCorrienteAlterna" class="form-control entero" type="int" step="0.01" min="0" required="required"/>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="nominal">*Potencia Nominal</label>
	<div class="col-sm-2">
		<input id="nominal" name="nominal" class="form-control entero" type="float" step="0.01" min="0" required="required"/>
	</div>
	<label class="col-sm-2 control-label" for="rendimiento">*Rendimiento</label>
	<div class="col-sm-2">
		<input id="rendimiento" name="rendimiento" class="form-control entero" type="int" step="0.01" min="0" required="required"/>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="altoPanel">* Alto</label>
	<div class="col-sm-2">
		<div class="input-group">
			<input id="altoPanel" name="altoPanel" class="form-control decimal" type="float" step="0.01" min="0" required="required" />
			<span class="input-group-addon">Mts.</span>
		</div>
	</div>
	<label class="col-sm-2 control-label" for="altoAncho">* Ancho</label>
	<div class="col-sm-2">
		<div class="input-group">
			<input id="altoAncho" name="altoAncho" class="form-control decimal" type="float" min="0" required="required"/>
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