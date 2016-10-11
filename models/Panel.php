<?php
	require_once("Conexion.php");
	require_once("Producto.php");

	Class Panel extends Producto {
		private $subId;
		private $potencia;
		private $vca;
		private $nominal;
		private $rendimiento;
		private $alto;
		private $ancho;

		function __construct ( $id ) {
			if ( $id != null ) {
				$link = new Conexion ( );
				$sql = "SELECT PAN_ID , PROD_ID , PAN_POTENCIA , PAN_VCA , PAN_NOMINAL ,
							   PAN_RENDIMIENTO	, PAN_ALTO, PAN_ANCHO
						FROM PANEL WHERE PROD_ID = $id";
				$result = $link->getObj( $sql ); 
				$this->subId 		= $result[0]->PAN_ID;
				$this->potencia 	= $result[0]->PAN_POTENCIA;
				$this->vca 			= $result[0]->PAN_VCA;
				$this->nominal 		= $result[0]->PAN_NOMINAL;
				$this->rendimiento 	= $result[0]->PAN_RENDIMIENTO;
				$this->alto 		= $result[0]->PAN_ALTO;
				$this->ancho 		= $result[0]->PAN_ANCHO;
				parent::__construct( $result[0]->PROD_ID );
			} else {
				$this->subId 		= null;
				$this->potencia 	= null;
				$this->vca 			= null;
				$this->nominal 		= null;
				$this->rendimiento 	= null;
				$this->alto 		= null;
				$this->ancho 		= null;
				parent::__construct( null );
			}
		}

		public function modificar ( $potencia, $vca, $nominal, $rendimiento, $alto, $ancho ) {
			$sql = "UPDATE PANEL 
			  		SET PROD_NOMBRE = '".parent::getNombre()."',
			  			PROD_MARCA = '".parent::getMarca()."',
			  			PROD_MODELO = '".parent::getModelo()."' ,
			  			PROD_DESCRIPCION = '".parent::getDescripcion()."',
			  			PROD_PRECIOCOSTO = ".parent::getPrecioCompra().",
			  			PROD_PRECIOVENTA = ".parent::getPrecioVenta().",
			  			PAN_POTENCIA = '$potencia',
			  			PAN_VCA = $vca,
			  			PAN_NOMINAL = $nominal,
			  			PAN_RENDIMIENTO = $rendimiento,
			  			PAN_ALTO = $alto,
			  			PAN_ANCHO = $ancho
			  		WHERE PROD_ID = ".parent::getId()." AND PAN_ID = $this->subId";
			$link = new Conexion ( );
			print_r($sql);
			return $link->query( $sql );
		}

		public function eliminarSub( ) {
			$sql = "SELECT PROY_ID FROM PROY_TIENE_PROD WHERE PROD_ID = ".parent::getId();
			$link = new Conexion();
			$result = $link->getObj( $sql );
			if ( empty($result) ) {
				$sql = "DELETE FROM PANEL WHERE PAN_ID = $this->subId";
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

		public function getPotencia ( ) {
			return $this->potencia;
		}

		public function getVCA( ) {
			return $this->vca;
		}

		public function getNominal( ) {
			return $this->nominal;
		}

		public function getRendimiento( ) {
			return $this->rendimiento;
		}

		public function getAlto( ) {
			return $this->alto;
		}

		public function getAncho( ) {
			return $this->ancho;
		}

		public function getListadoPanel(){
			$sql = "SELECT * FROM PANEL";
		$link = new Conexion ( );
		$array = $link->getObj( $sql );
		return $array;
		}
	} 