<?php
require_once ('Conexion.php');


Class CORRECCIONCONSUMO {

	private $id;
	private $mes;
	private $valor;


	function __construct ( $id ) {

		if ( $id != null ) {
			$link = new Conexion ( );
			$sql = "SELECT * FROM CORRECCIONCONSUMO WHERE CORR_ID = '$id'";
			$result = $link->getObj( $sql );
			$this->id 		= $result[0]->CORR_ID;
			$this->mes 		= $result[0]->CORR_MES;
			$this->valor	= $result[0]->CORR_VALOR;
			
		} else {
			$this->id 		= null;
			$this->mes 		= null;
			$this->valor	= null;

		}
	}

	public function registrar ( $id , $mes , $valor) {
		$sql="INSERT INTO CORRECCIONCONSUMO ( CORR_ID , CORR_MES , CORR_VALOR) VALUES ('$id','$mes','$valor')";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function modificar ( $id , $mes , $valor ) {

		$sql="UPDATE CORRECCIONCONSUMO SET CORR_MES = '$mes' , CORR_VALOR = '$valor'  WHERE CORR_ID = '$id'";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function eliminar( ) {
		$sql="DELETE FROM CORRECCIONCONSUMO WHERE CORR_ID = '$this->id'";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function getListado ( ) {
		$sql = "SELECT * FROM CORRECCIONCONSUMO ORDER BY CORR_MES";
		$link = new Conexion ( );
		$array = $link->getObj( $sql );
		return $array;
	}

	public function getId( ) {
		return $this->id;
	}

	public function getMes( ) {
		return $this->mes;
	}

	public function getValor( ) {
		return $this->valor;
	}


}
?>