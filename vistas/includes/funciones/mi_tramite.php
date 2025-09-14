<?php 



function miTramite($id){
	//recibe user, fecha

$fecha= date('Y-m-d');
$fec= $fecha . "%";


try {
	
	include_once ('bd_conexion.php');

	date_default_timezone_set("America/Argentina/Buenos_Aires");


	$sql="SELECT id_tipo_tramite, tramite_id FROM registrados where fecha_registro like '$fec' and id_registrado=$id ";
	$resultado = mysqli_query($conn, $sql);

} catch (Exception $e) {
	    echo "Error!!!".$e->getMessage()."<br>";	
}

$rta=mysqli_fetch_assoc($resultado);

var_dump($rta);

return $rta;

//fin function
}


//llamada:

$prueba=miTramite(214);
echo "<BR> TIPO_TRAM: " . $prueba['id_tipo_tramite'];
echo "<BR> TRAM: " . $prueba['tramite_id'];



 ?>