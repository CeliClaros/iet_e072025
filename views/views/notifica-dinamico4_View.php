
<?php 
/*EVENTO VIEW MUESTRA CALCULO DE TIEMPO DE ATENCIÓN:
*/
	session_start();
	error_reporting(0);

//VARIABLES DE SESION:

    $nombre= $_SESSION['nombre']; 
    $apellido= $_SESSION['apellido'];
    $dni= $_SESSION['dni'];
    $usuario= $_SESSION['email'];
    //$tramite= $_SESSION['tramite'];
//     $tramite= $_POST['tramite'];

	//require_once 'includes/templates/header.php';
	require_once 'includes/templates/barra-user.php';
	//require_once 'includes/templates/header-barra.php'; // barra para iniciar sesìon User
	require_once 'includes/funciones/bd_conexion.php';
 ?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title></title>
</head>
<body>

<?php 

date_default_timezone_set("America/Argentina/Buenos_Aires");
    $fecha= (date('Y-m-d H:i:s'));
    

 $fecha1= (date('Y-m-d'));
//echo $fecha1;
$fecha2= $fecha1 ."%";


//&&===============================================


//llamada  a function busca():

//$getRegistro= busca($usuario, $password, $fecha2);

$getRegistro= busca($usuario, $fecha2);

 //MUESTRA DE PRUEBA: 		echo "<br>" . "nombre: " . $getRegistro['nombre'];


echo $tram= $getRegistro['tramite_id'];
echo $tipo= $getRegistro['id_tipo_tramite'];

//require_once('includes/funciones/tramite.php');

require_once 'includes/funciones/tramites.php';

$tramite_nms=tramites($tipo, $tram);  //llama a function tramite




//llamar a funcion busaca y pronostico:-----------------------

//echo "<br>" . "DEVOLUCION FUNCION Busca: ";

//llamada busca: 
//$registro = busca($usuario, $password, $fecha2);
$registro = busca($usuario, $fecha2);

//llamada pronostico:
//$datos_espera= pronostico($getRegistro);
$datos_espera= pronostico($registro);

//fin llamadas.-----------------------------------------------

/*IMPRIME PARA PRUEBA:

echo "<br>" . "DEVOLUCION FUNCION Pronostico: ";
echo "<br>" . "TURNOS PREVIOS: " . $datos_espera['cantidad'];
echo "<br>" . "ESPERA: " . $datos_espera['espera'] . "Minutos" ;



*/ //fin impresion de prueba.-

//----------------------
//fin function busca y  pronostico.
//----------------------



// imprime Valores Notificacion: 

//utf8_decode()--> para que tome los caracteres con acento!
?>
<!--	<h3> REGISTRO GUARDADO CON ÉXITO!!! </h3>			  FELICITACIONES!!!*</h3>	-->


<!--
<h3>Datos de tu Evento de Atencion Presencial</h3>-->

<h2>Tu Evento de Atencion Presencial</h2>

<?php
/* llamada repetida linea 228-
require_once 'includes/funciones/tramites.php';

$tramite_nms=tramites($tipo, $tram);  //llama a function tramite
*/
//echo "<BR> RTA FUCNTION TRAMITE: " . $tramite_nms['nm_tramite'] . " tipo tram: " . $tramite_nms['tipo_tramite'];
/*
//rta function tramite:
$tramite=$json_decode($tramite_nms, true);
//imprime respuesta function tramite:
echo "<BR> RTA FUCNTION TRAMITE: " . $tramite['nm_tramite'] . " tipo tram: " . $tramite['tipo_tramite'];
*/

/*NUEVA VERSION DE FUNCTION TRAMITE DEVUELVE UN JSON:
$tramite=tramite( $evento['tipo']  , $evento['tram']);     //llama a la funcion tramite y trae los nombres del TRamite y tipo_tramite.
 $ver= json_decode($tramite, true); //respuesta de Function tramite.
$nm_tramite=$ver['nm_tramite'];
$tipo_tramite=$ver['tipo_tramite'];
*/


?>

<?php	if( isset($getRegistro['id_registrado'])){  ?>

<H3> <?php // echo " TRAMITE: " . "<br>" . $tramite_nms['nm_tramite'] . "<br>" . $tramite_nms['tipo_tramite'] ?> </H3> <br>

	<h3> <?php echo $tramite_nms['tipo_tramite']; ?> </h3>

	   	<h2>Turno ID: 	<?php   echo $getRegistro['id_registrado'];  ?>
	 </h2> <!--//echo $nm_Tramite= function TramiteID(); ?>  --></h2> <!-- <h2>para Atención Presencial para Trámite:</h2>	-->




<?php  /*

$tramite_nms=tramites($tipo, $tram);

$rta = array('nm_tramite' => $fila['nm_tramite'],
			  'tipo_tramite' => $fila['tipo_tramite']
			 );
*/
?>

<h2> <?php  echo " <br>" . $tramite_nms['nm_tramite']; ?></h2>

<?php 
//conversion de fecha date:time a d-M-Y:
$fecha= date_create( $getRegistro['fecha_registro'] ); 
//$fecha1= $date ("d-M-Y", $fecha);
//	PRUEBA IMPRIME FORMATO FECHA:		echo date_format($fecha,"d-M-Y");

$fecha1= date_format($fecha,"d-M-Y");

 ?> </h2>


	<h3> Dia de Atencion: 	<!--Fecha y Hora de Obtencion del Turno:-->
	
	<?php echo $fecha1;   //$getRegistro['fecha_registro'] ;  ?>
	
	</h3> 
<?php
			//}else{ <?php echo "<br> . No tiene Eventos Reservados"; } //fin id_status ?> 


<!--<h2>Espera aproximada: </h2>  -->
	<?php if ($datos_espera['cantidad'] > 0) { ?>
	<h3>Cantidad de Eventos en Espera:  <?php echo $datos_espera['cantidad'];  ?> </h3>


<?php
}else{ ?> <h3><?php echo "No hay otros Eventos en Espera. " . "<br>" . "Inicia su Turno"; ?> </h3> <?php }//echo ""; } ?>


<?php 

$hora= date("i", $datos_espera['espera']);
/* ini prueba qué_imprime  hora:minutos
//date("i:s", $datos_espera['espera'])


echo $hora;

$minutos= date("s", $datos_espera['espera']);
echo $minutos;
*/ //prueba qué_imprime  hora:minutos

if ($hora >0 and $datos_espera['cantidad'] > 0){ ?>
	
	<h3>Tiempo Restante para tu Atencion: <?php echo date("i:s", $datos_espera['espera']) ." [horas : minutos]" ;	?>	
<?php  }else if($datos_espera['cantidad'] >0){ ?>
		<h3>Tiempo Restante para tu Atencion: <?php echo date("s", $datos_espera['espera']) ." [ minutos]" ; }	?>	</h3> </h3> 
<?php // }   //Tiempo de Espera:

}else{ ?><h2> <?php echo  "<br> No tiene Eventos Reservados"; ?> </h2>  <?php }  ?>

<br> <br> <br> 
</br></br></br>

</body>
</html>

<?php include_once 'includes/templates/footer.php'; ?>
