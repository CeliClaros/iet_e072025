<?php 

    //include_once 'funciones/sesiones.php';
    include_once 'funciones/funciones.php';

//calcula TOTAL: 
$total="SELECT COUNT(*)id_registrado FROM registrados WHERE fecha_registro LIKE '2021-08-18%';";

/* doc:
$result = mysqli_query($mysqli, $sql);
$fila = mysqli_fetch_assoc($result);  */

$result = mysqli_query($conn, $total);
$rows = mysqli_fetch_assoc($result);   //TOTAL
//echo "<br>" . "TOTAL: ".  $rows['id_registrado'];   //muestra.-
$filas=$rows['id_registrado'];

//$ver_rows = mysqli_fetch_assoc($result);

//echo $ver_total['id_registrado'];

/*
//inicializa el arreglo final: 
$donut = array(
	'iniciados' => $iniciados , 
	'finalizados' => $finalizados , 
	'waiting' => $espera, 
	'ausentes' => $ausente, 
	'cancelados' => $cancelado, 
	'error' => $error
		); */

$donut=array();



	 $iniciado=0;
	 $finalizado=0; 
	
	 $espera=0; 
	 $ausente=0; 
	 $cancelado=0; 
	 $error=0; 
		
//PORCENTAJE RESERVAS CON STATUS INICIADO:
$cant= "SELECT COUNT(*) id_registrado FROM registrados WHERE fecha_registro LIKE '2021-08-18%' AND status_turno=2";
$resultado= mysqli_query($conn, $cant);
$cant_ini = mysqli_fetch_assoc($resultado);
$inicial= $cant_ini['id_registrado'];

$iniciado= obtenerPorcentaje($inicial);

/* muestra:
if($inicial >0){
echo "<br>" . "INICIADO" . obtenerPorcentaje($inicial);

$iniciado= obtenerPorcentaje($inicial);

}else{ echo "<br>" . "Cant. INICIADO: " . $inicial;}  //fin muestra.-
*/

//FIN PORCENTAJE RESERVAS CON STATUS INICIADO

//----------------------------

//PORCENTAJE RESERVAS CON STATUS FINALIZADO:

$cfinal= "SELECT COUNT(*) id_registrado FROM registrados WHERE fecha_registro LIKE '2021-08-18%' AND status_turno=3";
$resultado= mysqli_query($conn, $cfinal);
$c_final = mysqli_fetch_assoc($resultado);
$cant_final=$c_final['id_registrado'];

$finalizado= obtenerPorcentaje($cant_final);

/*muestra:
if($cant_final >0){
echo "<br>" . "FINALIZADO" . obtenerPorcentaje($cant_final);
$finalizado= obtenerPorcentaje($cant_final);
}else{ echo "<br>" . "Cant. FINALIZADO: " . $cant_final;}  //fin muestra.-
*/
//FIN PORCENTAJE RESERVAS CON STATUS FINALIZADO.-

//PORCENTAJE RESERVAS CON STATUS en espera:

$cespera= "SELECT COUNT(*) id_registrado FROM registrados WHERE fecha_registro LIKE '2021-08-18%' AND status_turno=1";
$resultado= mysqli_query($conn, $cespera);
$c_espera = mysqli_fetch_assoc($resultado);
$cant_espera=$c_espera['id_registrado'];

$espera= obtenerPorcentaje($cant_espera);

/*muetra:
if($cant_espera >0){
echo "<br>". "Cant. en " . "ESPERA: ". obtenerPorcentaje($cant_espera);
$espera= obtenerPorcentaje($cant_espera);
} else{ echo "<br>" . "Cant. en espera: " . $cant_espera;}		//Fin muestra.-

*/


//FIN PORCENTAJE RESERVAS CON STATUS en espera.-



//PORCENTAJE RESERVAS CON STATUS AUSENTE:

$causente= "SELECT COUNT(*) id_registrado FROM registrados WHERE fecha_registro LIKE '2021-08-18%' AND status_turno=4";
$resultado= mysqli_query($conn, $causente);
$c_ausente = mysqli_fetch_assoc($resultado);
$cant_ausente=$c_ausente['id_registrado'];

$ausente= obtenerPorcentaje($cant_ausente);

/*muestra:
if($cant_ausente >0){
echo "<br>" . "AUSENTE: ". obtenerPorcentaje($cant_ausente);
$ausente= obtenerPorcentaje($cant_ausente);
} else{ echo "<br>" . "AUSENTE: " . $cant_ausente;}			//fin muestra.-

*/

//FIN PORCENTAJE RESERVAS CON STATUS AUSENTE.-

//PORCENTAJE RESERVAS CON STATUS CANCELADO:

