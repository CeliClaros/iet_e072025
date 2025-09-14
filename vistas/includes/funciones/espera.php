<?php 
//$usuario=$_SESSION['']

/*
	$id_registrado= $_SESSION['id_registrado'];
    $nombre= $_SESSION['nombre']; 
    $apellido= $_SESSION['apellido'];
    $dni= $_SESSION['dni'];
    $usuario= $_SESSION['email'];
*/



function espera(){

$id_registrado=211;  // DATO DE PRUEBA!!!!

try {
	

   require_once('bd_conexion.php');  

/*
$sql= "SELECT COUNT(id_registrado) as 'count' FROM registrados WHERE fecha_registro like '$fecha2' AND status_turno=1 AND id_tipo_tramite=$id_tram";  //" AND tramite_id='$tram' "; //AND status_turno=1 AND id_tipo_tramite=$id_tram";   //AND tramite_id = '$tram' ";  //$id_tram"; // AND id_tipo_tramite =$id_tram";

SELECT count(id_registrado) as cant FROM `registrados` WHERE id_registrado < 206 and fecha_registro like now()
        	    $resultado = mysqli_query($conn, $sql);

*/


$qry="SELECT count(id_registrado) as count FROM `registrados` WHERE day(fecha_registro) = day(now()) and month(fecha_registro)= month(now()) and id_registrado < $id_registrado"; 

$resultado = mysqli_query($mysqli, $qry);


//SELECT * FROM `registrados` WHERE day(fecha_registro) = day(now()) and month(fecha_registro)= month(now())

//SELECT count(id_registrado) as cant FROM `registrados` WHERE day(fecha_registro) = day(now()) and month(fecha_registro)= month(now()) and id_registrado < 207 

/*
select YEAR(NOW());  #Selecciona el año
select MONTH (NOW()) as mes;  #Selecciona el mes
select DAY(NOW()) as dia; #Selecciona el día
select TIME(NOW()) as hora;  #Selecciona la hora
Select LAST_DAY(NOW()); # Selecciona el ultimo dia del mes


--SUMA TIEMPO:

select DATE_ADD(NOW(),INTERVAL 20 DAY); # Agrega 20 días a la fecha actual
select DATE_ADD(NOW(),INTERVAL 30 MINUTE); # Agrega 30 minutos a la fecha actual
select DATE_ADD(NOW(),INTERVAL 50 YEAR); #Agrega 50 años a la fecha actual
select DATE_ADD(NOW(),INTERVAL '10-5' YEAR_MONTH); #Agrega 10 años 5 meses a la fecha actual


--RESTA TIEMPO:
select DATE_SUB(NOW(),INTERVAL 8 YEAR); #Resta 8 años a la fecha actual
select DATE_SUB(NOW(),INTERVAL 24 HOUR); #Resta 24 horas a la fecha actual
select DATE_SUB(NOW(),INTERVAL '7-2' YEAR_MONTH); #Resta 7 años dos meses a la fecha actual


SELECT DATEDIFF(NOW(),'2002-11-02'); #cuantos días han pasado
SELECT DATEDIFF(NOW(),'2010-03-20'); #Cuantos días faltan

https://www.gruponw.com/noticias-de-colombia-y-el-mundo/nwarticle/228/13/Fechas+con+MySql+-+extraer+sumar+o+restar
        	    */

} catch (Exception $e) {
	 echo "Error!!!".$e->getMessage()."<br>";
}



$total= mysqli_fetch_assoc($resultado);
$cont= intval($total['count']);
$minutos= $cont * 10;
#echo "<br>.MINUTOS: " .  $minutos;

#echo "<br>";

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
}


$prueba= espera();
var_dump($prueba);

 ?>