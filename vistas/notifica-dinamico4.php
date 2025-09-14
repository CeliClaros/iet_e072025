
<?php 
/* en este SP hay tres funciones que resuelven las queries para traer los datos necesarios para informar status al usuario.
funcion busca: busca los datos del tramite reservado actual del dia.
funcion tramite: trae los nombres en string de los 
funcion pronostico: entrega los datos en pantalla
*/
	session_start();
	error_reporting(0);
/*
					$_SESSION['id_cliente']	 = $id_cliente;
					$_SESSION['nombre'] = $nm_cliente;
					$_SESSION['apellido'] = $ap_cliente;
					$_SESSION['dni'] = $dni;
					$_SESSION['password'] = $password_base;
					$_SESSION['email'] = $email;
					$_SESSION['celular'] = $celular;
*/

/*  
// 20220930 DATOS_DE SESION:

	echo $_SESSION['nombre'] . "<br>";
	echo $_SESSION['apellido'] . "<br>";
	echo $_SESSION['dni'] . "<br>";
	echo $_SESSION['password'] . "<br>";
	echo $_SESSION['email'] . "<br>";
	echo $_SESSION['celular'] . "<br>";

	echo $_SESSION['email'] . "<br>";


*/


    $nombre= $_SESSION['nombre']; 
    $apellido= $_SESSION['apellido'];
    $dni= $_SESSION['dni'];
    $usuario= $_SESSION['email'];
    //$tramite= $_SESSION['tramite'];
//     $tramite= $_POST['tramite'];

	//require_once 'includes/templates/header.php';
	require_once '../vistas/includes/templates/barra-user.php';
	//require_once 'includes/templates/header-barra.php'; // barra para iniciar sesìon User
	require_once '../vistas/includes/funciones/bd_conexion.php';
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

//recibe variables: recibir por post: 
 //if (isset($_POST['login-user'])){
//DATOS PRUEBA:
/*	$usuario = 'prueba@mail.com';		//$_POST['usuario'];	//en el caso de USER el dato usuario es el email
	$password = 1234; 		//$_POST['password']; 
	$fecha2= "2021-08-01%";  //stear fecha con date() para obtener la fecha de hoy.

//}


$usuario = 'prueba18@mail.com';	
*/
//---------------


//funcion busca:

//function busca($usuario, $password, $fecha2){
	function busca($usuario, $fecha2){
//busca el evento actual del cliente, recién logueado y registrado hoy, para notificar status

try {
	//include_once 'includes/funciones/bd_conexion.php';
//$mysqli = new mysqli("localhost", "root", "", "iet");

 $mysqli = new mysqli('localhost', 'celina_dba', 'GxDm7aR1gCCq', 'celina_iet');	

$conn=$mysqli;
//busca el Evento del Cliente:
	$stmt = $conn->prepare("SELECT * FROM registrados WHERE fecha_registro LIKE ? and email = ? and status_turno = 1;");
	$stmt->bind_param("ss", $fecha2, $usuario);
	$stmt->execute();
	$stmt->bind_result($id_registrado, $nombre, $apellido, $dni, $email, $fecha_registro, $id_tipo_tramite, $tramite_id, $status_turno);
	if ($stmt->affected_rows) {
		$existe = $stmt->fetch();

/*		var_dump($existe);

		echo "id_turno: " . $id_registrado;
		echo "<br>" . "status_turno: " . $status_turno;
		echo "<br>" . "fecha_registro" . $fecha_registro; 
		echo "<br>" . "nombre:  " . $nombre;
*/


		$turno = array(
			'id_registrado' => $id_registrado,
			'nombre' => $nombre ,
			'apellido' => $apellido,
			'dni' => $dni,
			'email' => $email,
			'fecha_registro' => $fecha_registro,
			'id_tipo_tramite' => $id_tipo_tramite,
			'tramite_id' => $tramite_id,
			'status_turno' => $status_turno,
			'fecha_consulta' => $fecha2
			 );


//$tram= isset($turno['tramite_id']);  echo "TRAM:" . $tram;
//$tipo= isset($turno['id_tipo_tramite']);  echo "Tipo Tramite: " . $tipo;

//llama a funcion tramite.php para tener y mostrar los datos nm_tram y tipo_tram:
/*
$tramite_nm= array;

$tramite_nm = tramite($tram, $tipo);

$tipo_tram
$nm_tram*/




//busca nm del tramite:
/*		  $sql= "SELECT COUNT(id_registrado) FROM registrados WHERE fecha_registro like '$fecha2'  AND  status_turno = 1  AND id_tipo_tramite =$id_tram";

		  $result = mysqli_query($mysqli, $sql);
$fila = mysqli_fetch_assoc($result);


*/



/* prueba: mayo 2022
// $mysqli = new mysqli("localhost", "root", "", "iet");

 $mysqli = new mysqli('localhost', 'celina_dba', 'GxDm7aR1gCCq', 'celina_iet');	

$conn=$mysqli;
		  $sql= "SELECT * FROM tramites WHERE 'id_tipo_tramite' = $tipo AND 'tramite_id' = $tram";

		  $result = mysqli_query($mysqli, $sql);
$fila = mysqli_fetch_assoc($result);

echo " <br> . Lo trae de la ddbb, TRAMITE_ID: " . $fila['tramite_id'] . "<br>";
echo "TIPO_TRAMITE_ID: " . $fila['id_tipo_tramite'];

*/






/* //IMPRESION DE PRUEBA: 
		echo "<br>" . "FECHA: " . $turno['fecha_consulta'];
		echo "<br>" . "DNI: " .  $turno['dni'];

var_dump($turno);

*/	//FIN IMPRESION DE PRUEBA.-

return $turno;

//session_start();
//$_SESSION('turno') = $turno;

//$_SESSION['tramite_id'] = $tramite_id;





//json_encode($turno);
/*return $turno;
$stmt->close();
$conn->close();
*/	}  //if rta query;



} catch (Exception $e) {
	echo "Error: " . $e->getMessage();
};

$stmt->close();
$conn->close();

//pronostico($turno);

//}; //fin IF isset variables _POST
 } ; //cierra function busca;

