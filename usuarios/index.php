<?php
	require_once ("../config.php");
	require_once ("../models/Usuario.php");
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
			<h3 id="tituloPag"><span class="glyphicon glyphicon-lock" style="color:#d9534f"></span>  	Listado de Usuario</h3>
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
                <a href="../usuarios/nuevoUsuario.php" class="btn btn-danger btn-md" role="button"><span class="glyphicon glyphicon-plus"></span> Nuevo Usuario</a>
            </div>

			<div class="collapse" id="collapseExample">
				<form class="form-inline" id="ordenForm">
					<div class="form-group">
						<label for="ordenarPor">Ordenar por: </label>
						<select class="form-control input-sm" id="ordenarPor">
							<option>Seleccione</option>
							<option value="0">RUT</option>
							<option value="1">Nombre</option>
							<option value="2">Apellido</option>
							<option value="3">Usuario</option>
							<option value="4">Email</option>
							<option value="5">Clave</option>
							<option value="6">Tipo</option>
							<option value="7">Estado</option>
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
					<th>RUT</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Tipo</th>
					<th>Estado</th>
					<th></th>
				</thead>	
				<tbody>
<?php 
	$usuario = new Usuario( null );
	$lsUsuario = $usuario ->getListado();

	foreach ($lsUsuario as $row ) { ?>
	
					<tr>
						<td class="nombreProyecto"><?php echo $row->USU_RUT; ?></td>
						<td><?php echo $row->USU_NOMBRE; ?></td>
						<td><?php echo $row->USU_APELLIDO; ?></td>
						<td><?php echo $row->USU_TIPO; ?></td>
						<td><?php 	if($row->USU_ESTADO==1) echo "Activo"; 
									if($row->USU_ESTADO==0) echo "Inactivo"; 
										?>
						</td>	

						<td>
							<button class="btn btn-xs btn-info" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pushpin"></span> Ver</button>
							<button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-edit"></span> Editar</button>
							<form action="../controller/usuarioController.php" method="POST" style="display:inline;"><input name="accion" value="delete" class="hide"><input name="rut" value="<?php echo $row->USU_RUT;?>" class="hide"><button class="btn btn-xs btn-danger" onclick="preguntaEliminacion( event )"><span class="glyphicon glyphicon-remove"></span>Eliminar</button></form>
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
						url: "modificarUsuario.php",
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
						url: "verUsuario.php",
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