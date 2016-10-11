<?php
	require_once ("../config.php");
  	require_once ("../models/Proyecto.php");
  	require_once ("../models/Producto.php");
  	require_once ("../models/Artefacto.php");
  	require_once ("../models/Proy_tiene_prod.php");

  	$proyecto = new Proyecto ($_POST['id']);
  	$calculo = new Proy_tiene_prod (null);
  	$listadoCalculo = $calculo->getListado();
  	if($proyecto->getTipo()==0){?> <!-- En Red-->
		<div class="col-sm-offset-1 col-sm-10">
			<table class="table">
				<thead>
					<th>Cantidad</th>
					<th>Producto</th>
					<th>Marca</th>
					<th>Precio Compra</th>
					<th>Precio Venta</th>
				</thead>	
                <?php 
                    foreach ($listadoCalculo as $row) {?>
                    <tr>
                    	<td><?php echo $row->PTP_CANTIDAD; ?></td>
                    	<td><?php 
                    		$prod= new Producto ($row->PROD_ID);
                    		echo $prod->getNombre(); ?>
                    	</td>
                    	<td><?php 
                    		echo $prod->getMarca(); ?>
                    	</td>
						<td><?php echo $prod->getPrecioCompra(); ?></td>
                    	<td>
                    		<input type="int" class="entero" name="precioventa[]" value="<?php echo $row->PTP_COSTOVENTA?>" required="required">
              			</td>
						
					</tr>	
				<?php } ?>		
		</table>
		    <div>
		    	<input class="hide" name="accion" value="new">
		        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar y Generar Informe</button>
		    </div>
		</div>
<?php 
  	}
  	else{?>
  	<div class="col-sm-offset-1 col-sm-10">
			<table class="table">
				<thead>
					<th>Cantidad</th>
					<th>Producto</th>
					<th>Marca</th>
					<th>Precio Compra</th>
					<th>Precio Venta</th>
				</thead>	
                <?php 
                    foreach ($listadoCalculo as $row) {?>
                    <tr>
                    	<td><?php echo $row->PTP_CANTIDAD; ?></td>
                    	<td><?php 
                    		$prod= new Producto ($row->PROD_ID);
                    		echo $prod->getNombre(); ?>
                    	</td>
                    	<td><?php 
                    		echo $prod->getMarca(); ?>
                    	</td>
						<td><?php echo $prod->getPrecioCompra(); ?></td>
                    	<td>
                    		<input type="int" class="entero" name="precioventa[]" value="<?php echo $row->PTP_COSTOVENTA?>" required="required">
              			</td>
						
					</tr>	
				<?php } ?>		
		</table>
		    <div>
		    	<input class="hide" name="accion" value="new">
		        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar y Generar Informe</button>
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

		});
  </script>
	
