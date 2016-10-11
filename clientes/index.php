<?php
	require_once ("../config.php");
	require_once ("../models/Cliente.php");
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
			<h3 id="tituloPag"><span class="glyphicon glyphicon-user" style="color:#5bc0de"></span>  Listado de Clientes</h3>
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
				case 'old'?>
			<div class="alert alert-warning alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4>Ups! Ya tenemos este registro</h4>
				<p>No hemos ingresado el registro solicitado debido a que ya se enceuntra en la base de datos. Verifique el estado en que este se encuentra</p>
			</div>
<?php			
				break;				
			}
?>	          
			<div class="col-sm-offset-10 col-sm-3">
                <a href="../clientes/nuevoCliente.php" class="btn btn-info btn-md" role="button"><span class="glyphicon glyphicon-plus"></span> Nuevo Cliente</a>
            </div>  
			<table class="table table-hover">
				<thead>
					<th>RUT</th>
					<th>Nombre</th>
					<th>Alias</th>
					<th>Email</th>
					<th></th>
				</thead>	
				<tbody>
<?php 
	$cliente = new Cliente( null );
	$lsCliente = $cliente ->getListado();

	foreach ($lsCliente as $row ) { ?>
	
					<tr>
						<td class="nombreProyecto"><?php echo $row->CL_RUT; ?></td>
						<td><?php echo $row->CL_RAZONSOCIAL; ?></td>
						<td><?php echo $row->CL_NOMBREFANTASIA; ?></td>
						<td><?php echo $row->CL_EMAIL; ?></td>
						<td>
							<button class="btn btn-xs btn-info" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pushpin"></span> Ver</button>
							<button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-edit"></span> Editar</button>
							<form action="../controller/clienteController.php" method="POST" style="display:inline;"><input name="accion" value="delete" class="hide"><input name="rut" value="<?php echo $row->CL_RUT;?>" class="hide"><button class="btn btn-xs btn-danger" onclick="preguntaEliminacion( event )"><span class="glyphicon glyphicon-remove"></span>Eliminar</button></form>
							
						</td>
					</tr>	
<?php } ?>
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
	      		<div class="modal-body">
	        
	      		</div>
	    	</div>
	 	</div>
	</div>

	<script src="<?php echo RUTA;?>js/jquery-1.11.3.js"></script>
	<script src="<?php echo RUTA;?>js/bootstrap.min.js"></script>
	<script src="<?php echo RUTA;?>js/functions.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".btn-warning").click(
				function(event){
					var elemento = $(this).parent().parent().children("td:first-child").text();
					var titulo = $(this).parent().parent().children("td.nombreProyecto").text();
					$.ajax({
						url: "modificarCliente.php",
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

				$(".btn-info").click(
				function(){
					var elemento = $(this).parent().parent().children("td:first-child").text();
					var titulo = $(this).parent().parent().children("td.nombreProyecto").text();
					$.ajax({
						url: "verCliente.php",
						method: "POST",
						data: { "id" : elemento},
						dataType: "html"
					}).done(
						function(html){
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