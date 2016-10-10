<?php
require_once ('Conexion.php');


Class ARTEFACTO {

	private $id;
	private $nombre;
	private $consumo;


	function __construct ( $id ) {

		if ( $id != null ) {
			$link = new Conexion ( );
			$sql = "SELECT * FROM ARTEFACTO WHERE ART_ID = '$id'";
			$result = $link->getObj( $sql );
			$this->id 		= $result[0]->ART_ID;
			$this->nombre 	= $result[0]->ART_NOMBRE;
			$this->consumo	= $result[0]->ART_CONSUMO;
			
		} else {
			$this->id 		= null;
			$this->nombre 	= null;
			$this->consumo	= null;

		}
	}

	public function registrar (  $nombre , $consumo) {
		$sql="INSERT INTO ARTEFACTO ( ART_NOMBRE , ART_CONSUMO) VALUES ('$nombre','$consumo')";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function modificar ( $id , $nombre , $consumo ) {

		$sql="UPDATE ARTEFACTO SET ART_NOMBRE = '$nombre' , ART_CONSUMO = '$consumo'  WHERE ART_ID = '$id'";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function eliminar( ) {
		$sql="DELETE FROM ARTEFACTO WHERE ART_ID = '$this->id'";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function getListado ( ) {
		$sql = "SELECT * FROM ARTEFACTO ORDER BY ART_ID";
		$link = new Conexion ( );
		$array = $link->getObj( $sql );
		return $array;
	}

	public function getUltimoArtefacto( ) {
		$sql = "SELECT MAX(PROY_ID) as PROY_ID FROM PROYECTO";
		$link = new Conexion ( );
		$lastId = $link->getObj( $sql );
		return $lastId[0]->PROY_ID;
	}

	public function getId( ) {
		return $this->id;
	}

	public function getNombre( ) {
		return $this->nombre;
	}

	public function getConsumo( ) {
		return $this->consumo;
	}


}
?>