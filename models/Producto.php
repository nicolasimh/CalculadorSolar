<?php
require_once ('Conexion.php');


Class PRODUCTO {

	private $id;
	private $nombre;
	private $marca;
	private $modelo;
	private $descripcion;
	private $preciocompra;
	private $precioventa;

	function __construct ( $id ) {

		if ( $id != null ) {
			$link = new Conexion ( );
			$sql = "SELECT * FROM PRODUCTO WHERE PROD_ID = '$id'";
			$result = $link->getObj( $sql );
			$this->id 			= $result[0]->PROD_ID;
			$this->nombre  		= $result[0]->PROD_NOMBRE;
			$this->marca 		= $result[0]->PROD_MARCA;
			$this->modelo 		= $result[0]->PROD_MODELO;
			$this->descripcion  = $result[0]->PROD_DESCRIPCION;
			$this->preciocompra	= $result[0]->PROD_PRECIOCOMPRA;
			$this->precioventa 	= $result[0]->PROD_PRECIOVENTA;
		} else {
			$this->id 		 	= null;
			$this->nombre 		= null;
			$this->marca		= null;
			$this->modelo 		= null;
			$this->descripcion 	= null;
			$this->preciocompra	= null;
			$this->precioventa 	= null;
		}
	}

	public function registrar ( $nombre , $marca , $modelo, $descripcion , $preciocompra, $precioventa) {
		$sql="INSERT INTO PRODUCTO ( PROD_NOMBRE , PROD_MARCA , PROD_MODELO, PROD_DESCRIPCION , PROD_PRECIOCOSTO, PROD_PRECIOVENTA ) VALUES ('$nombre','$marca','$modelo','$descripcion',$preciocompra,$precioventa)";
		echo $sql;
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function modificar ( $id , $nombre , $marca , $modelo, $descripcion , $preciocompra, $precioventa ) {

		$sql="UPDATE PRODUCTO SET PROD_NOMBRE = '$nombre' , PROD_MARCA = '$marca' , PROD_MODELO = '$modelo', PROD_DESCRIPCION = '$descripcion', PROD_PRECIOCOMPRA = '$preciocompra', PROD_PRECIOVENTA = '$precioventa' WHERE PROD_ID = '$id'";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function eliminar( ) {
		$sql="DELETE FROM PRODUCTO WHERE PROD_ID = '$this->id'";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function getListado ( ) {
		$sql = "SELECT * FROM PRODUCTO ORDER BY PROD_NOMBRE";
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

	public function getMarca( ) {
		return $this->marca;
	}

	public function getModelo( ) {
		return $this->modelo;
	}

	public function getDescipcion( ) {
		return $this->descripcion;
	}

	public function getPrecioCompra( ) {
		return $this->preciocompra;
	}	

	public function getPrecioVenta( ) {
		return $this->precioventa;
	}


}
?>