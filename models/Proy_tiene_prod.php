<?php
require_once ('Conexion.php');


Class PROY_TIENE_PROD{

	private $idProyecto;
	private $idProducto;
	private $cantidad;
	private $costoventa;


	function __construct ( $id ) {

		if ( $id != null ) {
			$link = new Conexion ( );
			$sql = "SELECT * FROM PROY_TIENE_PROD WHERE (PROY_ID='$idProyecto' AND PROD_ID='$idProducto')";
			$result = $link->getObj( $sql );
			$this->idProyecto 	= $result[0]->PROY_ID;
			$this->idProducto	= $result[0]->PROD_ID;
			$this->cantidad 	= $result[0]->PTP_CANTIDAD;
			$this->costoventa 	= $result[0]->PTP_COSTOVENTA;
			
		} else {
			$this->idProyecto 	= null;
			$this->idProducto 	= null;
			$this->cantidad 	= null;
			$this->costoventa 	= null;

		}
	}

	public function registrar ( $idProyecto , $idProducto , $cantidad ,$costoventa) {
		$sql="INSERT INTO PROY_TIENE_PROD (PROY_ID , PROD_ID ,PTP_CANTIDAD , PTP_COSTOVENTA) VALUES ('$idProyecto' , '$idProducto' ,'$cantidad','$costoventa')";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function modificar ( $idProyecto, $idProyecto, $cantidad , $costoventa ) {

		$sql="UPDATE PROY_TIENE_PROD SET PTP_CANTIDAD = '$cantidad' , PTP_COSTOVENTA = '$costoventa'  WHERE (PROY_ID='$idProyecto' AND PROD_ID='$idProducto')";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function eliminar( ) {
		$sql="DELETE FROM PROY_TIENE_PROD WHERE (PROY_ID='$idProyecto' AND PROD_ID='$idProducto')";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function getListado ( ) {
		$sql = "SELECT * FROM PROY_TIENE_PROD";
		$link = new Conexion ( );
		$array = $link->getObj( $sql );
		return $array;
	}

	public function getIdProyecto( ) {
		return $this->idProyecto;
	}

	public function getIdProducto( ) {
		return $this->idProducto;
	}

	public function getCantidad( ) {
		return $this->cantidad;
	}

	public function getCostoventa( ) {
		return $this->costoventa;
	}
}
?>