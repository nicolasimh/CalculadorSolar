<?php
require_once ('Conexion.php');


Class CLIENTE {

	private $rut;
	private $razonsocial;
	private $nombrefantasia;
	private $direccion;
	private $telefono;
	private $contacto;
	private $email;

	function __construct ( $id ) {

		if ( $id != null ) {
			$link = new Conexion ( );
			$sql = "SELECT * FROM CLIENTE WHERE CL_RUT = '$id'";
			$result = $link->getObj( $sql );
			$this->rut 				= $result[0]->CL_RUT;
			$this->razonsocial 		= $result[0]->CL_RAZONSOCIAL;
			$this->nombrefantasia	= $result[0]->CL_NOMBREFANTASIA;
			$this->direccion		= $result[0]->CL_DIRECCION;
			$this->telefono 	 	= $result[0]->CL_TELEFONO;
			$this->contacto 	 	= $result[0]->CL_CONTACTO;
			$this->email 			= $result[0]->CL_EMAIL;
		} else {
			$this->rut 		 		= null;
			$this->razonsocial 		= null;
			$this->nombrefantasia	= null;
			$this->direccion 		= null;
			$this->telefono 	 	= null;
			$this->contacto 	 	= null;
			$this->email 			= null;
		}
	}

	public function registrar ( $rut , $razonsocial , $nombrefantasia , $direccion, $telefono , $contacto, $email) {
		$sql="INSERT INTO CLIENTE ( CL_RUT , CL_RAZONSOCIAL , CL_NOMBREFANTASIA , CL_DIRECCION, CL_TELEFONO , CL_CONTACTO, CL_EMAIL ) VALUES ('$rut','$razonsocial','$nombrefantasia','$direccion','$telefono','$contacto','$email')";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function modificar ( $rut , $razonsocial , $nombrefantasia , $direccion, $telefono , $contacto, $email ) {

		$sql="UPDATE CLIENTE SET CL_RAZONSOCIAL = '$razonsocial' , CL_NOMBREFANTASIA = '$nombrefantasia' , CL_DIRECCION = '$direccion', CL_TELEFONO = '$telefono', CL_CONTACTO = '$contacto', CL_EMAIL = '$email' WHERE CL_RUT = '$rut'";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function eliminar( ) {
		$sql="DELETE FROM CLIENTE WHERE CL_RUT = '$this->rut'";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function getListado ( ) {
		$sql = "SELECT * FROM CLIENTE ORDER BY CL_NOMBREFANTASIA";
		$link = new Conexion ( );
		$array = $link->getObj( $sql );
		return $array;
	}

	public function getRut( ) {
		return $this->rut;
	}

	public function getRazonsocial( ) {
		return $this->razonsocial;
	}

	public function getNombrefantasia( ) {
		return $this->nombrefantasia;
	}

	public function getDireccion( ) {
		return $this->direccion;
	}

	public function getTelefono( ) {
		return $this->telefono;
	}

	public function getContacto( ) {
		return $this->contacto;
	}	

	public function getEmail( ) {
		return $this->email;
	}


}
?>