<?php
	require_once ("../config.php");
	require_once("../models/Proyecto.php");
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
			<?php include("../menu-lateral-2.php"); ?>
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
					<th>Tipo</th>
					<th></th>
				</thead>	
				<tbody>
<?php 
	$proyecto = new Proyecto ( null );
	$listado = $proyecto->getListado( );
	foreach ($listado as $row) { ?>
					<tr>
						<td><?php echo $row->PROY_ID ?></td>
						<td class="nombreProyecto"><?php echo $row->PROY_NOMBRE?></td>
						<td><?php echo $row->CL_RAZONSOCIAL?></td>
						<td><?php
							switch ($row->PROY_ESTADO) {
							 	case 0:?>
							 		<span class="label label-info">Creado</span>
							 	<?php break;
							 	case 1:?>
							 		<span class="label label-warning">Calculado</span>
							 	<?php break;
							 	case 2:?>
							 		<span class="label label-success">Terminado</span>
							 	<?php break;
							 	case 3:?>
							 		<span class="label label-danger">Descartado</span>
							 	<?php break;
							 } 
							?>
						</td>
						<td><?php
							if ( $row->PROY_TIPOCALCULO == 0 ) {?>
								EN RED
							<?php 
							} else { ?>
								AISLADO
							<?php 
							}
							?>	
						</td>
						<td>
							<?php 
								if ( $row->PROY_ESTADO != 3 ) {?>
									<a class="btn btn-xs btn-info" href="verProyecto.php?id=<?php echo $row->PROY_ID ?>"><span class="glyphicon glyphicon-pushpin"></span> Ver</a>
							<?php	}
							?>
							
							<button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-edit"></span> Editar</button>
							<?php 
								if ( $row->PROY_ESTADO != 3 ) {?>
									<form method="post" action="../controller/proyectoController.php" style="display:inline"> 
										<input class="hide" name="id" value="<?php echo $row->PROY_ID ?>" />
										<input class="hide" name="event" value="del" />
										<button onclick="return confirm('¿Está seguro que desea descartar este proyecto?');" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span> Descartar</button>
									</form>
							<?php	}
							?>
						</td>
					</tr>
<?php	}?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div id="modalModificarProyecto" class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"></h4>
	      		</div>
	      		<form class="form-horizontal" action="../controller/proyectoController.php" method="post">
	      		<div class="modal-body">
					
	      		</div> 
	      		</form>
	    	</div>
	 	</div>
	</div>

	<script src="<?php echo RUTA;?>js/jquery-1.11.3.js"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY_GOOGLE_MAPS;?>"></script>
	<script src="<?php echo RUTA;?>js/bootstrap.min.js"></script>
	<script src="<?php echo RUTA?>js/functions.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$(".btn-warning").click(
				function(event){
					$(".modal-body").html("");
					var elemento = $(this).parent().parent().children("td:first-child").text();
					var titulo = $(this).parent().parent().children("td.nombreProyecto").text();
					$.ajax({
						url: "modificarProyecto.php",
						method: "POST",
						data: { "id" : elemento },
						dataType: "html"
					}).done(
						function(html) {
							$("#myModalLabel").text(titulo);
							$(".modal-body").html( html );
						}
					);

				}
			);
		
		});
	</script>
</body>
</html>