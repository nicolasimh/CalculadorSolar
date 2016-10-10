<?php
	require_once('../config.php');
	require_once('../models/Cliente.php');

	switch ($_POST['accion']) {
		case 'new':
			//Seteo las variables
			$rut 			= $_POST['rut'];
			$razonsocial 	= $_POST['razonsocial'];
			$nombrefantasia	= $_POST['nombrefantasia'];
			$direccion 		= $_POST['direccion'];
			$telefono		= $_POST['telefono'];
			$contacto		= $_POST['contacto'];
			$email			= $_POST['email'];


			$user = new Cliente ( $rut );
			//Valido que no se encuentre registrado el rut
			if ( $user->getRut( ) == null ) {
				//Intento registrar el usuario en la base de datos
				if ( $user->registrar( $rut, $razonsocial, $nombrefantasia , $direccion, $telefono, $contacto, $email) ) {
					//Devuelvo una variable para mostrar el mensaje exitoso
					header( 'location: ../clientes/index.php?result=success');
				} else {
					//Devuelvo una variable para mostrar el mensaje de error
					header( 'location: ../clientes/nuevoCliente.php?result=error');
				}
			//Devuelvo una variable para mostrar el mensaje de error
			} else {
				header( 'location: ../clientes/nuevoCliente.php?result=old');
			}
			break;
		case 'alter':
			//Valido que el usuario no se encuentre registrado

			$rut 			= $_POST['rut'];
			$razonsocial 	= $_POST['razonsocial'];
			$nombrefantasia	= $_POST['nombrefantasia'];
			$direccion 		= $_POST['direccion'];
			$telefono		= $_POST['telefono'];
			$contacto		= $_POST['contacto'];
			$email			= $_POST['email'];

			$user = new Cliente ( $rut );

			//Intento registrar el usuario en la base de datos
			if ( $user->modificar ( $rut, $razonsocial, $nombrefantasia , $direccion, $telefono, $contacto, $email) ) {
				header( 'location: ../clientes/index.php?result=success');
			} else {
				header( 'location: ../clientes/modificar.php?result=error');
			}
		break;
		case 'delete':
		
			//Valido que el usuario no se encuentre registrado
			$rut 		= $_POST['rut'];
			$user = new Cliente ( $rut );

			if ( $user->eliminar( ) ) {
				header( 'location: ../clientes/index.php?result=success');
			} else {
				header( 'location: ../clientes/index.php?result=errorDelete');
			}
		break;
		default:
			# code...
			break;
	}
?>