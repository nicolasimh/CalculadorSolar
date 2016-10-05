<?php
ini_set ('error_reporting', E_ALL);
require_once("../config.php");
require_once("../models/Proyecto.php");
session_start();

switch ($_POST["event"]) {
	case 'new':
		$_SESSION["proyecto"]["nombre"] 	= $_POST["nombre"];
		$_SESSION["proyecto"]["ubicacion"] 	= $_POST["ubicacion"];
		$_SESSION["proyecto"]["latitud"]	= $_POST["latitud"];
		$_SESSION["proyecto"]["longitud"]	= $_POST["longitud"];
		$_SESSION["proyecto"]["tipo"]		= $_POST["tipoProyecto"];

		$proyecto = new Proyecto ( null );

		if ($proyecto->getId()== null) {
			if ( $proyecto->registrarSimple( $_POST["cliente"] , $_POST["nombre"] , $_POST["ubicacion"] , $_POST["latitud"] , $_POST["longitud"] , $_POST["tipoProyecto"]) ){
				$_SESSION["proyecto"] = null;
				header('location: ../proyectos/index.php?result=success');
			} else {
				header('location: ../proyectos/nuevoProyecto.php?result=error');
			}
		}
		
		break;
	
	default:
		# code...
		break;
}
?>