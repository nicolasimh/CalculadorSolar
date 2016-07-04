<?php
require_once ('Conexion.php');


Class ART_PERTENECE_PROY {

	private $idArtefacto;
	private $idProyecto;
	private $idCorreccion;
	private $cantidad;
	private $horas;


	function __construct ( $id ) {

		if ( $id != null ) {
			$link = new Conexion ( );
			$sql = "SELECT * FROM ART_PERTENECE_PROY WHERE (ART_ID = '$idArtefacto' AND PROY_ID = '$idProyecto' AND CORR_ID = '$idCorreccion')";
			$result = $link->getObj( $sql );
			$this->idArtefacto	= $result[0]->ART_ID;
			$this->idProyecto 	= $result[0]->PROY_ID;
			$this->idCorreccion	= $result[0]->CORR_ID;
			$this->cantidad 	= $result[0]->APY_CANTIDAD;
			$this->horas 		= $result[0]->APY_HORAS;
			
		} else {
			$this->idArtefacto	= null;
			$this->idProyecto 	= null;
			$this->idCorreccion = null;
			$this->cantidad 	= null;
			$this->horas 		= null;

		}
	}

	public function registrar ( $idArtefacto , $idProyecto , $idCorreccion ,$cantidad , $horas) {
		$sql="INSERT INTO ART_PERTENECE_PROY ( ART_ID , PROY_ID , CORR_ID ,APY_CANTIDAD , APY_HORAS) VALUES ('$idArtefacto', '$idProyecto' , '$idCorreccion' ,'$cantidad','$horas')";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function modificar ( $idArtefacto, $idProyecto, $idCorreccion , $cantidad , $horas ) {

		$sql="UPDATE ART_PERTENECE_PROY SET APY_CANTIDAD = '$cantidad' , APY_HORAS = '$horas'  WHERE (ART_ID = '$idArtefacto' AND PROY_ID = '$idProyecto' AND CORR_ID = '$idCorreccion')";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function eliminar( ) {
		$sql="DELETE FROM ART_PERTENECE_PROY WHERE (ART_ID = '$idArtefacto' AND PROY_ID = '$idProyecto' AND CORR_ID = '$idCorreccion')";
		$link = new Conexion ( );
		return $link->query( $sql );
	}

	public function getListado ( ) {
		$sql = "SELECT * FROM ART_PERTENECE_PROY";
		$link = new Conexion ( );
		$array = $link->getObj( $sql );
		return $array;
	}

	public function getIdArtefacto( ) {
		return $this->idArtefacto;
	}

	public function getIdProyecto( ) {
		return $this->idProyecto;
	}

	public function getIdCorreccion( ) {
		return $this->idCorreccion;
	}

	public function getCantidad( ) {
		return $this->cantidad;
	}

	public function getHoras( ) {
		return $this->horas;
	}
}
?>