<?php
	require_once("Conexion.php");
	require_once("Producto.php");

	Class Inversor extends Producto {
		private $subId;
		private $tipo;
		private $potenciaCA;
		private $voltajeEntrada;
		private $corrienteEntrada;
		private $rendimiento;

		function __construct ( $id ) {
			if ( $id != null ) {
				$link = new Conexion ( );
				$sql = "SELECT INV_ID , PROD_ID , INV_TIPO , INV_POTENCIACA , INV_VOLTAJEENTRADA ,
							   INV_CORRIENTEENTRADA	, INV_RENDIMIENTO
						FROM INVERSOR WHERE INV_ID = $id";
				$result = $link->getObj( $sql );
				$this->subId 			= $result[0]->INV_ID;
				$this->tipo 			= $result[0]->INV_TIPO;
				$this->potenciaCA 		= $result[0]->INV_POTENCIACA;
				$this->voltajeEntrada 	= $result[0]->INV_VOLTAJEENTRADA;
				$this->corrienteEntrada = $result[0]->INV_CORRIENTEENTRADA;
				$this->rendimiento 		= $result[0]->INV_RENDIMIENTO;
				parent::__construct( $result[0]->PROD_ID );
			} else {
				$this->subId 			= null;
				$this->tipo 			= null;
				$this->potenciaCA 		= null;
				$this->voltajeEntrada 	= null;
				$this->corrienteEntrada = null;
				$this->rendimiento 		= null;
				parent::__construct( null );
			}
		}

		public function getSubId( ) {
			return $this->subId;
		}

		public function getTipo ( ) {
			return $this->tipo;
		}

		public function getPotenciaCA( ) {
			return $this->potenciaCA;
		}

		public function getVoltajeEntrada( ) {
			return $this->voltajeEntrada;
		}

		public function getCorrienteEntrada( ) {
			return $this->corrienteEntrada;
		}

		public function getRendimiento( ) {
			return $this->rendimiento;
		}
	} 
?>