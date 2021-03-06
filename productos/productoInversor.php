
<div class="form-group">
	<label class="col-sm-2 control-label" for="tipoInversor">* Tipo de Inversor</label>
	<div class="col-sm-2">
		<select id="tipoInversor" name="tipoInversor" class="form-control" required="required">
			<option value="">Seleccione</option>
			<option value="tipoA">Aislado</option>
			<option value="tipoB">En Red</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="potenciaInversor">Potencia</label>
	<div class="col-sm-2">
		<input id="potenciaInversor" name="potenciaInversor" class="form-control entero" required="required" type="int" step="0.01" min="0" />
	</div>
	<label class="col-sm-2 control-label" for="voltajeEntrada">Voltaje Entrada</label>
	<div class="col-sm-2">
		<input id="voltajeEntrada" name="voltajeEntrada" class="form-control entero" required="required" type="int" min="0" />
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="corrienteEntrada">Corriente Entrada</label>
	<div class="col-sm-2">
		<input id="corrienteEntrada" name="corrienteEntrada" class="form-control entero" required="required" type="int" min="0" />
	</div>
	<label class="col-sm-2 control-label" for="rendimiento">Rendimiento</label>
	<div class="col-sm-2">
		<input id="rendimiento" name="rendimiento" class="form-control entero" required="required" type="int" min="0" />
	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
	<input type="text" name="tipoProducto" value="nuevoInversor" class="hide">
		<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk" ></span> Guardar</button>
	</div>
</div>
<script type="text/javascript">
		$(document).ready(function(){
    $('.entero').numeric();
    $('.decimal').numeric(","); 
	});
  </script>