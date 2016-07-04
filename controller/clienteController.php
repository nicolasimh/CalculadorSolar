<?php
	require_once('../_models/Cliente.php');

	switch ($_GET['accion']) {
		case 'new':
			//Seteo las variables
			$rut 			= $_GET['rut'];
			$razonsocial 	= $_GET['razonsocial'];
			$nombrefantasia	= $_GET['nombrefantasia'];
			$direccion 		= $_GET['direccion'];
			$telefono		= $_GET['telefono'];
			$contacto		= $_GET['contacto'];
			$email			= $_GET['email'];


			$user = new Cliente ( $rut );
			//Valido que no se encuentre registrado el rut
			if ( $user->getId( ) == null ) {
				//Intento registrar el usuario en la base de datos
				if ( $user->registrar( $rut, $razonsocial, $nombrefantasia , $direccion, $telefono, $contacto, $email) ) {
					//Devuelvo una variable para mostrar el mensaje exitoso
					header( 'location: ../cliente/index.php?result=success');
				} else {
					//Devuelvo una variable para mostrar el mensaje de error
					header( 'location: ../cliente/registrar.php?result=error&rut='.$rut.'&razonsocial='.$razonsocial.'&nombrefantasia='.$nombrefantasia.'&direccion='.$direccion.'&telefono='.$telefono.'&contacto='.$contacto.'&email='.$email);
				}
			//Devuelvo una variable para mostrar el mensaje de error
			} else {
				header( 'location: ../cliente/registrar.php?result=old&rut='.$rut.'&razonsocial='.$razonsocial.'&nombrefantasia='.$nombrefantasia.'&direccion='.$direccion.'&telefono='.$telefono.'&contacto='.$contacto.'&email='.$email);
			}
			break;
		case 'alter':
			//Valido que el usuario no se encuentre registrado

			$rut 			= $_GET['rut'];
			$razonsocial 	= $_GET['razonsocial'];
			$nombrefantasia	= $_GET['nombrefantasia'];
			$direccion 		= $_GET['direccion'];
			$telefono		= $_GET['telefono'];
			$contacto		= $_GET['contacto'];
			$email			= $_GET['email'];

			$user = new Cliente ( $rut );

			//Intento registrar el usuario en la base de datos
			if ( $user->modificar ( $rut, $razonsocial, $nombrefantasia , $direccion, $telefono, $contacto, $email) ) {
				header( 'location: ../cliente/index.php?result=success');
			} else {
				header( 'location: ../cliente/modificar.php?result=error&rut='.$rut.'&razonsocial='.$razonsocial.'&nombrefantasia='.$nombrefantasia.'&direccion='.$direccion.'&telefono='.$telefono.'&contacto='.$contacto.'&email='.$email);
			}
		break;
		case 'delete':
		
			//Valido que el usuario no se encuentre registrado
			$rut 		= $_GET['rut'];
			$user = new Cliente ( $rut );

			if ( $user->eliminar( ) ) {
				header( 'location: ../cliente/index.php?result=success');
			} else {
				header( 'location: ../cliente/index.php?result=error');
			}
		break;
		default:
			# code...
			break;
	}
?>