<?php
require_once ('Conexion.php');


Class INFORME {

	private $id;
	//falta foranea 
	private $nombre;
	private $url;


	function __construct ( $id ) {

		if ( $id != null ) {
			$link = new Conexion ( );
			$sql = "SELECT * FROM INFORME WHERE INF_ID = '$id'";
			$result = $link->getObj( $sql );
			$this->id 		= $result[0]->INF_ID;
			$this->nombre 	= $result[0]->INF_NOMBRE;
			$this->url 		= $result[0]->INF_URL;
			
		} else {
			$this->id 		= null;
			$this->nombre 	= null;
			$this->url 		= null;

		}
	}

	public function registrar ( $id , $nombre , $url) {
		$sql="INSERT INTO INFORME ( INF_ID , INF_NOMBRE , INF_URL) VALUES ('$id','$nombre','$url')";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function modificar ( $id , $nombre , $url ) {

		$sql="UPDATE INFORME SET INF_NOMBRE = '$nombre' , INF_URL = '$URÇ'  WHERE INF_ID = '$id'";
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

	public function getNombre( ) {
		return $this->nombre;
	}

	public function getUrl( ) {
		return $this->url;
	}


}
?>