//fin function buscar.



//llamada  a function busca():
//$getRegistro= busca($usuario, $password, $fecha2);

$getRegistro= busca($usuario, $fecha2);

 //IMPRESION DE PRUEBA: 		echo "<br>" . "nombre: " . $getRegistro['nombre'];


/*
$tram= isset($turno['tramite_id']);  echo "TRAM:" . $tram;
$tipo= isset($turno['id_tipo_tramite']);  echo "Tipo Tramite: " . $tipo;

*/



				echo $tram= $getRegistro['tramite_id'];
				echo $tipo= $getRegistro['id_tipo_tramite'];

//require_once('includes/funciones/tramite.php');

require_once '../vistas/includes/funciones/tramites.php';

$tramite_nms=tramites($tipo, $tram);  //llama a function tramite

//echo "<BR> RTA FUNCTION BUSCA idsº:";

//echo "isset variables";

//echo "TRAMITE ID_: "  . $tram; echo "   TIPO_TRAMITE_ID: "  . $tipo; echo "<br>";

//$tramite_nms=tramite($tipo, $tram);

//echo "<BR> RTA FUCNTION TRAMITE: " . $tramite_nms['nm_tramite'] . " tipo tram: " . $tramite_nms['tipo_tramite'];

/*
// $mysqli = new mysqli("localhost", "root", "", "iet");

 $mysqli = new mysqli('localhost', 'celina_dba', 'GxDm7aR1gCCq', 'celina_iet');	


$conn=$mysqli;
		  $sql= "SELECT * FROM tramites WHERE 'id_tipo_tramite' = $tipo AND 'tramite_id' = $tram";

		  $result = mysqli_query($mysqli, $sql);
$fila = mysqli_fetch_assoc($result);

echo " <br> . Lo trae de la ddbb, fila TRAMITE_ID: " . $fila['tramite_id'] . "<br>";
echo " fila TIPO_TRAMITE_ID: " . $fila['id_tipo_tramite'];

*/




//------------------
//ini function pronostico: 



