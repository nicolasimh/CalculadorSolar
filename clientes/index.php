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
			<div class="col-sm-offset-10 col-sm-3">
                <a href="../clientes/nuevoCliente.php" class="btn btn-info btn-md" role="button"><span class="glyphicon glyphicon-plus"></span> Nuevo Cliente</a>
            </div>
			<div class="collapse" id="collapseExample">
				<form class="form-inline" id="ordenForm">
					<div class="form-group">
						<label for="ordenarPor">Ordenar por: </label>
						<select class="form-control input-sm" id="ordenarPor">
							<option>Seleccione</option>
							<option value="0">RUT</option>
							<option value="1">Nombre</option>
							<option value="2">Alias</option>
							<option value="3">Email</option>
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
						<td><?php echo $row->CL_RUT; ?></td>
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
		
		});
	</script>
</body>
</html>