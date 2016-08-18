<?php
	require_once('../config.php');
	require_once('../models/Artefacto.php');

	switch ($_POST['accion']) {
		case 'new':
			//Seteo las variables
			$id 			= $_POST['id'];
			$nombre  		= $_POST['nombre'];
			$consumo		= $_POST['consumo'];


			$user = new Artefacto ( $rut );
			//Valido que no se encuentre registrado el rut
			if ( $user->getId( ) == null ) {
				//Intento registrar el usuario en la base de datos
				if ( $user->registrar( $id, $nombre, $consumo) ) {
					//Devuelvo una variable para mostrar el mensaje exitoso
					header( 'location: ../artefactos/index.php?result=success');
				} else {
					//Devuelvo una variable para mostrar el mensaje de error
					header( 'location: ../artefactos/nuevoArtefacto.php?result=error&id='.$id.'&nombre='.$nombre.'&consumo='.$consumo);
				}
			//Devuelvo una variable para mostrar el mensaje de error
			} else {
				header( 'location: ../artefactos/nuevoArtefacto.php?result=old&id='.$id.'&nombre='.$nombre.'&consumo='.$consumo);
			}
			break;

		case 'alter':
			//Valido que el usuario no se encuentre registrado

			$id 		= $_POST['id'];
			$nombre 	= $_POST['nombre'];
			$consumo	= $_POST['consumo'];
	

			$user = new Artefacto ( $id );

			//Intento registrar el usuario en la base de datos
			if ( $user->modificar ( $id, $nombre, $consumo)) {
				header( 'location: ../artefactos/index.php?result=success');
			} else {
				header( 'location: ../artefactos/modificar.php?result=error&id='.$id.'&nombre='.$nombre.'&consumo='.$consumo);
			}
		break;
		case 'delete':
		
			//Valido que el usuario no se encuentre registrado
			$id 		= $_POST['id'];
			$user = new Artefacto ( $id );

			if ( $user->eliminar( ) ) {
				header( 'location: ../artefactos/index.php?result=success');
			} else {
				header( 'location: ../artefactos/index.php?result=error');
			}
		break;
		default:
			# code...
			break;
	}
?>