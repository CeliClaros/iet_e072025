
<?php 
//*******************************************************
//formulario con select que trae los tramites

/*

Modelo: tb registrados, tb usuarios??
        Buscar los eventos del mismo día y categoría.
        Buscar los eventos de días anteriores para sacar promedio (Lo hace el SP)
        

vista:  * Punto de Menú: ..
        * Muestra la lista de trámites posible devuelve el resultado de controller que calcula el tiempo de espera según eventos anteriores reservados.

Controller: Disponibilidad: calcular con SP la cantidad de tiempo de espera según eventos previos reservados para ese mismo tipo de categoría de evento.
    Contenido:
    * Llamado a SP que calcula el promedio de tiempo. 
        Requiere: 
        Conectar con el modelo "tb_registrados", Pedir y Recibir los eventos del mismo día y categoría.
        Recibir los eventos de días anteriores para sacar promedio (Lo hace el SP)

*/




//********************************************************
//function tramites(){}
//fin select
//CAMBIO: SE DESCOMENTA:

//20250507:  require_once "/../selecciona_envia.php";
?>

<?php 

							/*
if (isset($_GET['tram'])) {
	# code...
	echo "<br>" . "recibe el hidden";
}
if (isset($_GET['tramites'])) {
	# code...
$tramite_seleccionado= intval($_GET['tramites']);
	//echo "<br>" . "TRAMITE POR GET: " . $tramite_seleccionado;
	echo "<br>" . "tramite????: " . $_GET['tramites'][0];
	$tramite=$_GET['tramites'][0];

								*/

/*
//ini tipo_tram:

	if(isset($tramite)){
		$tram=$tramite;
          echo "valor recibido tram" . $tramite;
if ($tram >=5 && $tram <= 8) {
//   echo "id_tram: ". $id_tram=1;
  $id_tram=1;
 }
 elseif ($tram >=9 && $tram <= 12 ) {
     $id_tram=2;
 }elseif ($tram >=13 && $tram <= 16) {
     $id_tram=3;
 }


*/






//fin tipo_tram

//				var_dump($tramite_seleccionado);
 //}  //fin if(tramite)

//return $

function pronostica($tram){

//TIPO TRAMITE:

	if(isset($tram)){
                                     //echo "valor recibido tram" . $tram;
if ($tram >=5 && $tram <= 8) {
//   echo "id_tram: ". $id_tram=1;
  $id_tram=1;
 }
 elseif ($tram >=9 && $tram <= 12 ) {
     $id_tram=2;
 }elseif ($tram >=13 && $tram <= 16) {
     $id_tram=3;
 }
}else{ echo "no se recibio valor tram seleccionado!!";}

//fin tipo tramite

date_default_timezone_set("America/Argentina/Buenos_Aires");


$fecha1= (date('Y-m-d'));
//$fecha1= "2022-05-28";

//$fecha1= "2022-01-21";
//echo $fecha1;
$fecha2= $fecha1 ."%";
 /* */

    


        require_once('includes/funciones/bd_conexion.php');  
    try {


        //require_once('bd_conexion.php');  
  require_once('includes/funciones/bd_conexion.php');  

$sql= "SELECT COUNT(id_registrado) as 'count' FROM registrados WHERE fecha_registro like '$fecha2' AND status_turno=1 AND id_tipo_tramite=$id_tram";  //" AND tramite_id='$tram' "; //AND status_turno=1 AND id_tipo_tramite=$id_tram";   //AND tramite_id = '$tram' ";  //$id_tram"; // AND id_tipo_tramite =$id_tram";


        	    $resultado = mysqli_query($conn, $sql);

// var_dump($resultado);

//$valores = mysqli_fetch_assoc($resultado);
//var_dump($valores);

} catch (Exception $e) {
    //throw $th;
    echo "Error!!!".$e->getMessage()."<br>";
    //return false;
}

//CANTIDAD TOTAL DE REGISTRADOS DE ESA CATEGORÍA DE EVENTO:

$total= mysqli_fetch_assoc($resultado);
$cont= intval($total['count']);

		//		$minutos= $cont * 10;

// SPROCEDURE: 08/05
$prom = mysqli_query($mysqli, "CALL SP_PROMEDIOxTpoEVENTO_tbOPERACION");


//$mysqli = new mysqli("localhost", "root", "", "iet");

        // 04 abril2025:   $mysqli = new mysqli('localhost', 'celina_dba', 'GxDm7aR1gCCq', 'celina_iet');	

// $sql= "SELECT COUNT(*) id_registrado FROM registrados WHERE fecha_registro like '$fecha2'  AND  status_turno = 1  AND id_tipo_tramite ='$tipo_tramite'";
//$query= "CALL SP_PROMEDIOxTpoEVENTO_tbOPERACION";
//$prom=  mysqli_query($mysqli, $query);

// 04 abril2025:
//$prom = mysqli_query($mysqli, "CALL SP_PROMEDIOxTpoEVENTO_tbOPERACION");


//$promedio = mysqli_fetch_assoc($prom);

$promedio = mysqli_fetch_row($prom);
//var_dump($promedio);

// validaciones:  echo "RESULTADO DEL STORE SP EN MINUTOS:  "; echo $promedio[0];

$minutos= $cont * $promedio[0];




//if(id_registrado){     //Validar que el usuario de la sesiòn tenga tramite reservado, en ese caso restar uno a $minutos
//espera_minutos -1
  //$minutos=$minutos-1;
//}
/*echo "MUESTRA LA ESPERA:";
echo "<br>.MINUTOS: " .  $minutos;

#echo "<br>";
*/
//DEVUELVE ARRAY ASOCIATIVO CON CANTIDAD DE TURNOS ANTERIORES Y MINUTOS DE DEMORA:
$espera= array();
$espera[]=array(
    'hoy' => date('Y-m-d,H:i:s'),
//    'result' => $result,
    'cant' => $cont,
    'minutos' => $minutos,
    'espera'  => date("i:s", $minutos), //);
    'tram' => $tram,
    'tipo_tramite' => $id_tram,
    'fecha' => $fecha2);



return $espera;


}		//fin de la funcion pronostica.

