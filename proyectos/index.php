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
			<ul class="nav nav-pills nav-stacked">
 				<li role="presentation" class="active"><a href="#">Listado de Proyectos</a></li>
 				<li role="presentation"><a href="#">Profile</a></li>
 				<li role="presentation"><a href="#">Messages</a></li> 
			</ul>
		</div>
		<div class="col-md-9 pull-left" id="body-wrapper">
			<h3 id="tituloPag">Listado de Proyectos</h3>
			<a href="Busqueda Avanzada"></a>
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
						<td>Proyecto 1</td>
						<td>Solsur</td>
						<td><label>Terminado</label></td>
						<td>
							<button class="btn btn-sm">editar</button>
							<button class="btn btn-sm">editar</button>
						</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Proyecto 2</td>
						<td>Mas energía S.A.</td>
						<td><label>En Curso</label></td>
						<td>
							<button class="btn btn-sm">editar</button>
							<button class="btn btn-sm">editar</button>
						</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Proyecto 3</td>
						<td>Clean Energy S.A.</td>
						<td><label>Eliminado</label></td>
						<td>
							<button class="btn btn-sm">editar</button>
							<button class="btn btn-sm">editar</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="<?php echo RUTA;?>js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			
		});
	</script>
</body>
</html>