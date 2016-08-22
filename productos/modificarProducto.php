<?php
require_once("../config.php");
require_once("../models/Bateria.php");

if ( !IS_NULL($_POST["id"]) ) { 
	switch ($_POST["tipo"]) {
		case 'Batería':
			echo 'bateria';
			$bateria = new Bateria($_POST["id"]);
			break;
		
		default:
			# code...
			break;
	}
} else {
	header("location: index.php");
}
?>