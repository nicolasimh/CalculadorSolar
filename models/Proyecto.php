<?php
require_once ('Conexion.php');


Class PROYECTO {

	private $id;
	private $rut;
	private $mantenimiento;
	private $factork;
	private $fecha;
	private $nombre;
	private $latitud;
	private $longitud;
	private $potenciadiaria;
	private $valorkw;
	private $estado;
	private $ubicacion;
	private $tipo;

	function __construct ( $id ) {

		if ( $id != null ) {
			$link = new Conexion ( );
			$sql = "SELECT * FROM PROYECTO WHERE PROY_ID = '$id'";
			$result = $link->getObj( $sql );
			$this->id 				= $result[0]->PROY_ID;
			$this->rut  			= $result[0]->CL_RUT;
			$this->mantenimiento 	= $result[0]->MANT_ID;
			$this->factork 			= $result[0]->FACK_ID;
			$this->fecha  			= $result[0]->PROY_FECHA;
			$this->nombre			= $result[0]->PROY_NOMBRE;
			$this->ubicacion 		= $result[0]->PROY_UBICACION;
			$this->latitud 			= $result[0]->PROY_LATITUD;
			$this->longitud 		= $result[0]->PROY_LONGITUD;
			$this->potenciadiaria	= $result[0]->PROY_POTENCIADIARIA;
			$this->valorkw 			= $result[0]->PROY_VALORKW;
			$this->estado			= $result[0]->PROY_ESTADO;
			$this->tipo 			= $result[0]->PROY_TIPOCALCULO;
		} else {
			$this->id 				= null;
			$this->rut  			= null;
			$this->mantenimiento 	= null;
			$this->factork 			= null;
			$this->fecha  			= null;
			$this->nombre			= null;
			$this->ubicacion 		= null;
			$this->latitud 			= null;
			$this->longitud 		= null;
			$this->potenciadiaria	= null;
			$this->valorkw 			= null;
			$this->estado			= null;
			$this->tipo 			= null;
		}
	}

	public function registrar ($id , $rut , $mantenimiento , $factork, $fecha , $nombre, $latitud, $longitud, $potenciadiaria, $valorkw, $estado){
		$sql="INSERT INTO PROYECTO (PROY_ID, CL_RUT, MANT_ID, FACK_ID, PROY_FECHA, PROY_NOMBRE, PROY_LATITUD, PROY_LONGITUD, PROY_POTENCIADIARIA, PROY_VALORKW, PROY_ESTADO) VALUES ('$id','$rut','$mantenimiento','$factork','$fecha','$nombre','$latitud','$longitud', '$potenciadiaria','$valorkw','$estado')";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function registrarSimple ( $cliente , $nombre , $ubicacion , $latitud , $longitud , $tipo ) {
		$sql="INSERT INTO PROYECTO ( CL_RUT , PROY_NOMBRE , PROY_UBICACION , PROY_LATITUD , PROY_LONGITUD , PROY_TIPOCALCULO , PROY_FECHA , PROY_ESTADO )
				VALUES ( '$cliente' , '$nombre' , '$ubicacion' , $latitud , $longitud , $tipo , '".date("Y-m-d")."' , 0);";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function modificar ( $cliente , $nombre , $ubicacion , $latitud , $longitud , $tipoProyecto ){
		$sql="DELETE FROM ART_PERTENECE_PROY WHERE PROY_ID = $this->id;";
		$link = new Conexion ( );
		if ( $link->query( $sql ) ) {
			$sql="DELETE FROM PROY_TIENE_PROD WHERE PROY_ID = $this->id;";
			$link = new Conexion ( );
			if ( $link->query( $sql ) ) {
				$link = new Conexion ( );
				$sql="UPDATE PROYECTO 
						SET CL_RUT				= 	'$cliente',
							PROY_NOMBRE			=	'$nombre',
							PROY_UBICACION		=	'$ubicacion',
							PROY_LATITUD		=	$latitud, 
							PROY_LONGITUD		=	$longitud,
							PROY_ESTADO			=	0,
							PROY_TIPOCALCULO	=	$tipoProyecto,
							PROY_FECHA			=	'".date("Y-m-d")."',
							MANT_ID 			= 	null,
							FACK_ID 			=	null,
							PROY_POTENCIADIARIA	=	null,
							PROY_VALORKW		=	null
						WHERE PROY_ID = $this->id;";		
				return $link->query( $sql );
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function eliminar( ) {
		$sql="UPDATE PROYECTO SET PROY_ESTADO = 3 WHERE PROY_ID = '$this->id'";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function getListado ( ) {
		$sql = "SELECT P.PROY_ID, P.PROY_NOMBRE, C.CL_RAZONSOCIAL, P.PROY_ESTADO, P.PROY_TIPOCALCULO, P.CL_RUT
				FROM PROYECTO P INNER JOIN CLIENTE C ON C.CL_RUT = P.CL_RUT
				ORDER BY PROY_ESTADO";
		$link = new Conexion ( );
		$array = $link->getObj( $sql );
		return $array;
	}

	public function clientWebServices ( ) {
		$param = "api_key=".API_KEYs_WS."&lat=".(int)($this->latitud*-1)."&lon=".(int)($this->longitud-40);

		echo $param."<br>";
		$array = array();
	}

	public function getId( ) {
		return $this->id;
	}

	public function getRut( ) {
		return $this->rut;
	}

	public function getMantenimiento( ) {
		return $this->mantenimiento;
	}

	public function getFactork( ) {
		return $this->factork;
	}

	public function getFecha( ) {
		return $this->fecha;
	}

	public function getNombre( ) {
		return $this->nombre;
	}

	public function getLatitud( ) {
		return $this->latitud;
	}	

	public function getLongitud( ) {
		return $this->longitud;
	}

	public function getPotenciadiaria( ) {
		return $this->potenciadiaria;
	}

	public function getValorkw( ) {
		return $this->valorkw;
	}

	public function getEstado( ) {
		return $this->estado;
	}

	public function getUbicacion() {
		return $this->ubicacion;
	}

	public function getTipo() {
		return $this->tipo;
	}

}
?>