$ccancel= "SELECT COUNT(*) id_registrado FROM registrados WHERE fecha_registro LIKE '2021-08-18%' AND status_turno=6";
$resultado= mysqli_query($conn, $ccancel);
$c_cancel = mysqli_fetch_assoc($resultado);
$cant_cancelados=$c_cancel['id_registrado'];

$cancelado= obtenerPorcentaje($cant_cancelados);

/* muestra: 
if($cant_cancelados >0){
echo "<br>" . "CANCELADO: ". obtenerPorcentaje($cant_cancelados);
$cancelado= obtenerPorcentaje($cant_cancelados);
} else{ echo "<br>" . "CANCELADO: " . $cant_cancelados;}  //fin muestra.-

*/
//FIN PORCENTAJE RESERVAS CON STATUS CANCELADO.-

//PORCENTAJE RESERVAS CON STATUS ERROR:

$cerror= "SELECT COUNT(*) id_registrado FROM registrados WHERE fecha_registro LIKE '2021-08-18%' AND status_turno=5";
$resultado= mysqli_query($conn, $cerror);
$c_error = mysqli_fetch_assoc($resultado);
$cant_error=$c_error['id_registrado'];


$error= obtenerPorcentaje($cant_error);
/*muestra: 
if($cant_error >0){
echo "<br>" . "ERROR: ". obtenerPorcentaje($cant_error);
$error= obtenerPorcentaje($cant_error);
} else{ echo "<br>" . "ERROR: " . $cant_error;}			//fin muestra
*/

//FIN PORCENTAJE RESERVAS CON STATUS ERROR.-



 function obtenerPorcentaje($cantidad) {
    global $rows;
    $total = (float)$rows['id_registrado'];				//(float)$row['total']; // Obtener total de la base de datos
    $porcentaje = ((float)$cantidad * 100) / $total; // Regla de tres
    $porcentaje = round($porcentaje, 0);  // Quitar los decimales
    return $porcentaje;
}  


$donut = array(
	'iniciados' => $iniciado , 
	'finalizados' => $finalizado , 
	'waiting' => $espera, 
	'ausentes' => $ausente, 
	'cancelados' => $cancelado, 
	'error' => $error
		);


//var_dump($donut);
echo json_encode($donut);


/*
 function obtenerPorcentaje($cantidad) {
    global $rows;
    $total = (float)$row['total']; // Obtener total de la base de datos
    $porcentaje = ((float)$cantidad * 100) / $total; // Regla de tres
    $porcentaje = round($porcentaje, 0);  // Quitar los decimales
    return $porcentaje;
}  






$x= "SELECT COUNT(*) id_registrado FROM registrados WHERE fecha_registro LIKE '2021-08-18%' AND status_turno=2";

$result_x = mysqli_query($conn, $x);
$ver_x = mysqli_fetch_assoc($result_x);

echo $ver_x['id_registrado'];

 $percent= ($ver_x * 100) / $ver_total;
 echo $percent;


*/
/*
$resultado_total = $conn->query($total);
echo "total: " ; 
$ver= $resultado_total->fetch_assoc();
echo $ver; 

$incognita= "SELECT COUNT(id_registrado) FROM registrados WHERE fecha_registro LIKE '2021-08-18%' AND status_turno=2";

$resultado_x = $conn->query($incognita);

echo "<br>". "X: " . $resultado_x;

$status_iniciado=ROUND($incognita*100/$total);


echo "<br>". "status IProgress: " . $status_iniciado;


*/
/*
 $sql= "SELECT COUNT(*) id_registrado FROM registrados WHERE fecha_registro like '$fecha2'  AND  status_turno = 1  AND id_tipo_tramite ='$id_tram'";


$result = mysqli_query($mysqli, $sql);
$fila = mysqli_fetch_assoc($result);
*/
/*



$sql= "SELECT fecha_registro, COUNT(*) AS resultado FROM registrados WHERE fecha_registro LIKE '2021-08%' GROUP BY DATE(fecha_registro) ORDER BY fecha_registro"; 

$resultado = $conn->query($sql);


$arreglo_registros= array();
while($registro_dia = $resultado->fetch_assoc()){

	$fecha = $registro_dia['fecha_registro'];


$registro['fecha'] = date('Y-m-d', strtotime($fecha));
$registro['cantidad'] = $registro_dia['resultado'];


$arreglo_registros[]= $registro;
}  //fin while
//var_dump($registro);

//var_dump($arreglo_registros);  //devuelve un SOLO ARREGLO CON TODOS LOS RESULTADOS!!!!

//var_dump(json_encode($arreglo_registros));		//CONVIERTE EL SOLO ARREGLO A JSON.

echo json_encode($arreglo_registros);

//var_dump(json_encode($registro_dia));
*/