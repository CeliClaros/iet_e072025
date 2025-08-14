<?php 

session_start();



//include_once "includes/templates/header.php" ;
    require_once('includes/funciones/bd_conexion.php'); //   ?>
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

    $nombre= $_SESSION['nombre']; 
    $apellido= $_SESSION['apellido'];
    $dni= $_SESSION['dni'];
    $email= $_SESSION['email'];
    //$tram= $_SESSION['tramite'];
     $tramite= $_POST['tramites'];
     $_SESSION['tramite'] = $_POST['tramites'];



//PRUEBA 28/05:
$tramite = $_GET['tramite'];



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



 // status_turno POR DEFAULT SE SETEA STATUS WAITING = 1;
$status_turno=1;  //es '1' por default.
$rta = 0;
?>

<pre>
    <?php  /*
    var_dump($_POST);
*/ 
#$rta=0;   ?>
</pre>

<?php
try {


require_once('includes/funciones/bd_conexion.php'); 

date_default_timezone_set("America/Argentina/Buenos_Aires");

$mysqli = new mysqli("localhost", "root", "", "iet");

 //$sql= "SELECT COUNT(id_registrado) FROM registrados WHERE fecha_registro like '$fecha2'  AND  status_turno = 1  AND id_tipo_tramite =$id_tram";
//$stmt = $conn->prepare("INSERT INTO admin_users(usuario, nombre, password) VALUES(?, ?, ?)");

$sql= "INSERT INTO registrados (nombre, apellido, dni, email, fecha_registro, id_tipo_tramite, tramite_id, status_turno) VALUES ( '$nombre', '$apellido', '$dni', '$email', '$fecha', $id_tipo_tramite, $tramite, $status_turno)";
//DOC:
//INSERT INTO registrados (nombre, apellido, dni, email, fecha_registro, id_tipo_tramite, tramite_id, status_turno) VALUES ('Prueba20','Prueba20', '47123458', 'prueba20@mail.com' , NOW() , 1, 7, 1);

// $sql= "SELECT COUNT(*) id_registrado FROM registrados WHERE fecha_registro like '$fecha2'  AND  status_turno = 1  AND id_tipo_tramite ='$id_tram'";


$result = mysqli_query($mysqli, $sql);
$fila = mysqli_fetch_assoc($result);
header("location:selecciona-envia.php?ok");

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
  
*/

} catch (\Exception $e) {
    //throw $th;
//    echo "Error!!!".$e->getMessage()."<br>";
    //return false;
}


//var_dump($fila);

/* doc:
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
fin doc.-
*/


/*
$cont= $fila['id_registrado'];
//$cont = intval($total[0]);

//echo json_encode($cont);




$minutos= $cont * 10;
/*doc:
echo "<br>" . "CANTIDAD: " . $cont;
echo "<br>" . "TIEMPO DE ESPERA: " . $minutos;

echo "<br>" . "CALCULAR EL PRONÓSTICO DE ATENCIÓN: ";
//pronostico(); 
* /

$pronostico = array(
  'cantidad' => $cont,
  'espera' => $minutos 
  );

echo json_encode($pronostico);



FIN DOC */



















/*

    //code...
  //  require_once('includes/funciones/bd_conexion.php');  //abre la conex.para consultar db!
   // require_once('includes/templates/bd_conexion.php');  //abre la conex.para consultar db!
     require_once('includes/funciones/bd_conexion.php'); 
 /*
    $consulta = "INSERT INTO mensajes
    (id,nombre,email,mensaje) VALUES ('0','$nombre','$email','$mensaje')";  */

    //VER:
   # $consulta = "INSERT INTO registrados (nombre, apellido, dni, email, fecha_registro, id_tipo_tramite, tramite_id, status_turno) VALUES ('$nombre', '$apellido', '$dni', '$email', '$fecha, '$id_tipo_tramite', '$tramite', '$status_turno')"; //    // ($nombre, $apellido, $dni, $email, $fecha, $id_tipo_tramite, $tramite, $status_turno)";
