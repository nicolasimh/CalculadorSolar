<?php
	require_once ("../config.php");
  	require_once ("../models/Proyecto.php");
  	require_once ("../models/Artefacto.php");

  	$proyecto = new Proyecto ($_POST['id']);
  	$artefactos = new Artefacto (null);
  	$listadoArtefactos = $artefactos->getListado();

  	if($proyecto->getTipo()==0){?>
		<div class="col-sm-offset-4 col-sm-6">
		    <div>
		    	<input class="hide" name="accion" value="new">
		        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar y Generar Informe</button>
		    </div>
		</div>
<?php 
  	}
  	else{?>

  	<BR>
  	<div class="form-group">
  		<div class="col-sm-offset-2 col-sm-4"><h3 style="margin:0;">Consumo Promedio Diario</h3></div>
  		<div class="col-sm-offset-1 col-sm-3">
                <a href="../artefactos/nuevoArtefacto.php?action=new" class="btn btn-info btn-sm" role="button"><span class="glyphicon glyphicon-plus"></span> Crear nuevo Artefacto</a>
        </div> 
  	</div>

	 <div class="table-responsive" >
	  		<table class="table" style="margin-left:170px; width:65%;">
				<thead>
					<th>Cantidad</th>
					<th>Artefactos</th>
					<th>Consumo kWh</th>
					<th>Horas Promedio diaria</th>
				</thead>	
                <?php 
                    foreach ($listadoArtefactos as $row) {?>
                    <tr>
                    	<td>
              				<input style="width:40px;" type="text" class="entero cantidad" name="cantidad[]" value="0" required="required">
              			</td>
						<td><?php echo $row->ART_NOMBRE; ?></td>
						<td><?php echo $row->ART_CONSUMO; ?></td>
						<td >
              				<input style="width:40px" type="text" class="entero horas" name="horas[]" value="0" required="required">
              			</td>
					</tr>	
				<?php } ?>
		
		</table>
		<div class="col-sm-offset-2 col-sm-5"><h3>Factor de Correccion Consumo</h3></div>
		<table class="table" style="margin-left:170px; width:65%;">
			<thead>
				<th>Mes</th>
				<th>En</th>
				<th>Fb</th>
				<th>Mr</th>
				<th>Ab</th>
				<th>My</th>
				<th>Jn</th>
				<th>Jl</th>
				<th>Ag</th>
				<th>Sp</th>
				<th>Oc</th>
				<th>Nv</th>
				<th>Dc</th>
			</thead>
			<tr>
				<td> Factor</td>
				<td>
					<input style="width:35px;" type="text" class="decimal" name="factor[]" required="required">
				</td>
				<td>
					<input style="width:35px;" type="text" class="decimal" name="factor[]" required="required">
				</td>
				<td>
					<input style="width:35px;" type="text" class="decimal" name="factor[]" required="required">
				</td>
				<td>
					<input style="width:35px;" type="text" class="decimal" name="factor[]" required="required">
				</td>
				<td>
					<input style="width:35px;" type="text" class="decimal" name="factor[]" required="required">
				</td>
				<td>
					<input style="width:35px;" type="text" class="decimal" name="factor[]" required="required">
				</td>
				<td>
					<input style="width:35px;" type="text" class="decimal" name="factor[]" required="required">
				</td>
				<td>
					<input style="width:35px;" type="text" class="decimal" name="factor[]" required="required">
				</td>
				<td>
					<input style="width:35px;" type="text" class="decimal" name="factor[]" required="required">
				</td>
				<td>
					<input style="width:35px;" type="text" class="decimal" name="factor[]" required="required">
				</td>
				<td>
					<input style="width:35px;" type="text" class="decimal" name="factor[]" required="required">
				</td>
				<td>
					<input style="width:35px;" type="text" class="decimal" name="factor[]" required="required">
				</td>
			</tr>
		</table><br><br>

  		<div class="form-group">
		    <div class="col-sm-offset-4 col-sm-6">
		    	<input class="hide" name="accion" value="new">
		        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar y Generar Informe Aislado</button>
		    </div>
		</div>
	</div>	
  	<?php } ?>

	<script type="text/javascript">
		$(document).ready(function(){
			var horas;
			var cantidad;
			var count = 0;
    		$('.entero').numeric();
    		$('.decimal').numeric(","); 

    		/*
    		$('.cantidad').change(function(){
    			count = 0;
    			$(this).parent().parent().children("td").each(function (){
    				switch (count) {
    					case 0:
    						cantidad = $(this).find("input").val();
    						break;
    					case 3:
    						break;
    					case 4
    						break;
    				}
    				count ++;
    				
    			});
    			//$(this).parent().find("td:eq(0)").find("input").val("123");
    			
    		});*/
		});
  </script>
	
