<?php 

function pronostico_registrado(){			//($mail='prueba@mail.com'){

//$email=$_SESSION['email'];

$email='prueba@mail.com';
//$email=$mail;

//include_once ('includes/funciones/user_id');

//include_once ('includes/funciones/user_id');

$fecha= date('Y-m-d');
$fec= $fecha . "%";


try {

include_once ('bd_conexion.php');

date_default_timezone_set("America/Argentina/Buenos_Aires");

	$sql="SELECT * FROM registrados where fecha_registro like '$fec' and email ='prueba@mail.com'";
	$resultado = mysqli_query($conn, $sql);

	
} catch (Exception $e) {
	
}

$datos_user=mysqli_fetch_assoc($resultado);
//$datos=mysqli_fetch_all($resultado);

$id_user=$datos_user['id_registrado'];

echo "<br> ID_USER: " . $id_user;
var_dump($datos_user);

//return $datos_user;

//min:

try {

date_default_timezone_set("America/Argentina/Buenos_Aires");
include_once ('bd_conexion.php');



$sql="SELECT * FROM registrados where fecha_registro like '$fec' and id_tipo_tramite = $datos_user[id_tipo_tramite]";
//	$sql="SELECT min(id_registrado) - $id_user FROM registrados where fecha_registro like '$fec' and id_tipo_tramite = $datos_user[id_tipo_tramite]";
//$sql="SELECT min(id_registrado)  FROM registrados where fecha_registro like '2022-08-10%' and id_tipo_tramite = $datos_user[id_tipo_tramite]";
	$min_hoy = mysqli_query($conn, $sql);

//2022-08-10 11:15:57
	
} catch (Exception $e) {
	
}

//$minimo=mysqli_fetch_all($min_hoy);
$todos=mysqli_fetch_all($min_hoy);

$primero= intval($todos[0][0]); 		//primero de hoy.

$cant=intval($id_user) - intval($primero);

echo "<br> cant: " . $cant;
echo "<br> primero: " . $primero;
echo "<br> id_user: " . $id_user;
//minimo[0][0];
 
//var_dump($minimo);
//echo "<br> minimo: " . $minimo[0][0];

//echo "<br> CUANTOS: " . $pronostico_registrado=intval($id_user) - intval($minimo);

//echo "<br> RESTA: " . intval($id_user) - intval($minimo);

//echo "<br> Hay " . $pronostico_registrado . "Eventos en Espera";

/*
$id=user_id("prueba@mail.com");

$datos_tramite=mitramite($id);
$tramite=$datos_tramite['tramite_id'];
$tipo_tramite=$datos_tramite['id_tipo_tramite'];

echo "user_id: " . $id . "<br> tipo_tramite: " . $tipo_tramite . "<br> tramite: " . $tramite; 
*/

}

//fin function


//llamada:

//$rta=pronostico_registrado('prueba@mail.com');

$rta=pronostico_registrado();

echo "<br> tramite" . $rta['tramite_id'];

echo " <br> tipo_tramite: " . $rta['id_tipo_tramite'];

//echo "tramite" . $rta[0]['tramite_id'];






 ?>