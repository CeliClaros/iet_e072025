
<?php 
if(isset($_GET['reserva'])) {
//funcion reserva:
//llamada a funcion reserva.

echo "Entro pòr reserva!!";

//	echo "<br> TRAMITE : " . $_GET['tramites'][0];


echo "LLEGA???:    ". $tram=$_GET['reserva']; //[0];



session_start();



//include_once "includes/templates/header.php" ;
    // require_once('includes/funciones/bd_conexion.php'); //   
	    require_once('bd_conexion.php'); //   ?>
?>
<section class="seccion contenedor">
<h2>Resumen Registro</h2>


<?php
//if(isset($_POST['submit'])):
date_default_timezone_set("America/Argentina/Buenos_Aires");
//if(isset($_POST['$tramite']) != ""){ 

/*
    echo "TRAE ALGO!!!!"."<BR>". $_POST['nombre'] . $_POST['tramite'];
    echo "NOMBRE: " . $_POST['nombre'];
    echo "NOMBRE: " . $_GET['nombre'];
*/

//){   //): inicia IF
    /*
    $nombre= $_POST['nombre']; 
    $apellido= $_POST['apellido'];
    $dni= $_POST['dni'];
    $email= $_POST['email'];
    $tramite= $_POST['tramite'];
DATOS DESDE EL FOR */



//ini Datos importantes: 


    $nombre= $_SESSION['nombre']; 
    $apellido= $_SESSION['apellido'];
    $dni= $_SESSION['dni'];
    $email= $_SESSION['email'];
    //$tram= $_SESSION['tramite'];
    $_SESSION['tramite']= $tram;
    $tramite=$_SESSION['tramite'];


/*30/05:
     $tramite= $_POST['tramites'];
     $_SESSION['tramite'] = $_POST['tramites'];

/*

//PRUEBA 28/05:
$tramite = $_GET['tramite'];


//Fin datos importantes */

/*DATOS DE PRUEBA: 
  $nombre= "PruebaReserva";		//$_SESSION['nombre']; 
    $apellido= "PruebaReserva"; 					//$_SESSION['apellido'];
    $dni= '45777877';								//$_SESSION['dni'];
    $email= "pruebareserva@mail.com";	









   $_SESSION['nombre']; 
   $_SESSION['apellido'];
   $_SESSION['dni'];
   $_SESSION['email'];
    //$tram= $_SESSION['tramite'];
   //  $tramite= $_GET['tramites'][0];
     //$_SESSION['tramite'] = $_POST['tramites'];
*/


//PRUEBA 28/05:
//$tramite = $_GET['tramite'];







    // echo $_SESSION['tramite'];
      //echo $_POST['tramite'];

/* doc:
    $nombre= $_GET['nombre']; 
    $apellido= $_GET['apellido'];
    $dni= $_GET['dni'];
    $email= $_GET['email'];
    $tramite= $_GET['tramite'];

    */

    $fecha= (date('Y-m-d H:i:s'));   //FECHA DE REGISTRO
    //$fecha= new DateTime();
//LINEA 242 A 245 DE main.js DEVOLVER LOS CALCULOS DE DISPONIBILIDAD PARA RESERVAR!!
// id_tipo_tramite, tramite_id, status_turno


//OBTIENE EL TIPO DE TRAMITE SEGUN EL TRAMITE SELECCIONADO:
if ($tramite >=5 && $tramite <= 8) {
   $id_tipo_tramite=1;
}
elseif ($tramite >=9 && $tramite <= 12 ) {
    $id_tipo_tramite=2;
}elseif ($tramite >=13 && $tramite <= 16) {
    $id_tipo_tramite=3;
}
echo "tipo: ". $id_tipo_tramite;


 // status_turno POR DEFAULT SE SETEA STATUS WAITING = 1;
$status_turno=1;  //es '1' por default.
//$rta = 0;
?>

<pre>
    <?php  /*
    var_dump($_POST);
*/ 
#$rta=0;   ?>
</pre>

<?php
try {


//require_once('includes/funciones/bd_conexion.php'); 

date_default_timezone_set("America/Argentina/Buenos_Aires");

$mysqli = new mysqli("localhost", "root", "", "iet");

 //$sql= "SELECT COUNT(id_registrado) FROM registrados WHERE fecha_registro like '$fecha2'  AND  status_turno = 1  AND id_tipo_tramite =$id_tram";
//$stmt = $conn->prepare("INSERT INTO admin_users(usuario, nombre, password) VALUES(?, ?, ?)");

$sql= "INSERT INTO registrados (nombre, apellido, dni, email, fecha_registro, id_tipo_tramite, tramite_id, status_turno) VALUES ( '$nombre', '$apellido', '$dni', '$email', '$fecha', $id_tipo_tramite, $tramite, $status_turno)";
//DOC:
//INSERT INTO registrados (nombre, apellido, dni, email, fecha_registro, id_tipo_tramite, tramite_id, status_turno) VALUES ('Prueba20','Prueba20', '47123458', 'prueba20@mail.com' , NOW() , 1, 7, 1);

// $sql= "SELECT COUNT(*) id_registrado FROM registrados WHERE fecha_registro like '$fecha2'  AND  status_turno = 1  AND id_tipo_tramite ='$id_tram'";


$result = mysqli_query($mysqli, $sql);
$last=mysqli_insert_id();

//$fila = mysqli_fetch_assoc($result);



$query=  "SELECT MAX(id_registrado) AS id FROM registrados";

//$query=  "SELECT MAX(id) AS id FROM registrados";
$ejec= mysqli_query($mysqli, $query);


$fila = mysqli_fetch_assoc($ejec);






} catch (\Exception $e) {
    //throw $th;
    echo "Error!!!".$e->getMessage()."<br>";
    //return false;
}


/*
 //es mediante la sentencia “SELECT MAX(id) AS id FROM tabla”.
 $query=  "SELECT MAX(id) AS id FROM registrados";
$ejec= mysqli_query($mysqli, $query);


$fila = mysqli_fetch_assoc($ejec);
*/
/*
if (isset($fila)) {
	# code...
$evento=encode($fila, true);
*/

header("location: /IET_E03/selecciona_envia.php?ok&id&last=$last"); 
//header("location: /iet_web-final00_180522/selecciona_envia.php?ok&evento="$evento);

//header("location: /iet_web-final00_180522/selecciona_envia.php?ok&fila=$fila&id=$id");   //&evento="$evento);

}
   //header ("Location: /iet_web-final00_180522/selecciona_envia.php?rta=$rta");
//include 'notifica-dinamico4.php';
/*
if($fila){ //} == 1){
            //echo "Registro guardado con éxito";
              //  require 'notifica.php';
          //require 'notifica-dinamico3.php';

          //header("location:producto.php") ;
          header("location:selecciona-envia.php?ok");
          //("location:selecciona-envia.php?ok");

        }else {
                   // echo json_encode('error');
                   // echo "Error" ; //. $e->getMessage();
                     header("location:selecciona-envia.php");
                }

*/
/* doc:
//echo "<BR>" . "Número de total de registros: " . $fila['id_registrado'];

echo json_encode($fila);
  


} catch (\Exception $e) {
    //throw $th;
//    echo "Error!!!".$e->getMessage()."<br>";
    //return false;
}
*/


if (isset($fila)) {
	# code...

header("location:/IET_E03/selecciona_envia.php?ok");

}


?>