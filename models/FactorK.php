<?php
require_once ('Conexion.php');


Class FACTORK {

	private $id;
	private $latitud;
	private $grado;


	function __construct ( $latitud, $grado ) {

			$link = new Conexion ( );
			$sql = "SELECT * FROM FACTORK WHERE FACK_LATITUD = '$latitud' AND FACK_GRADO = $grado ";
			$result = $link->getObj( $sql );
			$this->id 		= $result[0]->FACK_ID;
			$this->latitud 	= $result[0]->FACK_LATITUD;
			$this->grado	= $result[0]->FACK_GRADO;

	}

	public function registrar ( $id , $latitud , $grado) {
		$sql="INSERT INTO FACTORK ( FACK_ID , FACK_LATITUD , FACK_GRADO) VALUES ('$id','$latitud','$grado')";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function modificar ( $id , $latitud , $grado ) {

		$sql="UPDATE FACTORK SET FACK_LATITUD = '$latitud' , FACK_GRADO = '$grado'  WHERE FACK_ID = '$id'";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function eliminar( ) {
		$sql="DELETE FROM FACTORK WHERE FACK_ID = '$this->id'";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function getListado ( ) {
		$sql = "SELECT * FROM FACTORK ORDER BY FACK_LATITUD";
		$link = new Conexion ( );
		$array = $link->getObj( $sql );
		return $array;
	}

	public function getValoresK ( ) {
		$idFactor = $this->id;
		$sql = "SELECT VALK_MES , VALK_VALOR FROM VALORESK WHERE FACK_ID = '$idFactor'";
		$link = new Conexion ( );
		$array = $link->getObj( $sql );
		return $array;
	}

	public function getId( ) {
		return $this->id;
	}

	public function getLatitud( ) {
		return $this->latitud;
	}

	public function getGrado( ) {
		return $this->grado;
	}


}
?>