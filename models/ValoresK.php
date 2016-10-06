<?php
require_once ('Conexion.php');


Class VALORESK {

	private $id;
	private $idFactor;
	private $nombre;
	private $valor;


	function __construct ( $idFactor ) {

			$link = new Conexion ( );
			$sql = "SELECT * FROM VALORESK WHERE FACK_ID = '$idFactor'";
			$result = $link->getObj( $sql ); print_r($result);
			$this->id 			= $result[0]->VALK_ID;
			$this->idFactor 	= $result[0]->FACK_ID;
			$this->nombre		= $result[0]->VALK_MES;
			$this->valor		= $result[0]->VALK_VALOR;
			
		
	}

	public function registrar ( $id , $idFactor , $nombre , $valor) {
		$sql="INSERT INTO VALORESK ( VALK_ID , FACK_ID , VALK_MES , VALK_VALOR) VALUES ('$id', '$idFactor','$nombre','$valor')";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function modificar ( $id , $nombre , $valor ) {

		$sql="UPDATE VALORESK SET VALK_MES = '$nombre' , VALK_VALOR = '$valor'  WHERE VALK_ID = '$id'";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function eliminar( ) {
		$sql="DELETE FROM VALORESK WHERE VALK_ID = '$this->id'";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function getListado ( ) {
		$sql = "SELECT * FROM VALORESK ORDER BY VALK_MES";
		$link = new Conexion ( );
		$array = $link->getObj( $sql );
		return $array;
	}

	public function getId( ) {
		return $this->id;
	}

	public function getIdProyecto( ) {
		return $this->idFactor;
	}

	public function getNombre( ) {
		return $this->nombre;
	}

	public function getValor( ) {
		return $this->valor;
	}
}
?>