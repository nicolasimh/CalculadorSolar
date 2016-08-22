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
			$sql = "SELECT * FROM PRODUCTO WHERE PROD_ID = $id";
			$result = $link->getObj( $sql );
			$this->id 			= $result[0]->PROD_ID;
			$this->nombre  		= $result[0]->PROD_NOMBRE;
			$this->marca 		= $result[0]->PROD_MARCA;
			$this->modelo 		= $result[0]->PROD_MODELO;
			$this->descripcion  = $result[0]->PROD_DESCRIPCION;
			$this->preciocompra	= $result[0]->PROD_PRECIOCOSTO;
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

	public function registrar ( $nombre , $marca , $modelo, $descripcion , $preciocompra, $precioventa ) {
		$sql="INSERT INTO PRODUCTO ( PROD_NOMBRE , PROD_MARCA , PROD_MODELO, PROD_DESCRIPCION , PROD_PRECIOCOSTO, PROD_PRECIOVENTA ) VALUES ('$nombre','$marca','$modelo','$descripcion',$preciocompra,$precioventa)";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function registrarInversor ( $nombre , $marca , $modelo, $descripcion , $preciocompra, $precioventa ,
										$tipoInversor, $potenciaInversor , $voltajeEntrada , $corrienteEntrada , $rendimiento ) {
		$sql="SELECT (IFNULL (max(INV_ID) + 1,0) )as INV_ID FROM INVERSOR";
		$link = new Conexion ( );
		$idInversor = $link->getObj($sql);
		$idInversor = $idInversor[0]->INV_ID;
		$sql="SELECT MAX(PROD_ID) as PROD_ID FROM PRODUCTO";
		$idProducto = $link->getObj($sql);
		$idProducto = $idProducto[0]->PROD_ID;
		$sql="INSERT INTO INVERSOR ( PROD_ID , INV_ID , 
									 PROD_NOMBRE , PROD_MARCA , PROD_MODELO, PROD_DESCRIPCION , PROD_PRECIOCOSTO, PROD_PRECIOVENTA ,
									 INV_TIPO , INV_POTENCIACA , INV_VOLTAJEENTRADA , INV_CORRIENTEENTRADA , INV_RENDIMIENTO ) 
			  VALUES ( $idProducto , $idInversor ,
			  			'$nombre','$marca','$modelo','$descripcion',$preciocompra,$precioventa,
			  			'$tipoInversor' , '$potenciaInversor' , $voltajeEntrada , $corrienteEntrada , $rendimiento);";
		return $link->query( $sql );
	}

	public function registrarBateria ( $nombre , $marca , $modelo, $descripcion , $preciocompra, $precioventa , $voltajeBateria) {
		$sql="SELECT (IFNULL (max(BAT_ID) + 1,0) )as BAT_ID FROM BATERIA";
		$link = new Conexion ( );
		$idBateria = $link->getObj($sql);
		$idBateria = $idBateria[0]->BAT_ID;
		$sql="SELECT MAX(PROD_ID) as PROD_ID FROM PRODUCTO";
		$idProducto = $link->getObj($sql);
		$idProducto = $idProducto[0]->PROD_ID;
		$sql="INSERT INTO BATERIA ( PROD_ID , BAT_ID , 
									 PROD_NOMBRE , PROD_MARCA , PROD_MODELO, PROD_DESCRIPCION , PROD_PRECIOCOSTO, PROD_PRECIOVENTA ,
									 BAT_VOLTAJE ) 
			  VALUES ( $idProducto , $idBateria ,
			  			'$nombre','$marca','$modelo','$descripcion',$preciocompra,$precioventa,
			  			$voltajeBateria);";
		echo $sql;
		return $link->query( $sql );
	}

	public function registrarPanel ( $nombre , $marca , $modelo, $descripcion , $preciocompra, $precioventa ,
									 $potenciaPanel , $voltajeCorrienteAlterna , $nominal , $rendimiento , $altoPanel , $altoAncho) {
		$sql="SELECT (IFNULL (max(PAN_ID) + 1,0) )as PAN_ID FROM PANEL";
		$link = new Conexion ( );
		$idPanel= $link->getObj($sql);
		$idPanel = $idPanel[0]->PAN_ID;
		$sql="SELECT MAX(PROD_ID) as PROD_ID FROM PRODUCTO";
		$idProducto = $link->getObj($sql);
		$idProducto = $idProducto[0]->PROD_ID;
		$sql="INSERT INTO PANEL ( PROD_ID , PAN_ID , 
									PROD_NOMBRE , PROD_MARCA , PROD_MODELO, PROD_DESCRIPCION , PROD_PRECIOCOSTO, PROD_PRECIOVENTA ,
									PAN_POTENCIA , PAN_VCA , PAN_NOMINAL , PAN_RENDIMIENTO , PAN_ALTO , PAN_ANCHO ) 
			  VALUES ( $idProducto , $idPanel ,
			  			'$nombre','$marca','$modelo','$descripcion',$preciocompra,$precioventa,
			  			$potenciaPanel , $voltajeCorrienteAlterna , $nominal , $rendimiento , $altoPanel , $altoAncho);";
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
		$sql = "SELECT p.PROD_ID , p.PROD_NOMBRE , p.PROD_MARCA , p.PROD_MODELO, p.PROD_DESCRIPCION , p.PROD_PRECIOCOSTO, p.PROD_PRECIOVENTA, s.TIPO, s.SUB_ID
				FROM (
					SELECT PROD_ID, BAT_ID as SUB_ID, PROD_NOMBRE, PROD_MARCA, PROD_MODELO, PROD_DESCRIPCION, PROD_PRECIOCOSTO, PROD_PRECIOVENTA, 'Batería' as TIPO
					FROM BATERIA
					UNION
					SELECT PROD_ID, INV_ID as SUB_ID, PROD_NOMBRE, PROD_MARCA, PROD_MODELO, PROD_DESCRIPCION, PROD_PRECIOCOSTO, PROD_PRECIOVENTA, 'Inversor' as TIPO
					FROM INVERSOR
					UNION
					SELECT PROD_ID, PAN_ID as SUB_ID, PROD_NOMBRE, PROD_MARCA, PROD_MODELO, PROD_DESCRIPCION, PROD_PRECIOCOSTO, PROD_PRECIOVENTA, 'Panel' as TIPO
					FROM PANEL
				) as s INNER JOIN PRODUCTO p ON p.PROD_ID = s.PROD_ID
				ORDER BY TIPO , PROD_NOMBRE , PROD_MARCA";
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