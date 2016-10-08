<?php
	require_once ("../config.php");
  require_once ("../models/Proyecto.php");
  require_once ("../models/Panel.php");
  require_once ("../models/Inversor.php");
  
  $proyecto = new Proyecto (null);
  $listaProyecto = $proyecto->getListado();
  $prodpanel = new Panel (null);
  $listaPanel = $prodpanel->getListadoPanel();
  $prodinversor = new Inversor (null);
  $listaInversor = $prodinversor->getListadoInversor();
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
		<div class="col-md-9 pull-left" id="body-wrapper">
			<h3 id="tituloPag">Calcular Sistema Fotovoltaico</h3>
			<form class="form-horizontal" action="../controller/calcularController.php" method="post">
  				<div class="form-group">
    				<label for="proyecto" class="col-sm-2 control-label">Proyecto</label>
    					<div class="col-sm-4">
							<select class="form-control" name="proyecto" id="proyecto" required="required">
                    <option value="">Seleccione un Proyecto</option>
                    <?php 
                        foreach ($listaProyecto as $row) {
                          if($row->PROY_TIPOCALCULO=="0")
                            $tipo="Sistema en Red";
                          else
                            $tipo="Sistema Aislado";                         
                          
                          echo '<option value="'.$row->PROY_ID.'">'.$row->PROY_NOMBRE.' - '.$tipo.'</option>';
                        }?>
              </select>
    				</div>
             <input class="hide" id="tipoproyecto" value="">
            <div class="col-sm-offset-1 col-sm-3">
                <a href="../proyectos/nuevoProyecto.php" class="btn btn-info btn-sm" role="button"><span class="glyphicon glyphicon-plus"></span> Crear nuevo Proyecto</a>
            </div>
  				</div>
  				<div class="form-group">
    				<label for="inclinacion" class="col-sm-2 control-label">Inclinación</label>º Grados
    					<div class="col-sm-1">
							   <select  class="form-control" name="inclinacion" required="required"> 
                    <option value="">Seleccione</option>
                    <option value="0">0</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="30">30</option>
                    <option value="35">35</option>
                    <option value="40">40</option>
                    <option value="45">45</option>
                    <option value="50">50</option>
                    <option value="55">55</option>
                    <option value="60">60</option>
                    <option value="65">65</option>
                    <option value="70">70</option>
                    <option value="75">75</option>
                    <option value="80">80</option>
                    <option value="85">85</option>
                    <option value="90">90</option>
                 </select>
              </div>
  				</div>
         <div class="form-group">
            <label for="paneles" class="col-sm-2 control-label">Panel</label>
              <div class="col-sm-3">
              <select class="form-control" name="panel" required="required">
                    <option value="">Seleccione un Panel</option>
                    <?php 
                        foreach ($listaPanel as $row) {
                          echo '<option value="'.$row->PROD_ID.'">'.$row->PROD_NOMBRE.'  ('.$row->PAN_ALTO.'mts. x'.$row->PAN_ANCHO.'mts. )'.'</option>';
                        }?>
              </select>
            </div>
            <label for="npaneles" class="col-sm-2 control-label">Nº Paneles</label>
              <div class="col-sm-1">
              <input type="text" class="form-control entero" name="npanel" required="required">
              </div>
          </div>

          <div class="form-group">
            <label for="inversor" class="col-sm-2 control-label">Inversor</label>
              <div class="col-sm-3">
              <select class="form-control" name="inversor" required="required">
                    <option value="" >Seleccione un Inversor</option>
                    <?php 
                        foreach ($listaInversor as $row) {
                          echo '<option value="'.$row->PROD_ID.'">'.$row->PROD_NOMBRE.' (Rendimiento '.$row->INV_RENDIMIENTO.'% )'.'</option>';
                        }?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="mantenimiento" class="col-sm-2 control-label">Factor de Mantenimiento</label>
              <div class="col-sm-10" name="mantenimiento" >
                  <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1" required="required"> Alto
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0.95" required="required"> Medio
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="0.9" required="required"> Bajo
                    </label>
              </div>
          </div>

        <div id="formTipo">
        </div>
  				
			</form>
		</div>
	</div>

	<script src="<?php echo RUTA;?>js/jquery-1.11.3.js"></script>
	<script type="text/javascript" src="<?php echo RUTA;?>js/jquery.numeric.js"></script>
  <script src="<?php echo RUTA;?>js/bootstrap.min.js"></script>
  <script src="<?php echo RUTA;?>js/functions.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
    $('.entero').numeric();
    $('.decimal').numeric(","); 
    $('#proyecto').change(function(){
      var texto = $('#proyecto').val();
      $.ajax({
              url: "tipoProyecto.php",
              method: "POST",
              data: { "id" : texto },
              dataType: "html"
            }).done(
              function(html) {
                $("#formTipo").html( html );
              }
            );
    })
     

		});

  
  </script>

</body>
</html>