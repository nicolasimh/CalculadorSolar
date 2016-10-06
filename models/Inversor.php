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
						FROM INVERSOR WHERE PROD_ID = $id";
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

		public function modificar ( $tipo, $potenciaCA, $voltajeEntrada, $corrienteEntrada, $rendimiento ) {
			$sql = "UPDATE INVERSOR 
			  		SET PROD_NOMBRE = '".parent::getNombre()."',
			  			PROD_MARCA = '".parent::getMarca()."',
			  			PROD_MODELO = '".parent::getModelo()."' ,
			  			PROD_DESCRIPCION = '".parent::getDescripcion()."',
			  			PROD_PRECIOCOSTO = ".parent::getPrecioCompra().",
			  			PROD_PRECIOVENTA = ".parent::getPrecioVenta().",
			  			INV_TIPO = '$tipo',
			  			INV_POTENCIACA = $potenciaCA,
			  			INV_VOLTAJEENTRADA = $voltajeEntrada,
			  			INV_CORRIENTEENTRADA = $corrienteEntrada,
			  			INV_RENDIMIENTO = $rendimiento
			  		WHERE PROD_ID = ".parent::getId()." AND INV_ID = $this->subId";
			$link = new Conexion ( );
			return $link->query( $sql );
		}

		public function eliminarSub( ) {
			$sql = "SELECT PROY_ID FROM PROY_TIENE_PROD WHERE PROD_ID = ".parent::getId();
			$link = new Conexion();
			$result = $link->getObj( $sql );
			if ( empty($result) ) {
				$sql = "DELETE FROM INVERSOR WHERE INV_ID = $this->subId";
				echo $sql;
				$link = new Conexion();
				if ( $link->query($sql) ) {
					if ( parent::eliminar() ) {
						return 1;
					} else {
						return 0;
					}
				} else {
					return 0;
				}
			} else {
				return 2;
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

		public function getListadoInversor(){
			$sql = "SELECT * FROM INVERSOR";
			$link = new Conexion ( );
			$array = $link->getObj( $sql );
			return $array;
		}
	} 
?>