function pronostico($turno){

//function pronostico($turno){		PARA NOTIFICAR SOBRE UN TURNO.
//este archivo calcula la cantidad de turnos previos en la misma fila o tipo de turnos y el tiempo de espera de atenciòn-

/*
recibe en $turno: 
	'id_registrado' => $id_registrado,
			'nombre' => $nombre ,
			'apellido' => $apellido,
			'dni' => $dni,
			'email' => $email,
			'fecha_registro' => $fecha_registro,
			'id_tipo_tramite' => $id_tipo_tramite,
			'tramite_id' => $tramite_id,
			'status_turno' => $status_turno,
			'fecha_consulta' => $fecha2



*/

/*DATOS PRUEBA:
$fecha2= $turno['fecha_registro'];			//$turno['fecha_registro'];
$id_tipo_tramite = $turno['id_tipo_tramite'];


$fecha2= '2021-08-01%';			//$turno['fecha_registro'];
$que_email=  'prueba@mail';						//$turno['email']; 
$status=1;
*/
/*
$fecha1= (date('Y-m-d'));
//echo $fecha1;
$fecha2= $fecha1 ."%";
*/




/*
$fecha2= '2021-08-01%';			//$turno['fecha_registro'];
$que_email=  'prueba@mail';						//$turno['email']; 
$status=1;

$id_tipo_tramite= 1; 					//$turno['id_tipo_tramite'];
*/

try {
include_once '../vistas/includes/funciones/bd_conexion.php';
/*
$sql = "SELECT COUNT(*) total FROM avisos";
$result = mysql_query($sql);
$fila = mysql_fetch_assoc($result);
echo 'Número de total de registros: ' . $fila['total'];
*/
//$mysqli = new mysqli("localhost", "usuario", "contraseña", "basedatos");
//$mysqli = new mysqli("localhost", "root", "", "iet");

 $mysqli = new mysqli('localhost', 'celina_dba', 'GxDm7aR1gCCq', 'celina_iet');	

/*
   $fecha1= (date('Y-m-d'));
//echo $fecha1;
$fecha2= $fecha1 ."%";
*/
$fecha2= $turno['fecha_consulta'];
$id_tipo_tramite= $turno['id_tipo_tramite'];
//Calcula Pronostico:

 $sql= "SELECT COUNT(*) id_registrado FROM registrados WHERE fecha_registro like '$fecha2'  AND  status_turno = 1  AND id_tipo_tramite ='$id_tipo_tramite'";


//$sql = "SELECT COUNT(*) total FROM avisos";
$result = mysqli_query($mysqli, $sql);
$fila = mysqli_fetch_assoc($result);
//IMPRESION DE PRUEBA: 			echo "<BR>" . "Número de total de registros: " . $fila['id_registrado'];


} catch (\Exception $e) {
    //throw $th;
    echo "Error!!!".$e->getMessage()."<br>";
    //return false;
}

/**/

//IMPRIME PARA PRUEBA:
$cont= $fila['id_registrado'];
//$cont = intval($total[0]);
$cantidad=$cont -1; 

//		$minutos= $cantidad*10; // SE REEMPLAZA POR STORE PROCEDURE QUE CALCULA AVG POR TIEMPO DE ATENCIÒN EVENTO!!!

//&&&&&&&**************&&&&&&&&&&&&&&&


//$mysqli = new mysqli("localhost", "root", "", "iet");

 $mysqli = new mysqli('localhost', 'celina_dba', 'GxDm7aR1gCCq', 'celina_iet');	


// $sql= "SELECT COUNT(*) id_registrado FROM registrados WHERE fecha_registro like '$fecha2'  AND  status_turno = 1  AND id_tipo_tramite ='$tipo_tramite'";
//$query= "CALL SP_PROMEDIOxTpoEVENTO_tbOPERACION";
//$prom=  mysqli_query($mysqli, $query);
$prom = mysqli_query($mysqli, "CALL SP_PROMEDIOxTpoEVENTO_tbOPERACION");
//$promedio = mysqli_fetch_assoc($prom);
$promedio = mysqli_fetch_row($prom);
//echo "RESULTADO DEL STORE SP EN MINUTOS:  "; echo $promedio[0];
$minutos= $cantidad * $promedio[0];



//&&&&&&&&&***********************&&&&&&&&&&&&&&&&


//ORDENAR POR ATENCION >> PENDIENTE


//$minutos= $cont * 10;
/*IMPRIME PARA PRUEBA:
echo "<br>" . "CANTIDAD: " . $cont;
echo "<br>" . "TIEMPO DE ESPERA: " . $minutos;
*/  // FIN IMPRESION DE PRUEBA



//} //fin function pronostico


//Llamada a getRegistro:
//$dataTurno= getRegistro($usuario, $password, $fecha2);

/*
$prueba = getRegistro($usuario, $password, $fecha2);
echo $prueba['nombre'];

echo "<br>" . $prueba['dni'];
*/
//	IMPRIMI PARA PRUEBA: 	echo "<br>" . "CALCULAR EL PRONÓSTICO DE ATENCIÓN: ";
//pronostico();	

/*
$turno = array(
			'id_registrado' => $id_registrado,
			'nombre' => $nombre ,
			'apellido' => $apellido,
)
*/

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

<?php include_once '../vistas/includes/templates/footer.php'; ?>
