<?php
require_once ('Conexion.php');


Class USUARIO {

	private $rut;
	private $nombre;
	private $apellido;
	private $usuario;
	private $email;
	private $clave;
	private $tipo;
	private $estado;

	function __construct ( $id ) {

		if ( $id != null ) {
			$link = new Conexion ( );
			$sql = "SELECT * FROM usuario WHERE USU_RUT = '$id'";
			$result = $link->getObj( $sql );
			$this->rut 		= $result[0]->USU_RUT;
			$this->nombre 	= $result[0]->USU_NOMBRE;
			$this->apellido	= $result[0]->USU_APELLIDO;
			$this->usuario	= $result[0]->USU_USUARIO;
			$this->email 	= $result[0]->USU_EMAIL;
			$this->clave 	= $result[0]->USU_CLAVE;
			$this->tipo		= $result[0]->USU_TIPO;
			$this->estado	= $result[0]->USU_ESTADO;
		} else {
			$this->rut 		= null;
			$this->nombre 	= null;
			$this->apellido	= null;
			$this->usuario	= null;
			$this->email 	= null;
			$this->clave 	= null;
			$this->tipo		= null;
			$this->estado	= null;
		}
	}

	public function registrar ( $rut , $nombre , $apellido , $usuario, $email , $clave, $tipo, $estado ) {
		$sql="INSERT INTO USUARIO ( USU_RUT , USU_NOMBRE , USU_APELLIDO , USU_USUARIO, USU_EMAIL , USU_CLAVE, USU_TIPO, USU_ESTADO ) VALUES ('$rut','$nombre','$apellido','$usuario','$email','$clave','$tipo', '$estado')";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function modificar ( $rut , $nombre , $apellido , $usuario, $email , $clave, $tipo, $estado ) {

		if ( empty($clave) ) $sql="UPDATE USUARIO SET USU_NOMBRE = '$nombre' , USU_APELLIDO = '$apellido' , USU_USUARIO = '$usuario', USU_EMAIL = '$email', USU_TIPO = '$tipo', USU_ESTADO = '$estado' WHERE USU_RUT = '$rut'";
		else $sql="UPDATE USUARIO SET USU_NOMBRE = '$nombre' , USU_APELLIDO = '$apellido' , USU_USUARIO = '$usuario', USU_EMAIL = '$email' , USU_CLAVE = '$clave', USU_TIPO = '$tipo', USU_ESTADO = '$estado' WHERE USU_RUT = '$rut'";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function eliminar( ) {
		$sql="DELETE FROM USUARIO WHERE USU_RUT = '$this->rut'";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function getListado ( ) {
		$sql = "SELECT * FROM USUARIO ORDER BY USU_APELLIDO, USU_NOMBRE";
		$link = new Conexion ( );
		$array = $link->getObj( $sql );
		return $array;
	}

	public function login ( $nombreUser , $pass ) {
		$sql = "SELECT * FROM USUARIO WHERE USU_USUARIO = '$nombreUser' AND USU_CLAVE = '$pass' AND USU_ESTADO = 1;";
		$link = new Conexion ( );
		$result = $link->getObj( $sql );
		$this->rut 		= $result[0]->USU_RUT;
		$this->nombre 	= $result[0]->USU_NOMBRE;
		$this->apellido	= $result[0]->USU_APELLIDO;
		$this->usuario	= $result[0]->USU_USUARIO;
		$this->email 	= $result[0]->USU_EMAIL;
		$this->clave 	= $result[0]->USU_CLAVE;
		$this->tipo		= $result[0]->USU_TIPO;
		$this->estado	= $result[0]->USU_ESTADO;
		if ( $this->usuario == $nombreUser && $this->clave == $pass ) {
			return true;
		} else {
			return false;
		}
	}

	public function getRut( ) {
		return $this->rut;
	}

	public function getNombre( ) {
		return $this->nombre;
	}

	public function getApellido( ) {
		return $this->apellido;
	}

	public function getUsuario( ) {
		return $this->usuario;
	}

	public function getEmail( ) {
		return $this->email;
	}

	public function getClave( ) {
		return $this->clave;
	}	

	public function getTipo( ) {
		return $this->tipo;
	}

	public function getEstado( ) {
		return $this->estado;
	}


}
?>