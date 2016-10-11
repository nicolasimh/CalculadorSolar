<?php
require_once("../config.php");
require_once("../models/Proyecto.php");
require_once("../models/Producto.php");
require_once("../models/Bateria.php");
require_once("../models/Inversor.php");
require_once("../models/Panel.php");
require_once("../models/FactorK.php");
require_once("../models/Mantenimiento.php");
require_once("../models/ValoresK.php");
require_once("../models/ValoresRad.php");

$proyecto = new Proyecto ($_POST['proyecto']);
$panel = new Panel ($_POST['panel']);
$inversor = new Inversor ($_POST['inversor']);
$mantenimiento = new Mantenimiento (($_POST['mantenimiento']));
session_start();

if (!empty($_POST['accion'])){
	/**** Consumimos web Services para obtener el factor de Radiación Horizontal ****/
	$radiacion = $proyecto->clientWebServices();
	
	if ( $radiacion != null ) {
		/**** Obtenemos Factor K según latitud, longitud e inclinación ****/
		$inclinacion = $_POST['inclinacion'];

		if ($proyecto->getLongitud()<0){
			$longitud = ' S';
		}
		if ($proyecto->getLatitud()<0){
			$latitud = (int) ($proyecto->getLatitud()*-1);
			if($latitud%2 != 0){
				$latitud= $latitud +1;
			}
		}

		$factorK = new FactorK ($latitud.$longitud,$inclinacion);

		/**** Asociamos la cabecera del factorK al proyecto ****/
		if ( $proyecto->asociarFactorK( $factorK->getId()) ) {
			$valoresK = $factorK->getValoresK ( );
			for ($i=0; $i < count($valoresK); $i++) {
				$_SESSION["calculo"]["FACTORK"][$i] = $valoresK[$i]->VALK_VALOR;
				$RH[$i]= $valoresK[$i]->VALK_VALOR*$radiacion[$i];
			}
			

			/**** Asociamos la cantidad de paneles al proyecto ****/
			if ( $proyecto->asociarProducto($panel->getId() , $panel->getPrecioVenta() , $_POST['npanel']) ) {
				$area= $panel->getAlto()*$panel->getAncho()*$_POST['npanel'];
				

				/**** Asociamos el Inversor al Proyecto ****/
				if ( $proyecto->asociarProducto($inversor->getId() , $inversor->getPrecioVenta() , 1 ) ) {
					$rend= $inversor->getRendimiento();
					
					if ( $proyecto->asociarFactorMantenimiento( $mantenimiento->getId() ))
					$mant = $mantenimiento->getValor();
					$_SESSION["calculo"]["MANTENCION"] = $mant;
					for ($i=0; $i < count($RH); $i++) {
						$PPM[$i]= $RH[$i]*$area*$rend*$mant;
						$PPA= $PPA + $PPM[$i];
					}

					$_SESSION["calculo"]["PROY_ID"] = $_POST["proyecto"];
					$_SESSION["calculo"]["RADIACION"] = $radiacion;
					$_SESSION["calculo"]["INCLINACION"] = $inclinacion;
					$_SESSION["calculo"]["AREA"] = $area;
					$_SESSION["calculo"]["RH"] = $RH;
					$_SESSION["calculo"]["RENDIMIENTO"] = $rend;
					$_SESSION["calculo"]["PPM"] = $PPM;
					$_SESSION["calculo"]["PPA"] = $PPA;

					if ( $proyecto->getTipo( ) == 0 ) {
						/***** guardar calculo en red ****/
						/**
							RH = Radiación Horizontal
							PPM = Producción Promerio Mensual
							PPA = Producción Promedio Anual
						*/
						$proyecto->CalculoRealizado();
						header("location: ../calculadora/verCalculo.php");
					} else {
						/***** continuar calculo aislado ****/

						for ($i=0; $i < count($_POST['cantidad']); $i++) { 
							$consumo[$i]= $_POST['cantidad'][$i] * $_POST['horas'][$i];
							$totaldia= $totaldia + $consumo[$i];
							echo "<br>total día ".$i." = ".$_POST['cantidad'][$i]." * ".$_POST['horas'][$i]." = ".$totaldia;
						}
						echo "<br><br>";
						$totalmes=($totaldia*30);
						for ($i=0; $i < 12; $i++) {
							$corregido[$i]=$totalmes*$_POST['factor'][$i];
							$consumoanual= $consumoanual+$corregido[$i];
							echo "<br>total día ".$i." = ".$totalmes." * ".$_POST['factor'][$i]." = ".$corregido[$i];
						}

						$_SESSION["calculo"]["CONSUMO"]=$corregido;

						if ( $proyecto->asociarConsumoArtefacto( $_POST["artefacto"] , $_POST["cantidad"] , $_POST["horas"] , $_POST['factor'] ) ){
							$proyecto->CalculoRealizado();
							header("location: ../calculadora/verCalculo.php");
						} else {
							echo 'No se pudieron asociar consumo de artefacto';
						}	
					}

				} else {
					echo '<br>no se pueden asociar Inversor';
				}
				
			} else {
				echo '<br>no se pueden asociar paneles';
			}
			
		} else {
			echo '<br>no pude actualizar factor K';
		}
	} else {

	}

}
else{
	header( 'location: ../calculadora/nuevoCalculo.php');
}


?>