?>
<?php 



if (isset($_GET['tram'])) {
	# code...
	                   //    echo "<br>" . "recibe el hidden";
//}
	


if (isset($_GET['tramites'][0])) {


						//if (isset($_GET['tramites'])) {
	# code...
							//$tramite_seleccionado= intval($_GET['tramites']);
	//echo "<br>" . "TRAMITE POR GET: " . $tramite_seleccionado;
//VER RESULTADO TRAMITE ID:   echo "<br>" . "tramite????: " . //$_GET['tramites'][0];
	
	$tramite=$_GET['tramites'][0];


//llamada de la funcion pronostica con el tramite seleccionado:
$pronostico= pronostica($tramite);   // VER 2024!!!!


//rta de la funcion pronostico:
//VER RESULTADO: 

//var_dump($pronostico);
/*
echo "<br>" . "PRONOSTICO: " . $pronostico[0]['cant'] . "  CANTIDAD en espera";
echo "<br>" . "PRONOSTICO: " . $pronostico[0]['minutos'] . "  minutos";
echo "<br>" . "PRONOSTICO: " . $pronostico[0]['espera'] . "  HH:MINUTOS";
*/
//$rta= json_encode($espera);

$rta= json_encode($pronostico);

			///COMENTADO, PRUEBA 13/DIC/2024:    
			
		//	header ("Location: /../selecciona_envia.php?rta=$rta");
			//header ("Location: /IET_E01/selecciona_envia.php?rta=$rta");
			//header ("Location: /public_html/selecciona_envia.php?rta=$rta");
            //   /home/celina/public_html/includes/funciones/pronostica.php
 //header ("Location: /home/celina/public_html/selecciona_envia.php?rta=$rta");
 header ("Location: /celina/public_html/selecciona_envia.php?rta=$rta");
  


}

//fin if hidden tram>>>
}else{if(isset($_GET['reserva'])) {
//funcion reserva:
//llamada a funcion reserva.

echo "Entro por reserva!!";
}
} //fin function reserva.

?>



<!--

					<a href="pronostico.php?tramite="tramite.value class="button">Verificar Status</a>  
 --> 
          <?php // 28/05 echo "tramite selected: " . $id . " " . $tram . "<br>";  ?>

<!--   28/05:  
<button type="submit" name="envio" value="pronostico.php">Envio</button>    -->

<!--
				<input type="submit" onclick="this.form.action='pronostico.php?tramite='"<?php echo $id; ?>>
-->

<!-- prueba() es una fcion en js
<a href="pronostico.php?tramite="<?php echo $id; ?> class="button" onclick="prueba()">Verificar Status</a>     -->



<!-- ES EL OFICIAL: POR AHORA
<a href="pronostico.php?tramite="<?php echo $id; ?> class="button">Probar Envio</a>  
-->


