<?php
require_once("../config.php");
require_once("../models/Producto.php");
require_once("../models/Bateria.php");
require_once("../models/Inversor.php");
require_once("../models/Panel.php");
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();


print_r($_POST);
switch ($_POST["event"]) {
	case 'new':
		$_SESSION["producto"]["nombre"] = $_POST["nombre"];
		$_SESSION["producto"]["marca"] = $_POST["marca"];
		$_SESSION["producto"]["modelo"] = $_POST["modelo"];
		$_SESSION["producto"]["descripcion"] = $_POST["descripcion"];
		$_SESSION["producto"]["precioCompra"] = $_POST["precioCompra"];
		$_SESSION["producto"]["precioVenta"] = $_POST["precioVenta"];
		$producto = new Producto ( null );
		
		if ( $producto->registrar( $_POST["nombre"] , $_POST["marca"] , $_POST["modelo"] , $_POST["descripcion"] , $_POST["precioCompra"] , $_POST["precioVenta"]) ) {
			switch ( $_POST["tipoProducto"] ) {
				case 'nuevoInversor':
					$_SESSION["producto"]["tipoProducto"] = $_POST["tipoProducto"];
					$_SESSION["producto"]["tipoInversor"] = $_POST["tipoInversor"];
					$_SESSION["producto"]["potenciaInversor"] = $_POST["potenciaInversor"];
					$_SESSION["producto"]["voltajeEntrada"] = $_POST["voltajeEntrada"];
					$_SESSION["producto"]["corrienteEntrada"] = $_POST["corrienteEntrada"];
					$_SESSION["producto"]["rendimiento"] = $_POST["rendimiento"];
					if ( $producto->registrarInversor( $_POST["nombre"] , $_POST["marca"] , $_POST["modelo"] , $_POST["descripcion"] , $_POST["precioCompra"] , $_POST["precioVenta"] ,
													   $_POST["tipoInversor"] , $_POST["potenciaInversor"] , $_POST["voltajeEntrada"] , $_POST["corrienteEntrada"] , $_POST["rendimiento"] ) ) {
						$_SESSION["producto"] = null;
						header("location: ../productos/index.php?result=exito");
					} else {
						header("location: ../productos/nuevoProducto.php?result=errorInversor");
					}
					break;
				case 'nuevaBateria':
					$_SESSION["productos"]["voltajeBateria"] = $_POST["voltajeBateria"];
					if ( $producto->registrarBateria ( $_POST["nombre"] , $_POST["marca"] , $_POST["modelo"] , $_POST["descripcion"] , $_POST["precioCompra"] , $_POST["precioVenta"] ,
														$_POST["voltajeBateria"])) {
						$_SESSION["productos"] = null;
						header("location: ../productos/index.php?result=exito");
					} else {
						header("location: ../productos/nuevoProducto.php?result=errorBateria");
					}
					break;
				case 'nuevoPanel':
					$_SESSION["producto"]["potenciaPanel"] = $_POST["potenciaPanel"];
					$_SESSION["producto"]["voltajeCorrienteAlterna"] = $_POST["voltajeCorrienteAlterna"];
					$_SESSION["producto"]["nominal"] = $_POST["nominal"];
					$_SESSION["producto"]["rendimiento"] = $_POST["rendimiento"];
					$_SESSION["producto"]["altoPanel"] = $_POST["altoPanel"];
					$_SESSION["producto"]["altoAncho"] = $_POST["altoAncho"];
					if ( $producto->registrarPanel ( $_POST["nombre"] , $_POST["marca"] , $_POST["modelo"] , $_POST["descripcion"] , $_POST["precioCompra"] , $_POST["precioVenta"] ,
													 $_POST["potenciaPanel"] , $_POST["voltajeCorrienteAlterna"] , $_POST["nominal"] , $_POST["rendimiento"] , $_POST["altoPanel"] , $_POST["altoAncho"] )) {
						$_SESSION["productos"] = null;
						header("location: ../productos/index.php?result=exito");
					} else {
						header("location: ../productos/nuevoProducto.php?result=errorPanel");
					}
					break;
			}
			
		} else {
			header("location: ../productos/ingresarProducto.php?result=errorIngreso");
		}
		break;

	case "alter":
		
		$producto = new Producto ( null );
		if ( $producto->modificar($_POST["idProducto"], $_POST["nombre"], $_POST["marca"], $_POST["modelo"], $_POST["descripcion"], $_POST["precioCompra"], $_POST["precioVenta"]) ) {
			switch ($_POST["tipoProducto"]) {
				case 'bateria':
					$bateria = new Bateria ( $_POST["subIdProducto"] );
					if ( $bateria->modificar($_POST["voltajeBateria"]) ) {
						header("location: ../productos/index.php?result=modSuccess&id=".$_POST["idProducto"]);
					}
					break;
				case 'inversor':
					$inversor = new Inversor($_POST["subIdProducto"]);
					if( $inversor->modificar($_POST["tipoInversor"], $_POST["potenciaInversor"], $_POST["voltajeEntrada"], $_POST["corrienteEntrada"], $_POST["rendimiento"])){
						header("location: ../productos/index.php?result=modSuccess&id=".$_POST["idProducto"]);
					}
					break;
				case 'panel':
				print_r($_POST);
					$panel = new Panel($_POST["subIdProducto"]);
					if( $panel->modificar($_POST["potenciaPanel"], $_POST["voltajeCorrienteAlterna"], $_POST["nominal"], $_POST["rendimiento"], $_POST["altoPanel"], $_POST["altoAncho"])){
						header("location: ../productos/index.php?result=modSuccess&id=".$_POST["idProducto"]);
					}
					break;
			}
		} 
		else 
			header("location: ../productos/index.php?result=errorModificar&id=".$_POST["idProducto"]);		
		break;

	case "delete":
		$flag = 0;
		switch ($_POST["tipo"]) {
			case 'Batería':
				$bateria = new Bateria ( $_POST["id"] );
				$flag = $bateria->eliminarSub();
				switch ($flag) {
					case 0:
						//Error al ejecutar la query
						header("location: ../productos/index.php?result=delError&id=".$bateria->getId());
						break;
					case 1:
						//Eliminacion exitosa
						header("location: ../productos/index.php?result=delSuccess&id=".$bateria->getId());
						break;
					case
						//Registro se cuentra asociado, no puede borrar
						header("location: ../productos/index.php?result=delExists&id=".$bateria->getId());
						break;
				}
				break;
			case 'Inversor':
				$inversor = new Inversor ( $_POST["id"]);
				$flag = $inversor->eliminarSub();
				switch ($flag) {
					case 0:
						//Error al ejecutar la query
						header("location: ../productos/index.php?result=delError&id=".$inversor->getId());
						break;
					case 1:
						//Eliminacion exitosa
						header("location: ../productos/index.php?result=delSuccess&id=".$inversor->getId());
						break;
					case
						//Registro se cuentra asociado, no puede borrar
						header("location: ../productos/index.php?result=delExists&id=".$inversor->getId());
						break;
				}
				break;
			case 'Panel':
				$panel = new Panel ( $_POST["id"]);
				$flag = $panel->eliminarSub();
				switch ($flag) {
					case 0:
						//Error al ejecutar la query
						header("location: ../productos/index.php?result=delError&id=".$panel->getId());
						break;
					case 1:
						//Eliminacion exitosa
						header("location: ../productos/index.php?result=delSuccess&id=".$panel->getId());
						break;
					case
						//Registro se cuentra asociado, no puede borrar
						header("location: ../productos/index.php?result=delExists&id=".$panel->getId());
						break;
				}
				break;
		}
	break;

}
?>