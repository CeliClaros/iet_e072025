<?php


// EVENTO MODEL; MÉTODOS PARA CALCULAR TIEMPO DE ATENCIÓN

/* en este SP hay tres funciones que resuelven las queries para traer los datos necesarios para informar status al usuario.
funcion busca: busca los datos del tramite reservado actual del dia.
funcion tramite: trae los nombres en string de los 
funcion pronostico: entrega los datos en pantalla
*/


//funcion busca: BUSCA EVENTO REGISTRADO POR UN USUARIO????

//function busca($usuario, $password, $fecha2){
function busca($usuario, $fecha2)
{
	//busca el evento actual del cliente, recién logueado y registrado hoy, para notificar status

	try {
		//include_once 'includes/funciones/bd_conexion.php';
//$mysqli = new mysqli("localhost", "root", "", "iet");

		$mysqli = new mysqli('localhost', 'celina_dba', 'GxDm7aR1gCCq', 'celina_iet');

		$conn = $mysqli;

		//busca el Evento del Cliente:
		$stmt = $conn->prepare("SELECT * FROM registrados WHERE fecha_registro LIKE ? and email = ? and status_turno = 1;");
		$stmt->bind_param("ss", $fecha2, $usuario);
		$stmt->execute();
		$stmt->bind_result($id_registrado, $nombre, $apellido, $dni, $email, $fecha_registro, $id_tipo_tramite, $tramite_id, $status_turno);
		if ($stmt->affected_rows) {
			$existe = $stmt->fetch();



			$turno = array(
				'id_registrado' => $id_registrado,
				'nombre' => $nombre,
				'apellido' => $apellido,
				'dni' => $dni,
				'email' => $email,
				'fecha_registro' => $fecha_registro,
				'id_tipo_tramite' => $id_tipo_tramite,
				'tramite_id' => $tramite_id,
				'status_turno' => $status_turno,
				'fecha_consulta' => $fecha2
			);

			return $turno;
		}  //if rta query;

	} catch (Exception $e) {
		echo "Error: " . $e->getMessage();
	}
	;

	$stmt->close();
	$conn->close();

}
; //cierra function busca;

//fin function buscar.



//llamada  a function busca():
//$getRegistro= busca($usuario, $password, $fecha2);
//TRAE EVENTOS REGISTRADOS EN UNA FECHA, EN TODA LA TB PARA UNA CATEGORIA_EVENTO:
$getRegistro = busca($usuario, $fecha2);

//MUESTRA DE PRUEBA: 	echo "<br>" . "nombre: " . $getRegistro['nombre'];


echo $tram = $getRegistro['tramite_id'];
echo $tipo = $getRegistro['id_tipo_tramite'];

//require_once('includes/funciones/tramite.php');

require_once 'includes/funciones/tramites.php';

$tramite_nms = tramites($tipo, $tram);  //llama a function tramite


//========================================================
//ini function pronostico: 



function pronostico($turno)
{

	//function pronostico($turno){		PARA NOTIFICAR SOBRE UN TURNO.
//este archivo calcula la cantidad de turnos previos en la misma fila o tipo de turnos y el tiempo de espera de atenciòn-


	try {
		include_once 'includes/funciones/bd_conexion.php';

		//CONEXION DDBB HOSTING:

		$mysqli = new mysqli('localhost', 'celina_dba', 'GxDm7aR1gCCq', 'celina_iet');


		$fecha2 = $turno['fecha_consulta'];
		$id_tipo_tramite = $turno['id_tipo_tramite'];

		//Calcula Pronostico:

		$sql = "SELECT COUNT(*) id_registrado FROM registrados WHERE fecha_registro like '$fecha2'  AND  status_turno = 1  AND id_tipo_tramite ='$id_tipo_tramite'";

		$result = mysqli_query($mysqli, $sql);
		$fila = mysqli_fetch_assoc($result);

		//IMPRESION DE PRUEBA: 			echo "<BR>" . "Número de total de registros: " . $fila['id_registrado'];

	} catch (\Exception $e) {
		//throw $th;
		echo "Error!!!" . $e->getMessage() . "<br>";
		//return false;
	}

	/**/

	//IMPRIME PARA PRUEBA:
	$cont = $fila['id_registrado'];
	//$cont = intval($total[0]);
	$cantidad = $cont - 1;

	//		$minutos= $cantidad*10; // SE REEMPLAZA POR STORE PROCEDURE QUE CALCULA AVG POR TIEMPO DE ATENCIÒN EVENTO!!!

	//&&&&&&&**************&&&&&&&&&&&&&&&


	//$mysqli = new mysqli("localhost", "root", "", "iet");

	$mysqli = new mysqli('localhost', 'celina_dba', 'GxDm7aR1gCCq', 'celina_iet');


	$prom = mysqli_query($mysqli, "CALL SP_PROMEDIOxTpoEVENTO_tbOPERACION");


	$promedio = mysqli_fetch_row($prom);

	//echo "RESULTADO DEL STORE SP EN MINUTOS:  "; echo $promedio[0];

	$minutos = $cantidad * $promedio[0];

	$pronostico = array(
		'cantidad' => $cantidad,				//$cont,
		'espera' => $minutos
	);

	//var_dump($pronostico);

	return $pronostico;


} //fin funcion pronostico.-

