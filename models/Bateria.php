<?php 
	require_once("Conexion.php");
	require_once("Producto.php");

	Class Bateria extends Producto {
		private $subId;
		private $voltajeBateria;

		function __construct ( $id ) {
			if ( $id != null ) {
				$link = new Conexion ( );
				$sql = "SELECT BAT_ID , PROD_ID , BAT_VOLTAJE FROM BATERIA WHERE BAT_ID = $id";
				$result = $link->getObj( $sql );
				$this->subId 			= $result[0]->BAT_ID;
				$this->voltajeBateria 	= $result[0]->BAT_VOLTAJE;
				parent::__construct( $result[0]->PROD_ID );
			} else {
				$this->subId 			= null;
				$this->voltajeBateria 	= null;
				parent::__construct( null );
			}
		}

		public function modificar ( $voltajeBateria ) {
			$sql = "UPDATE BATERIA 
			  		SET PROD_NOMBRE = '".parent::getNombre()."',
			  			PROD_MARCA = '".parent::getMarca()."',
			  			PROD_MODELO = '".parent::getModelo()."' ,
			  			PROD_DESCRIPCION = '".parent::getDescripcion()."',
			  			PROD_PRECIOCOSTO = ".parent::getPrecioCompra().",
			  			PROD_PRECIOVENTA = ".parent::getPrecioVenta().",
			  			BAT_VOLTAJE = $voltajeBateria
			  		WHERE PROD_ID = ".parent::getId()." AND BAT_ID = $this->subId";
			$link = new Conexion ( );
			return $link->query( $sql );
		}

		public function getSubId( ) {
			return $this->subId;
		}

		public function getVoltajeBateria ( ) {
			return $this->voltajeBateria;
		}
	}
?>