<?php
require_once ('Conexion.php');


Class MANTENIMIENTO {

	private $id;
	private $nombre;
	private $valor;


	function __construct ( $id ) {

		if ( $id != null ) {
			$link = new Conexion ( );
			$sql = "SELECT * FROM MANTENIMIENTO WHERE MANT_ID = '$id'";
			$result = $link->getObj( $sql );
			$this->id 		= $result[0]->MANT_ID;
			$this->nombre	= $result[0]->MANT_NOMBRE;
			$this->valor	= $result[0]->MANT_VALOR;
		} else {
			$this->id 		= null;
			$this->nombre 	= null;
			$this->valor	= null;
		}
	}

	public function registrar ( $id , $nombre , $valor) {
		$sql="INSERT INTO MANTENIMIENTO ( MANT_ID , MANT_NOMBRE , MANT_VALOR) VALUES ('$id','$nombre','$valor')";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function modificar ( $id , $nombre , $valor ) {

		$sql="UPDATE MANTENIMIENTO SET MANT_NOMBRE = '$nombre' , MANT_VALOR = '$valor'  WHERE MANT_ID = '$id'";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function eliminar( ) {
		$sql="DELETE FROM MANTENIMIENTO WHERE MANT_ID = '$this->id'";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function getListado ( ) {
		$sql = "SELECT * FROM MANTENIMIENTO ORDER BY MANT_VALOR ASC";
		$link = new Conexion ( );
		$array = $link->getObj( $sql );
		return $array;
	}

	public function getId( ) {
		return $this->id;
	}

	public function getNombre( ) {
		return $this->nombre;
	}

	public function getValor( ) {
		return $this->valor;
	}


}
?>