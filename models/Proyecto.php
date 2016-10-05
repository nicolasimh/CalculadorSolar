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

	function __construct ( $id ) {

		if ( $id != null ) {
			$link = new Conexion ( );
			$sql = "SELECT * FROM PROYECTO WHERE PROY_ID = '$id'";
			$result = $link->getObj( $sql );
			print_r($result);
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

	public function modificar ($id , $rut , $mantenimiento , $factork, $fecha , $nombre, $latitud, $longitud, $potenciadiaria, $valorkw, $estado){

		$sql="UPDATE PROYECTO SET CL_RUT= '$rut', MANT_ID='$mantenimiento', FACK_ID='$factork', PROY_FECHA='$fecha', PROY_NOMBRE='$nombre', PROY_LATITUD='$latitud', PROY_LONGITUD='$longitud', PROY_POTENCIADIARIA='$potenciadiaria', PROY_VALORKW='$valorkw', PROY_ESTADO='$estado' WHERE PROY_ID = '$id'";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function eliminar( ) {
		$sql="DELETE FROM PROYECTO WHERE PROY_ID = '$this->id'";
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

	public function getLEstado( ) {
		return $this->estado;
	}

	public function getUbicacion() {
		return $this->ubicacion;
	}

}
?>