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
			<h3 id="tituloPag"><span class="glyphicon glyphicon-globe" style="color:#5bc0de"></span>  Listado de Proyectos</h3>
<?php 
			switch ($_GET["result"]) {
				case 'success':?>
			<div class="alert alert-success alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4>Exito!</h4>
				<p>La operación solicitada se ha realizado exitosamente</p>
			</div>
<?php				break;
				case 'error': ?>
			<div class="alert alert-danger alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4>Ups! Tenemos un problema</h4>
				<p>Los cambio solicitados no se han podido realizar. Favor reintente la operación, si el problema persiste contácte al proveedor del sistema.</p>
			</div>
<?php			break;
				case 'errorDelete'?>
			<div class="alert alert-danger alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4>Ups! El registro está ocupado</h4>
				<p>No hemos podido realizar la eliminación del registro, esto se debe a que se encuentra asociado a un proyecto.</p>
			</div>
<?php			
				break;
			}
?>			
			<div class="col-sm-offset-10 col-sm-3">
                <a href="../proyectos/nuevoProyecto.php" class="btn btn-info btn-md" role="button"><span class="glyphicon glyphicon-plus"></span> Nuevo Proyecto</a>
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
								switch ($row->PROY_ESTADO) {
									case 0:?>
										<a class="btn btn-xs btn-info" href="verProyecto.php?id=<?php echo $row->PROY_ID ?>"><span class="glyphicon glyphicon-pushpin"></span> Ver</a>
										<button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-edit"></span> Editar</button>
										<form method="post" action="../controller/proyectoController.php" style="display:inline"> 
											<input class="hide" name="id" value="<?php echo $row->PROY_ID ?>" />
											<input class="hide" name="event" value="del" />
											<button onclick="return confirm('¿Está seguro que desea descartar este proyecto?');" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span> Descartar</button>
										</form>
							<?php	
									break;
									case 1:?>
										<a class="btn btn-xs btn-success" href="verCalculo.php?id=<?php echo $row->PROY_ID ?>"><span class="glyphicon glyphicon-leaf"></span> Ver</a>
										<button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-edit"></span> Editar</button>
										<form method="post" action="../controller/proyectoController.php" style="display:inline"> 
											<input class="hide" name="id" value="<?php echo $row->PROY_ID ?>" />
											<input class="hide" name="event" value="del" />
											<button onclick="return confirm('¿Está seguro que desea descartar este proyecto?');" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span> Descartar</button>
										</form>
							<?php 	break;
									case 3: ?>
										<button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-edit"></span> Editar</button>
							<?php
									break;
								}

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
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY_GOOGLE_MAPS;?>"></script>
	<script src="<?php echo RUTA;?>js/jquery-1.11.3.js"></script>
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
			$('#myModal').on('hidden.bs.modal', function (e) {
				javascript:location.reload();
			})
		
		});
	</script>
</body>
</html>