//-----------------




//llamar a funcion busaca y pronostico:-----------------------

//echo "<br>" . "DEVOLUCION FUNCION Busca: ";

//llamada busca: 
//$registro = busca($usuario, $password, $fecha2);
$registro = busca($usuario, $fecha2);

//llamada pronostico:
//$datos_espera= pronostico($getRegistro);
$datos_espera = pronostico($registro);

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

<?php if (isset($getRegistro['id_registrado'])) { ?>

	<H3> <?php // echo " TRAMITE: " . "<br>" . $tramite_nms['nm_tramite'] . "<br>" . $tramite_nms['tipo_tramite'] ?> </H3>
	<br>

	<h3> <?php echo $tramite_nms['tipo_tramite']; ?> </h3>

	<h2>Turno ID: <?php echo $getRegistro['id_registrado']; ?>
	</h2> <!--//echo $nm_Tramite= function TramiteID(); ?>  --></h2>
	<!-- <h2>para Atención Presencial para Trámite:</h2>	-->




	<?php  /*

$tramite_nms=tramites($tipo, $tram);

$rta = array('nm_tramite' => $fila['nm_tramite'],
			 'tipo_tramite' => $fila['tipo_tramite']
			);
*/
	?>

	<h2> <?php echo " <br>" . $tramite_nms['nm_tramite']; ?></h2>

	<?php
	//conversion de fecha date:time a d-M-Y:
	$fecha = date_create($getRegistro['fecha_registro']);
	//$fecha1= $date ("d-M-Y", $fecha);
//	PRUEBA IMPRIME FORMATO FECHA:		echo date_format($fecha,"d-M-Y");

	$fecha1 = date_format($fecha, "d-M-Y");

	?> </h2>


	<h3> Dia de Atencion: <!--Fecha y Hora de Obtencion del Turno:-->

		<?php echo $fecha1;   //$getRegistro['fecha_registro'] ;  ?>

	</h3>
	<?php
	//}else{ <?php echo "<br> . No tiene Eventos Reservados"; } //fin id_status ?>


	<!--<h2>Espera aproximada: </h2>  -->
	<?php if ($datos_espera['cantidad'] > 0) { ?>
		<h3>Cantidad de Eventos en Espera: <?php echo $datos_espera['cantidad']; ?> </h3>


		<?php
	} else { ?>
		<h3><?php echo "No hay otros Eventos en Espera. " . "<br>" . "Inicia su Turno"; ?> </h3> <?php }//echo ""; } ?>


	<?php

	$hora = date("i", $datos_espera['espera']);
	/* ini prueba qué_imprime  hora:minutos
	//date("i:s", $datos_espera['espera'])


	echo $hora;

	$minutos= date("s", $datos_espera['espera']);
	echo $minutos;
	*/ //prueba qué_imprime  hora:minutos

	if ($hora > 0 and $datos_espera['cantidad'] > 0) { ?>

		<h3>Tiempo Restante para tu Atencion: <?php echo date("i:s", $datos_espera['espera']) . " [horas : minutos]"; ?>
		<?php } else if ($datos_espera['cantidad'] > 0) { ?>
				<h3>Tiempo Restante para tu Atencion: <?php echo date("s", $datos_espera['espera']) . " [ minutos]";
	} ?> </h3>
	</h3>
<?php // }   //Tiempo de Espera:

} else { ?>
	<h2> <?php echo "<br> No tiene Eventos Reservados"; ?> </h2> <?php } ?>

<br> <br> <br>
</br></br></br>

</body>

</html>

<?php include_once 'includes/templates/footer.php'; ?>