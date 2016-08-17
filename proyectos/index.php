<?php
	require_once ("../config.php");
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
			<h3 id="tituloPag">Listado de Proyectos</h3>
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
					<th>Cod</th>
					<th>Nombre</th>
					<th>Cliente</th>
					<th>Estado</th>
					<th></th>
				</thead>	
				<tbody>
					<tr>
						<td>1</td>
						<td class="nombreProyecto">Proyecto 1</td>
						<td>Solsur</td>
						<td><span class="label label-success">Terminado</span></td>
						<td>
							<button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-edit"></span> Editar</button>
							<button class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span> Eliminar</button>
						</td>
					</tr>
					<tr>
						<td>2</td>
						<td class="nombreProyecto">Proyecto 2</td>
						<td>Mas energía S.A.</td>
						<td><span class="label label-primary">En Curso</span></td>
						<td>
							<button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-edit"></span> Editar</button>
							<button class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span> Eliminar</button>
						</td>
					</tr>
					<tr>
						<td>3</td>
						<td class="nombreProyecto">Proyecto 3</td>
						<td>Clean Energy S.A.</td>
						<td><span class="label label-danger">Eliminado</span></td>
						<td>
							<button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-edit"></span> Editar</button>
							<button class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span> Eliminar</button>
						</td>
					</tr>
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
	      		<form class="form-horizontal">
	      		<div class="modal-body">
	        
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        		<button type="button" class="btn btn-primary">Save changes</button>
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
					var elemento = $(this).parent().parent().children("td:first-child").text();
					var titulo = $(this).parent().parent().children("td.nombreProyecto").text();
					$.ajax({
						url: "modificar.php",
						method: "POST",
						data: { "id" : elemento },
						dataType: "html"
					}).done(
						function(html) {
							$("#myModalLabel").text(titulo);
							$(".modal-body").html( html );
						}
					)
				}
			);
		
		});
	</script>
</body>
</html>