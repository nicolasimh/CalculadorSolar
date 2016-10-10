<?php
	require_once('../config.php');
	require_once('../models/Usuario.php');

	switch ($_POST['accion']) {
		case 'new':
			//Seteo las variables
			$rut 		= $_POST['rut'];
			$nombre 	= $_POST['nombre'];
			$apellido	= $_POST['apellido'];
			$usuario 	= $_POST['usuario'];
			$email		= $_POST['email'];
			$clave		= $_POST['clave'];
			$tipo		= $_POST['tipo'];
			$estado		= $_POST['estado'];


			$user = new Usuario ( $rut );
			//Valido que no se encuentre registrado el rut
			if ( $user->getRut( ) == null ) {
				//Intento registrar el usuario en la base de datos
				if ( $user->registrar( $rut, $nombre, $apellido , $usuario, $email, $clave, $tipo, $estado) ) {
					//Devuelvo una variable para mostrar el mensaje exitoso
					header( 'location: ../usuarios/index.php?result=success');
				} else {
					//Devuelvo una variable para mostrar el mensaje de error
					header( 'location: ../usuarios/nuevoUsuario.php?result=error');
				}
			//Devuelvo una variable para mostrar el mensaje de error
			} else {
				header( 'location: ../usuarios/nuevoUsuario.php?result=old');
			}
			break;
		case 'alter':
			//Valido que el usuario no se encuentre registrado

			$rut 		= $_POST['rut'];
			$nombre 	= $_POST['nombre'];
			$apellido	= $_POST['apellido'];
			$usuario 	= $_POST['usuario'];
			$email		= $_POST['email'];
			$clave		= $_POST['clave'];
			$tipo		= $_POST['tipo'];
			$estado		= $_POST['estado'];

			$user = new Usuario ( $rut );

			//Intento registrar el usuario en la base de datos
			if ( $user->modificar ( $rut, $nombre, $apellido , $usuario, $email, $clave, $tipo, $estado) ) {
				header( 'location: ../Usuarios/index.php?result=success');
			} else {
				header( 'location: ../Usuarios/modificar.php?result=error');
			}
		break;
		case 'delete':
		
			//Valido que el usuario no se encuentre registrado
			$rut 		= $_POST['rut'];
			$user = new Usuario ( $rut );

			if ( $user->eliminar( ) ) {
				header( 'location: ../usuarios/index.php?result=success');
			} else {
				header( 'location: ../usuarios/index.php?result=errorDelete');
			}
		break;
		default:
			# code...
			break;
	}
?>