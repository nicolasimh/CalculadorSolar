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
  		<div class="col-sm-offset-2 col-sm-2"><h3 style="margin:0;">Consumo</h3></div>
  		<div class="col-sm-offset-1 col-sm-3">
                <a href="../artefactos/nuevoArtefacto.php" class="btn btn-info btn-sm" role="button"><span class="glyphicon glyphicon-plus"></span> Crear nuevo Artefacto</a>
        </div> 
  	</div>

	 <div class="table-responsive" >
	  		<table class="table" style="margin-left:170px; width:65%;">
				<thead>
					<th>Cantidad</th>
					<th>Artefactos</th>
					<th>Consumo kWh</th>
					<th>Horas Promedio diaria</th>
					<th></th>
				</thead>	
                <?php 
                    foreach ($listadoArtefactos as $row) {?>
                    <tr>
                    	<td>
              				<input style="width:40px;" type="text" class="entero" name="cantidad" required="required">
              			</td>
						<td><?php echo $row->ART_NOMBRE; ?></td>
						<td><?php echo $row->ART_CONSUMO; ?></td>
						<td >
              				<input style="width:40px" type="text" class="entero" name="horas" required="required">
              			</td>
					</tr>	
				<?php } ?>
		
		</table>
		
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
					<input style="width:25px;" type="text" class="entero" name="enero" required="required">
				</td>
				<td>
					<input style="width:25px;" type="text" class="entero" name="febrero" required="required">
				</td>
				<td>
					<input style="width:25px;" type="text" class="entero" name="marzo" required="required">
				</td>
				<td>
					<input style="width:25px;" type="text" class="entero" name="abril" required="required">
				</td>
				<td>
					<input style="width:25px;" type="text" class="entero" name="mayo" required="required">
				</td>
				<td>
					<input style="width:25px;" type="text" class="entero" name="junio" required="required">
				</td>
				<td>
					<input style="width:25px;" type="text" class="entero" name="julio" required="required">
				</td>
				<td>
					<input style="width:25px;" type="text" class="entero" name="agosto" required="required">
				</td>
				<td>
					<input style="width:25px;" type="text" class="entero" name="septiembre" required="required">
				</td>
				<td>
					<input style="width:25px;" type="text" class="entero" name="octubre" required="required">
				</td>
				<td>
					<input style="width:25px;" type="text" class="entero" name="noviembre" required="required">
				</td>
				<td>
					<input style="width:25px;" type="text" class="entero" name="diciembre" required="required">
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
    $('.entero').numeric();
    $('.decimal').numeric(","); 
	});
  </script>
	
