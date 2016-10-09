<div class="form-group">
	<label class="col-sm-2 control-label" for="voltajeBateria">* Voltaje Batería</label>
	<div class="col-sm-2">
		<input id="voltajeBateria" name="voltajeBateria" class="form-control entero" required="required" type="int" min="0" />
	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
	<input type="text" name="tipoProducto" value="nuevaBateria" class="hide">
		<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk" ></span> Guardar</button>
	</div>
</div>
<script type="text/javascript">
		$(document).ready(function(){
    $('.entero').numeric();
    $('.decimal').numeric(","); 
	});
  </script>