<!--
<button type="submit" name="envio" value="tiempo_espera8.php">Envio</button>  -->


<!-- 28/05: 
<a href="pronostico.php?tramite="<?php echo $id; ?> class="button" onclick="prueba()">Verificar Status</a>  



















}













//funcion pronostico: Calcula cantidad de tramites registrados del mismo tipo.

//$tram=$_POST['tramite']






function pronostica($tram){

if(isset($tram)){
          echo "valor recibido tram" . $tram;
if ($tram >=5 && $tram <= 8) {
//   echo "id_tram: ". $id_tram=1;
  $id_tram=1;
 }
 elseif ($tram >=9 && $tram <= 12 ) {
     $id_tram=2;
 }elseif ($tram >=13 && $tram <= 16) {
     $id_tram=3;
 }
$prueba = array('tram' => $tram,'tipo_tram' => $id_tram );

}else{ echo "no se recibio valor tram seleccionado!!";}
//$rta=json_encode($prueba, true);
//return $prueba;
//return $rta;


//inicia consulta de los Eventos registrados en espera con fecha hoy:
date_default_timezone_set("America/Argentina/Buenos_Aires");

$fecha1= (date('Y-m-d'));
//$fecha1= "2022-01-21";
//echo $fecha1;
$fecha2= $fecha1 ."%";

    try {

        require_once('includes/funciones/bd_conexion.php');  
	//	require_once('bd_conexion.php'); 

    $sql= "SELECT COUNT(id_registrado) as 'count' FROM registrados WHERE fecha_registro like '$fecha2' ";
     //" AND tramite_id='$tram' "; //AND status_turno=1 AND id_tipo_tramite=$id_tram";   //AND tramite_id = '$tram' ";  //$id_tram"; // AND id_tipo_tramite =$id_tram";

$resultado = mysqli_query($conn, $sql);

// var_dump($resultado);

//$valores = mysqli_fetch_assoc($resultado);
//var_dump($valores);

} catch (Exception $e) {
    //throw $th;
    echo "Error!!!".$e->getMessage()."<br>";
    //return false;
}



//ejecuta query:
$total= mysqli_fetch_assoc($resultado);
$cont= intval($total['count']);


/*
CALCULA ESPERA SIN PRONOSTICO SP: DUMMY 
$minutos= $cont * 10;
#echo "<br>.MINUTOS: " .  $minutos;

#echo "<br>";
*/
//DEVUELVE ARRAY ASOCIATIVO CON CANTIDAD DE TURNOS ANTERIORES Y MINUTOS DE DEMORA:
$espera= array();
$espera[]=array(
    'hoy' => date('Y-m-d,H:i:s'),
//    'result' => $result,
    'cant' => $cont,
    'minutos' => $minutos,
    'espera'  => date("i:s", $minutos), //);
    'tram' => $tram,
    'tipo_tramite' => $id_tram,
    'fecha' => $fecha2);

return $espera;


/*

$rta= json_encode($espera);  //24/01/2021: mete todo en json pero no se como mostrarlo por GET cuando vuelve.


// ENVIA LA RESPUESTA 

header ("Location: selecciona-envia.php?$espera");
                //  28/05 


// DEVUELVE LOS DAROS A PAGE DE PRUEBA!!?
//                header ("Location: selecciona-envia.php?rta=$rta");


//


*/





//return ....
} //fin function



//==========0
//llamada a function pronostica:



/*$valida[]=array(
    'hoy' => date('Y-m-d,H:i:s'),
//    'result' => $result,*/
    $tramite=6;




/* VALIDA: 
$valida= array();
$valida=pronostica($tramite);

//$ver=pronostica($tramite);

  //  $ver= json_decode($rta, true);  
    //$ver= json_decode($_GET['rta'], true);  
  

/*
    echo "este es el json con los datos" . print_r($ver->cant); 
    echo "este es el json con los datos" . print_r($ver->tram);
    echo "este es el json con los datos" . print_r($ver->tipo_tram);  
* /


echo "<br>" . "rta de la funcion, print_r:tram: " .  print_r($valida->tram); // . "tipo_tram: ". $valida['tipo_tram'];
echo "<br>" . "rta de la funcion, tram: " .  $valida['tram'] . "tipo_tram: ". $valida['tipo_tram'];
var_dump($valida);



$VALIDA 
*/



$eventos=array();
$eventos=pronostica($tramite);

var_dump($eventos);

echo "<br>" . "Resultado de registrados Hoy. ESPERA: " . $eventos[0]['espera'];

 ?>