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
$rend = new Inversor ($_POST['inversor']);
print_r($_POST);

if (!empty($_POST['accion'])){
	$radiacion = array(1,1,1,2,2,2,3,3,3,4,4,4);
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
	$factorK = new FactorK ($latitud.$longitud, $inclinacion);
	$valoresK = $factorK->getValoresK ( );
	for ($i=0; $i < count($valoresK); $i++) {
		$RH[$i]= $valoresK[$i]->VALK_VALOR*$radiacion[$i];
		echo $i.' -> '.$RH[$i].'<br>';
	}	
	$area= $panel->getAlto()*$panel->getAncho();
	echo $area;
	$area= $area * ($_POST['entero']);
	echo $area;
	$rend= $rend->getRendimiento()/100;
	$mant = ($_POST['inlineRadioOptions']);

	for ($i=0; $i < count($RH); $i++) {
		$PPM[$i]= $RH[$i]*$area*$rend*$mant;
		$PPA= $PPA + $PPM[$i];
		echo $i.' -> '.$PPM[$i].'<br>';
	}	
	
}
else{
	header( 'location: ../calculadora/nuevoCalculo.php');
}


?>