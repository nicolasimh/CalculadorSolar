
<div class="form-group">
	<label class="col-sm-2 control-label" for="tipoInversor">Tipo de Inversor</label>
	<div class="col-sm-5">
		<select id="tipoInversor" name="tipoInversor" class="form-control" required="required">
			<option value="tipoA">Tipo A</option>
			<option value="tipoB">Tipo B</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="potenciaInversor">Potencia</label>
	<div class="col-sm-5">
		<input id="potenciaInversor" name="potenciaInversor" class="form-control" required="required" type="number" step="0.01" min="0" />
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="voltajeEntrada">Voltaje Entrada</label>
	<div class="col-sm-5">
		<input id="voltajeEntrada" name="voltajeEntrada" class="form-control" required="required" type="number" step="0.01" min="0" />
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="corrienteEntrada">Corriente Entrada</label>
	<div class="col-sm-5">
		<input id="corrienteEntrada" name="corrienteEntrada" class="form-control" required="required" type="number" step="0.01" min="0" />
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="rendimiento">Rendimiento</label>
	<div class="col-sm-5">
		<input id="rendimiento" name="rendimiento" class="form-control" required="required" type="number" step="0.01" min="0" />
	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
	<input type="text" name="event" value="nuevoInversor" class="hide">
		<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk" ></span> Guardar</button>
	</div>
</div>