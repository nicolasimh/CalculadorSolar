<?php 
require_once("../config.php");
require_once("../models/Proyecto.php");
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

print_r($_POST);

switch ($_POST["accion"]) {
	case 'new':
		$_SESSION["proyecto"]["nombre"] 	= $_POST["nombre"];
		$_SESSION["proyecto"]["ubicacion"] 	= $_POST["ubicacion"];
		$_SESSION["proyecto"]["latitud"]	= $_POST["latitud"];
		$_SESSION["proyecto"]["longitud"]	= $_POST["longitud"];
		$_SESSION["proyecto"]["tipo"]		= $_POST["tipoProyecto"];

		$proyecto = new Proyecto ( null );
		
		break;
	
	default:
		# code...
		break;
}
?>