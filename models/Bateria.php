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
				print_r($result);
				$this->subId 			= $result[0]->BAT_ID;
				$this->voltajeBateria 	= $result[0]->BAT_VOLTAJE;
				parent::__construct( $result[0]->PROD_ID );
			} else {
				$this->subId 			= null;
				$this->voltajeBateria 	= null;
				parent::__construct( null );
			}
		}

		public function getSubId( ) {
			return $this->subId;
		}

		public function getVoltajeBateria ( ) {
			return $this->voltajeBateria;
		}
	}
?>