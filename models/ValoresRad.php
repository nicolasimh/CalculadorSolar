<?php
require_once ('Conexion.php');


Class VALORESRAD {

	private $id;
	private $idProyecto;
	private $nombre;
	private $valor;


	function __construct ( $id ) {

		if ( $id != null ) {
			$link = new Conexion ( );
			$sql = "SELECT * FROM VALORESRAD WHERE VALR_ID = '$id'";
			$result = $link->getObj( $sql );
			$this->id 			= $result[0]->VALR_ID;
			$this->idProyecto 	= $result[0]->PROY_ID;
			$this->nombre		= $result[0]->VALR_NOMBRE;
			$this->valor		= $result[0]->VALR_VALOR;
			
		} else {
			$this->id 			= null;
			$this->idProyecto	= null;
			$this->nombre 		= null;
			$this->valor		= null;

		}
	}

	public function registrar ( $id , $idProyecto , $nombre , $valor) {
		$sql="INSERT INTO VALORESRAD ( VALR_ID , PROY_ID , VALR_NOMBRE , VALR_VALOR) VALUES ('$id', '$idProyecto','$nombre','$valor')";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function modificar ( $id , $nombre , $valor ) {

		$sql="UPDATE VALORESRAD SET VALR_NOMBRE = '$nombre' , VALR_VALOR = '$valor'  WHERE VALR_ID = '$id'";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function eliminar( ) {
		$sql="DELETE FROM VALORESRAD WHERE VALR_ID = '$this->id'";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function getListado ( ) {
		$sql = "SELECT * FROM VALORESRAD ORDER BY VALR_NOMBRE";
		$link = new Conexion ( );
		$array = $link->getObj( $sql );
		return $array;
	}

	public function getId( ) {
		return $this->id;
	}

	public function getIdProyecto( ) {
		return $this->idProyecto;
	}


	public function getNombre( ) {
		return $this->nombre;
	}

	public function getValor( ) {
		return $this->valor;
	}
}
?>