/*
    $stmt= $conn->prepare("INSERT INTO registrados (nombre, apellido, dni, email, fecha_registro, id_tipo_tramite, tramite_id, status_turno) VALUES (?, ?, ?, ? ,? , ?, ?, ?)");    //con prepaare se previenen ataques porque se llevan los datos por un canal aparte.
//  $stmt= bind_param("ssis",$fecha,"iii");
    //$stmt->bind_param("ssissiii", $nombre, $apellido, $dni, $email, $fecha, $id_tipo_tramite, $tramite, $status_turno);
    $stmt->bind_param("sssssiii", $nombre, $apellido, $dni, $email, $fecha, $id_tipo_tramite, $tramite, $status_turno);
   //VER   $stmt->bind_param("$nombre", "$apellido", "$dni", "$email", "$fecha", "$id_tipo_tramite", "$tramite", "$status_turno");
    $stmt->execute();  
    $stmt->close(); 
    $conn->close();    
    #header('Location:validar_registro.php?exitoso=1');

    #$resultado = $conn->query($sql)  VER
  #  $resultado = $conn->query($consulta);  //  VER

$rta=1;
//header('Location:post.php'); // ?exitoso=1');    //?exitoso=1');

//header('<Location:registra.php?exitoso=1');    //?exitoso=1');


} catch (\Exception $e) {
    echo $e->getMessage();

   // $error=$e;
    //throw $th;
} */

//endif;  
?>




<?php  /*
   // if(isset($_GET['exitoso'])):
   //     if ($_GET['exitoso']== "1") {  //:   //"1"
       if($rta){ //} == 1){
            //echo "Registro guardado con éxito";
              //  require 'notifica.php';
   				//require 'notifica-dinamico3.php';

   				//header("location:producto.php") ;
   				header("location:selecciona-envia.php?ok");
   				//("location:selecciona-envia.php?ok");

        }else {
                   // echo json_encode('error');
                    echo "Error". $rta ; //. $e->getMessage();
                }

 //   endif;   */

    ?>

<?php // }  //
// VEERR  endif ?> 


<?php /*
include_once "includes/templates/header.php" ;
<section class="seccion contenedor">
<h2>Resumen Registro</h2>
*/


//VER     
 ?>



<!-- VERRRRR-->
 
   
   
</section>


<!-- <script  src="js/script3.js"></script-->
<!--script  src="js/registrar.js"></script-->
<?php include_once "includes/templates/footer.php" ; ?>

<?php


#function registro($_POST){
#}

#registro($_POST);



            /*

            if ($_GET['exitoso']== "1") {  //:   //"1"
            // VER  echo "Registro guardado con éxito";

            echo json_encode('1');  //Registro Exitoso


            //return $cadena="GUARDADO";
           // echo json_encode('Reserva Procesada con Éxito');
            // VER   endif; 
            }else {
                echo json_encode('Error');

            }


            <pre>
    <?php  
    var_dump($_POST);
    echo $_POST['nombre'];

$rta=0;   ?>
</pre>



 # VER   header('Location:http://localhost/prueba2/post.php?exitoso=1');    //?exitoso=1');

 #VER  header('registro_borrador_ajax5.php?exitoso=1');
    
    
 # header('http://localhost/prueba2/post.php?exitoso=1');
   # http://localhost/prueba2/post.php



*/


//?>

<?php 

/* doc: arma el json de pronostico `para disponibilidad.php >>DONE: 20210811 20:16
$cont= $fila['id_registrado'];
//$cont = intval($total[0]);

$minutos= $cont * 10;

echo "<br>" . "CANTIDAD: " . $cont;
echo "<br>" . "TIEMPO DE ESPERA: " . $minutos;





echo "<br>" . "CALCULAR EL PRONÓSTICO DE ATENCIÓN: ";
//pronostico();	


$pronostico = array(
	'cantidad' => $cont,
	'espera' => $minutos 
	);

*/
?>