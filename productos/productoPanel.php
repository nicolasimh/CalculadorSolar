<div class="form-group">
	<label class="col-sm-2 control-label" for="potenciaPanel">Portencia Panel</label>
	<div class="col-sm-5">
		<input id="potenciaPanel" name="potenciaPanel" class="form-control" required="required" type="number" step="0.01" min="0" />
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="voltajeCorrienteAlterna">Voltaje Corriente Alterna</label>
	<div class="col-sm-5">
		<input id="voltajeCorrienteAlterna" name="voltajeCorrienteAlterna" class="form-control" type="number" step="0.01" min="0" />
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="nominal">Potencia Nominal</label>
	<div class="col-sm-5">
		<input id="nominal" name="nominal" class="form-control" type="number" step="0.01" min="0" />
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="rendimiento">Rendimiento</label>
	<div class="col-sm-5">
		<input id="rendimiento" name="rendimiento" class="form-control" type="number" step="0.01" min="0" />
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="altoPanel">Alto del Panel</label>
	<div class="col-sm-5">
		<div class="input-group">
			<input id="altoPanel" name="altoPanel" class="form-control" type="number" step="0.01" min="0" />
			<span class="input-group-addon">Mts.</span>
		</div>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="altoAncho">Alto del Ancho</label>
	<div class="col-sm-5">
		<div class="input-group">
			<input id="altoAncho" name="altoAncho" class="form-control" type="number" step="0.01" min="0" />
			<span class="input-group-addon">Mts.</span>
		</div>
	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
	<input type="text" name="event" value="nuevoPanel" class="hide">
		<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk" ></span> Guardar</button>
	</div>
</div>