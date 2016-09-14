<?php
	require_once ("../config.php");
	require_once ("../models/Producto.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo RUTA;?>css/normalize.css" rel="stylesheet">
	<link href="<?php echo RUTA;?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo RUTA;?>css/main.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-fixed-top navbar-inverse" id="menu">
     	<?php include("../_menu.php");?>
    </nav>

    <div class="clearfix" id="wrapper">
    	<div class="col-md-3 pull-right" id="option-wrapper">
    		<?php include("../menu-lateral-1.php"); ?>
		</div>
		<div class="col-md-9 pull-left" id="body-wrapper">
			<h3 id="tituloPag">Listado de Productos</h3>
			<a class="btn btn-default pull-right" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Búsqueda Avanzada</a>
			<div class="collapse" id="collapseExample">
				<form class="form-inline" id="ordenForm">
					<div class="form-group">
						<label for="ordenarPor">Ordenar por: </label>
						<select class="form-control input-sm" id="ordenarPor">
							<option>Seleccione</option>
							<option value="0">Código</option>
							<option value="1">Nombre</option>
							<option value="2">Cliente</option>
							<option value="3">Estado</option>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputName2">Tipo: </label>
						<select class="form-control input-sm" id="ordenarPor">
							<option>Seleccione</option>
							<option value="0">Ascendente</option>
							<option value="1">Descentente</option>
						</select>
					</div>
				</form>
			</div>
			<table class="table table-hover">
				<thead>
					<th>ID</th>
					<th>Nombre</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Precio Costo</th>
					<th>Tipo</th>
					<th></th>
				</thead>	
				<tbody>
<?php 
	$producto = new Producto ( null );
	$listado = $producto->getListado( );
	foreach ($listado as $row) { ?>
		<tr>
			<td class="idProducto"><?php echo $row->PROD_ID;?></td>
			<td class="nombre"><?php echo $row->PROD_NOMBRE;?></td>
			<td><?php echo $row->PROD_MARCA;?></td>
			<td><?php echo $row->PROD_MODELO;?></td>
			<td align="right">$ <?php echo $row->PROD_PRECIOCOSTO;?></td>
			<td class="subProducto"><?php echo $row->TIPO?><input name="id" value="<?php echo $row->SUB_ID;?>" class="hide"></td>
			<td>
				<button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-edit"></span> Editar</button>
				<form action="../controller/productoController.php" method="POST" style="display:inline;"><input name="accion" value="delete" class="hide"><input name="id" value="<?php echo $row->SUB_ID;?>" class="hide"><button class="btn btn-xs btn-danger" onclick="preguntaEliminacion( event )"><span class="glyphicon glyphicon-remove"></span>Eliminar</button></form>
			</td>
		</tr>
<?php
	}
?>	
				</tbody>
			</table>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Modal title</h4>
	      		</div>
	      		<form class="form-horizontal" method="POST" action="../controller/productoController.php">
		      		<div class="modal-body">
		        
		      		</div>
	      		</form>
	    	</div>
	 	</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="<?php echo RUTA;?>js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".btn-warning").click(
				function(event){
					var titulo = $(this).parent().parent().children("td.nombre").text();
					var idProducto = $(this).parent().parent().children("td.idProducto").text();
					var elemento = $(this).parent().parent().children("td.subProducto").text();
					var subId = $(this).parent().parent().children("td.subProducto").find("input").val();
						$.ajax({
							url: "modificarProducto.php",
							method: "POST",
							data: { "id" : subId , "tipo" : elemento},
							dataType: "html"
						}).done(
							function(html) {
								$("#myModalLabel").text("#" + idProducto + " - " +titulo);
								$(".modal-body").html( html );
							}
						);
				}	
				
			);
		
		});
	</script>
</body>
</html>