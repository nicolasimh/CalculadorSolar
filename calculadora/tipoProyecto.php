<?php
	require_once ("../config.php");
  	require_once ("../models/Proyecto.php");
  	require_once ("../models/Artefacto.php");

  	$proyecto = new Proyecto ($_POST['id']);
  	$artefactos = new Artefacto (null);
  	$listadoArtefactos = $artefactos->getListado();

  	if($proyecto->getTipo()==0){?>
		<div class="form-group">
		    <div>
		    	<input class="hide" name="accion" value="new">
		        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar y Generar Informe</button>
		    </div>
		</div>
<?php 
  	}
  	else{?>
	  	<div>
	  		<table class="table">
				<thead>
					<th >Cantidad</th>
					<th>Artefactos</th>
					<th>Consumo (Kw)</th>
					<th>Horas Promedio</th>
					<th></th>
				</thead>	
                <?php 
                    foreach ($listadoArtefactos as $row) {?>
                    <tr>
                    	<td >
              				<input style="width:35px" type="int" id="cantidad" name="cantidad" required="required">
              			</td>
						<td><?php echo $row->ART_NOMBRE; ?></td>
						<td><?php echo $row->ART_CONSUMO; ?></td>
						<td >
              				<input style="width:35px" type="int" id="horas" name="horas" required="required">
              			</td>
					</tr>	
					<?php } ?>
		</div>


  		<div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		    	<input class="hide" name="accion" value="new">
		        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar y Generar Informe</button>
		    </div>
		</div>
  	<?php } ?>

