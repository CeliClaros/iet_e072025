<?php 

function userID($mail){
//recibe mail del usuario que iniciò sesiòn
	//$email= $_SESSION['email'];
	//$email= "prueba@mail.com";
$email=$mail;

$fecha= date('Y-m-d');
$fec= $fecha . "%";

try{

	include_once ('bd_conexion.php');

	date_default_timezone_set("America/Argentina/Buenos_Aires");


	$sql="SELECT * FROM registrados where fecha_registro like '$fec' and email='$email'";
	$resultado = mysqli_query($conn, $sql);


} catch (Exception $e) {
    //throw $th;
    echo "Error!!!".$e->getMessage()."<br>";
    //return false;
}


$total= mysqli_fetch_all($resultado);
//$total= mysqli_fetch_assoc($resultado);

/*

	$sql="SELECT count(id_registrado) FROM registrados where fecha_registro like '$fec' and id_tipo_tramite= $";
	$cantidad = mysqli_query($conn, $sql);


	$sql="SELECT min(id_registrado) FROM registrados where fecha_registro like '$fec'";
	$minimo = mysqli_query($conn, $sql);





$cant=mysqli_fetch_all($cantidad);
echo "<br>" . "cant: " . $cant;

$min= mysqli_fetch_all($minimo);
echo "<br>" . "min: " . $min;


*/

echo "ID:" . $total[0][0] ;

var_dump($total);

$id=$total[0][0];
//return $total;
return $id;

/*
$sql= "SELECT COUNT(id_registrado) as 'count' FROM registrados 
WHERE fecha_registro like '$fecha2' AND status_turno=1 AND id_tipo_tramite=$id_tram";  //" AND tramite_id='$tram' "; //AND status_turno=1 AND id_tipo_tramite=$id_tram";   //AND tramite_id = '$tram' ";  //$id_tram"; // AND id_tipo_tramite =$id_tram";
*/

}		//fin function 



/* &&&&&&&&&&&&&&&&
	//VALIDACION FUNCION userID:
//llamada a la funcion:

$prueba=userID();
echo "ID del user: " . $prueba;
//FIN VALIDACION
*/

//echo "ID:" . $prueba[0][0] . "<br>" . $prueba[1][5];
//echo $prueba[0][5] . "<br>" . $prueba[1][5];			//['fecha_registro'];

 ?>