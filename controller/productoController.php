<?php
require_once("../config.php");
require_once("../models/Producto.php");
error_reporting(E_ALL);
ini_set('display_errors', '1');

print_r($_POST);

switch ($_POST["event"]) {
	case 'nuevo':
		$producto = new Producto ( null );

		if ( $producto->registrar( $_POST["nombre"] , $_POST["marca"] , $_POST["modelo"] , $_POST["descripcion"] , $_POST["precioCompra"] , $_POST["precioVenta"]) ) {
			//header("location: ../productos/ingresarProducto.php?result=exito");
		} else {
			//header("location: ../productos/ingresarProducto.php?result=errorIngreso");
		}
		break;
	
	default:
		# code...
		break;
}
?>