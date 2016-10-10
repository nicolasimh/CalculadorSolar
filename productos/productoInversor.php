
<div class="form-group">
	<label class="col-sm-2 control-label" for="tipoInversor">* Tipo de Inversor</label>
	<div class="col-sm-2">
		<select id="tipoInversor" name="tipoInversor" class="form-control" required="required">
			<option value="">Seleccione</option>
			<option value="Aislado">Aislado</option>
			<option value="En Red">En Red</option>
		</select>
	</div>
		<label class="col-sm-2 control-label" for="rendimiento">* Rendimiento</label>
		<div class="col-sm-2">
		<select id="rendimiento" name="rendimiento" required="required" class="form-control">
			<option value="">Seleccione</option>
			<option value="0.9">90%</option>
			<option value="0.91">91%</option>
			<option value="0.92">92%</option>
			<option value="0.93">93%</option>
			<option value="0.94">94%</option>
			<option value="0.95">95%</option>
			<option value="0.96">96%</option>
			<option value="0.97">97%</option>
			<option value="0.98">98%</option>
			<option value="0.99">99%</option>
			<option value="1">100%</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="potenciaInversor">* Potencia (W)</label>
	<div class="col-sm-2">
		<input id="potenciaInversor" name="potenciaInversor" class="form-control entero" required="required" type="int" step="0.01" min="0" />
	</div>
	<label class="col-sm-2 control-label" for="voltajeEntrada">* Voltaje Entrada (V)</label>
	<div class="col-sm-2">
		<select id="voltajeEntrada" name="voltajeEntrada" class="form-control" required="required">
			<option value="">Seleccione</option>
			<option value="12">12V</option>
			<option value="24">24V</option>
			<option value="48">48V</option>
			<option value="72">72V</option>
		</select>
	</div>
</div>
<div class="form-group">
		<input id="corrienteEntrada" name="corrienteEntrada" class="hide" value="01" type="int"/>
	
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