<?php
  require_once ("../config.php");
  require_once ("../models/Proyecto.php");
  require_once ("../models/Cliente.php");
  require_once ("../models/Panel.php");
  //require_once ("../models/Inversor.php");
  //require_once ("../models/Mantenimiento.php");
  session_start();
  $proyecto = new Proyecto ($_SESSION["calculo"]["PROY_ID"]);
  $cliente = new Cliente ($proyecto->getRut());
  print_r($_SESSION);
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
		<div class="col-md-12 clearfix" id="body-wrapper">
			<div class="col-md-12 clearfix">
				<div class="col-md-5 pull-left">
					<h3 id="tituloPag">Informe Sistema Solar Fotovoltaico</h3>
					<h4>Datos del Proyecto</h4>
					<input class="hide" type="" id="latitud" name="latitud" value="<?php echo $proyecto->getLatitud()?>">
					<input class="hide" type="" id="longitud" name="latitud" value="<?php echo $proyecto->getLongitud()?>">
					<table id="datosProyecto">
						<tbody>
							<tr>
								<td style="width: 160px"><strong> Nombre del Proyecto</strong></td>
								<td><strong>:</strong></td>
								<td><?php echo $proyecto->getNombre();?></td>
							</tr>
							<tr>
								<td style="width: 10px"><strong>RUT Cliente</strong></td>
								<td><strong>:</strong></td>
								<td><?php echo $proyecto->getRut();?></td>
							</tr>
							<tr>
								<td><strong>Cliente</strong></td>
								<td><strong>:</strong></td>
								<td><?php echo $cliente->getRazonsocial();?></td>
							</tr>
							<tr>
								<td><strong>Ubicación</strong></td>
								<td><strong>:</strong></td>
								<td><?php echo $proyecto->getUbicacion();?></td>
							</tr>
							<tr>
								<td><strong>Inclinación</strong></td>
								<td><strong>:</strong></td>
								<td><?php echo $_SESSION["calculo"]["INCLINACION"];?></td>
							</tr>
												
							<?php 
								$productos = $proyecto->getProductos();
								foreach ($productos as $row) { 
									switch ($row->TIPO) {
										case 'Panel': 
											$panel = new Panel ( $row->PROD_ID );
										?>
										<tr>
											<td><strong>Panel</strong></td>
											<td><strong>:</strong></s></td>
											<td><?php echo $row->PTP_CANTIDAD.' Unidades de '.$row->PROD_NOMBRE.' ('.$panel->getAlto().'mts. x'.$panel->getAncho().'mts.)'; ?> </td>
										</tr>
								<?php 	break;
										case 'Inversor':?>
										<tr>
											<td><strong>Inversor</strong></td>
											<td>:<strong></strong></s></td>
											<td> <?php echo $row->PROD_NOMBRE." marca ".$row->PROD_MARCA;?></td>
										</tr>
								<?php	break;
										case 'Batería':?>
										<tr>
											<td><strong>Batería</strong></td>
											<td>:<strong></strong></s></td>
											<td> <?php echo $row->PROD_NOMBRE." marca ".$row->PROD_MARCA;?></td>
										</tr>
								<?php	break;
									}
								?>
							<?php }
							?>
						</tbody>
					</table>
				</div>
				<div id="map">
					
				</div>	
			</div>
			
			
			<div class="col-md-10">
			<br>
			<h4>Calculo</h4>
			<br>
				<table class="table table-striped" id="datosCalculo">
					<thead>
						<th></th>
						<th>Ene</th>
						<th>Feb</th>
						<th>Mar</th>
						<th>Abr</th>
						<th>May</th>
						<th>Jun</th>
						<th>Jul</th>
						<th>Ago</th>
						<th>Sep</th>
						<th>Oct</th>
						<th>Nov</th>
						<th>Dic</th>
					</thead>
					<body>
						<tr>
							<td><strong>Radiación</strong></td>
							<?php
							foreach ($_SESSION["calculo"]["RADIACION"] as $row) {?>
								<td align="right"><?php echo $row;?></td>
							<?php	
							}
							?>
						</tr>
						<tr>
							<td><strong>FactorK</strong></td>
							<?php
							foreach ($_SESSION["calculo"]["FACTORK"] as $row) {?>
								<td align="right"><?php echo $row;?></td>
							<?php	
							}
							?>
						</tr>
						<tr>
							<td><strong>Rad. Plano Inclin.</strong></td>
							<?php
							foreach ($_SESSION["calculo"]["RH"] as $row) {?>
								<td align="right"><strong><?php echo number_format($row, 2, '.', '');?></strong></td>
							<?php	
							}
							?>
						</tr>
						<tr>
							<td><strong>Área Paneles</strong></td>
							<?php
							for ($i = 0 ; $i < 12 ; $i++ ) {?>
							<td align="right"><?php echo $_SESSION["calculo"]["AREA"];?></td>
							<?php	
							}
							?>
						</tr>
						<tr>
							<td><strong>Rendimiento</strong></td>
							<?php
							for ($i = 0 ; $i < 12 ; $i++ ) {?>
							<td align="right"><?php echo $_SESSION["calculo"]["RENDIMIENTO"];?></td>
							<?php	
							}
							?>
						</tr>
						<tr>
							<td><strong>Mantención</strong></td>
							<?php
							for ($i = 0 ; $i < 12 ; $i++ ) {?>
							<td align="right"><?php echo $_SESSION["calculo"]["MANTENCION"];?></td>
							<?php	
							}
							?>
						</tr>
						<tr>
							<td><strong>Prod. Prom. Mensual</strong></td>
							<?php
							foreach ($_SESSION["calculo"]["PPM"] as $row) {?>
								<td align="right"><strong><?php echo number_format($row, 2, '.', '');?></strong></td>
							<?php	
							}
							?>
						</tr>
						<tr>
							<td><strong>Σ Promedio Anual</strong></td>
							<td colspan="12"><strong><?php echo $_SESSION["calculo"]["PPA"];?></strong></td>
						</tr>
					</body>
				</table>
				<div id="grafResultado">
					
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo RUTA;?>js/jquery-1.11.3.js"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY_GOOGLE_MAPS;?>&callback=initialize"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="<?php echo RUTA;?>js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo RUTA?>js/functions.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
	    	google.charts.load('current', {'packages':['corechart']});
      		google.charts.setOnLoadCallback(drawVisualization);
		});

		function drawVisualization() {
			var data = google.visualization.arrayToDataTable([
				['Month', 'Producción'<?php 
				if ( count($_SESSION["calculo"]["CONSUMO"]) > 0 ) {
					echo ",'Consumo'";
				}
				echo '],';

				for ( $i=0 ; $i < count($_SESSION["calculo"]["PPM"]) ; $i++) {
					echo "[";
					switch ($i) {
						case 0:echo "'Ene',";break;
						case 1:echo "'Feb',";break;
						case 2:echo "'Mar',";break;
						case 3:echo "'Abr',";break;
						case 4:echo "'May',";break;
						case 5:echo "'Jun',";break;
						case 6:echo "'Jul',";break;
						case 7:echo "'Ago',";break;
						case 8:echo "'Sep',";break;
						case 9:echo "'Oct',";break;
						case 10:echo "'Nov',";break;
						case 11:echo "'Dic',";break;
					}
					echo number_format($_SESSION["calculo"]["PPM"][$i], 2, '.', '').",";
					if ( count($_SESSION["calculo"]["CONSUMO"]) > 0 ) {
						echo number_format($_SESSION["calculo"]["CONSUMO"][$i], 2 , '.', '').",";
					}
					echo "],";
				}?>
				]);

    		var options = {
      			title : 'Producción Promedio Mensual',
      			vAxis: {title: 'Kw'},
      			hAxis: {title: 'Mes'},
      			seriesType: 'bars',
      			series: {1: {type: 'line'}}
    		};

    		var chart = new google.visualization.ComboChart(document.getElementById('grafResultado'));
    		chart.draw(data, options);
  		}
  		
  		function initialize(  ) {
  			var latitud = $("#latitud").val();
  			var longitud = $("#longitud").val();
		  	var latlon = new google.maps.LatLng( latitud , longitud );
		  	var myOptions = {
		                zoom: 15,
		                center: latlon
		            };
		    map = new google.maps.Map(document.getElementById('map'), myOptions);

		    coorMarcador = new google.maps.LatLng(latitud,longitud); 
		                
		    var marcador = new google.maps.Marker({
		        draggable: false,
		                position: coorMarcador, 
		                animation: google.maps.Animation.DROP,
		                map: map, 
		                title: "Fijar Posición del proyecto" 
		            });
		}
  </script>
<?php 
$_SESSION["calculo"] = null;
?>
</body>
</html>