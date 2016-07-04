<?php
require_once ('Conexion.php');


Class INFORME {

	private $id;
	private $idProyecto;
	private $nombre;
	private $url;


	function __construct ( $id ) {

		if ( $id != null ) {
			$link = new Conexion ( );
			$sql = "SELECT * FROM INFORME WHERE INF_ID = '$id'";
			$result = $link->getObj( $sql );
			$this->id 			= $result[0]->INF_ID;
			$this->idProyecto 	= $result[0]->PROY_ID;
			$this->nombre 		= $result[0]->INF_NOMBRE;
			$this->url 			= $result[0]->INF_URL;
			
		} else {
			$this->id 			= null;
			$this->idProyecto 	= null;
			$this->nombre 		= null;
			$this->url 			= null;

		}
	}

	public function registrar ( $id , $idProyecto , $nombre , $url) {
		$sql="INSERT INTO INFORME ( INF_ID , PROY_ID , INF_NOMBRE , INF_URL) VALUES ('$id', '$idProyecto' ,'$nombre','$url')";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function modificar ( $id , $nombre , $url ) {

		$sql="UPDATE INFORME SET INF_NOMBRE = '$nombre' , INF_URL = '$URL'  WHERE INF_ID = '$id'";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function eliminar( ) {
		$sql="DELETE FROM INFORME WHERE INF_ID = '$this->id'";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function getListado ( ) {
		$sql = "SELECT * FROM INFORME ORDER BY INF_NOMBRE";
		$link = new Conexion ( );
		$array = $link->getObj( $sql );
		return $array;
	}

	public function getId( ) {
		return $this->id;
	}

	public function getIdProyecto( ) {
		return $this->idProyecto;
	}

	public function getNombre( ) {
		return $this->nombre;
	}

	public function getUrl( ) {
		return $this->url;
	}
}
?>