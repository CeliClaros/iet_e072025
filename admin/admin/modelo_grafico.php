<?php 

	class Modelo_Grafico{						//class Donut_Chart{
		private $conexion;
		function __construct(){
			require_once('funciones/funciones.php');
			$this->conexion= new conexion();
			$this->conexion->conectar();
		}

		function ConsultaDatosGrafico(){
			$sql= "SELECT * FROM registrados;";
			$arreglo = array();

			if ($consulta = $this->conexion->conexion->query($sql)) {

				while ($consulta_vu = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_vu;
					# code...
				}
				return $arreglo;
				$this->conexion->cerrar();
				# code...
			}


		}





	}

 ?>