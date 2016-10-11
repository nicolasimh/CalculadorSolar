<?php
	class Conexion {

		//Variable que contendrá la conexión a la base de datos
		private $link;

		/*Constructor de la clase conexion, se puede crear de dos maneras 
		1º function __construct ( ) { ... } 
		2º y la otra manera es con el nombre de la clase al igual que JAVA 
		   en este caso seria function Conexion () */
		
		function __construct ( ) {
			$this->link = new mysqli();
		}

		//Funcion que efectua la conexion a la base de datos
		public function conectar ( ) {
			//Se declara la conexion a la base de datos
			$this->link = mysqli_connect( DB_HOST , DB_USER , DB_PASS , DB_NAME );
			//Se valida que la conexión sea exitosa
			if ( mysqli_connect_errno() ) {
				echo 'No se pudo conectar con la base de datos - ERROR: '.mysqli_connect_error();
				exit();
			}
		}

		private function desconectar ( ) {
			$this->link->close();
		}

		//Para operaciones INSERT, UPDATE y DELETE
		public function query ( $sql ) {
			$this->conectar();
			//Ejecuta una consulta en la base de datos 
			if ( $this->link->query($sql) === true ) {
				$this->desconectar();
				return true;
			} else {
				echo 'Error al ejecutar la consulta '.mysqli_error($this->link);
			 	$this->desconectar();
				return false;
			}
		}

		//Para consultas SELECT obtiene parametros como $array[$i]->NOMBRE_CAMPO
		public function getObj ( $sql ) {
			$this->conectar();
			//Pregunto si la consulta tiene errores
			if ( $result = $this->link->query($sql) ) {
				$this->desconectar();
				//pregunto si recibió varios resultados
				if ($result->num_rows > 0) {
					//guardo cada resultado en un campo del arreglo
					while($row = $result->fetch_object()) {
						$array[] = $row;
					}				
					return $array;
				} else {
					return 0;
				}
			} else {
				echo 'Error al ejecutar la consulta '.mysqli_connect_error();
				$this->desconectar();
			}
		}	

		//Para consultas SELECT obtiene parametros como $array[$i]['NOMBRE_CAMPO']
		public function getAssoc ( $sql ) {
			$this->conectar();
			//Pregunto si la consulta tiene errores
			if ( $result = $this->link->query($sql) ) {
				$this->desconectar();
				//pregunto si recibió varios resultados
				if ($result->num_rows > 0) {
					//guardo cada resultado en un campo del arreglo
					while($row = $result->fetch_assoc()) {
						$array[] = $row;
					}				
					return $array;
				} else {
					return 0;
				}
			} else {
				echo 'Error al ejecutar la consulta '.mysqli_connect_error();
				$this->desconectar();
			}
		}

		//Para consultas SELECT obtiene parametros como $array[$i][$j]
		public function getArray ( $sql ) {
			$this->conectar();
			//Pregunto si la consulta tiene errores
			if ( $result = $this->link->query($sql) ) {
				$this->desconectar();
				//pregunto si recibió varios resultados
				if ($result->num_rows > 0) {
					//guardo cada resultado en un campo del arreglo
					while($row = $result->fetch_array()) {
						$array[] = $row;
					}				
					return $array;
				} else {
					return 0;
				}
			} else {
				echo 'Error al ejecutar la consulta '.mysqli_connect_error();
				$this->desconectar();
			}
		}		
	}
?>