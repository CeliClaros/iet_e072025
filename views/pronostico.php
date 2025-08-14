

<?php

//session_start();
/*
          $_SESSION['id_tipo_tramite'] = $id_tipo_tramite;
          $_SESSION['tramite_id'] = $tramite_id;
*/


//AGREGAR SESION:         $tipo_tram= $_SESSION['id_tipo_tramite'] ;
  //            $cod_tram= $_SESSION['tramite_id'] ;

//"tram=$id_registrado&fecha2=$fecha_registro&notifica=1"; 

/*
$id_tram=$_POST['tramite'];
 echo $id_tram;

*/
 $tram = $_GET['tramite'];
$tram= $_GET['tramites'][0];
      //28/05  
 //      $tram = $_POST['tramites'];

// $tram = $POST['tramite'];

                                                //echo "estoy en pronostico.php";

// $tram = $_REQUEST['tramites'];

                                              //echo "<br>" . "tram: " . $tram;

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







                        //pronostico($tram);      26ene2022

   //$tram = $_POST['tramite'];
  //$prueba_nm = $_GET['nombre'];
//$fecha2= $_GET['fecha2'];

//$tram= $_POST["tram"];
//echo $tram;

//echo "recibio: ". $tram . "<br>";

//tiempo_espera8($tram);

/*
if ($conn-> ping()) {
    echo "Conectado" . "<br>";
    # code...
  }else{

    echo "NO CONECTADOOO!!!! :/";
  }
*/


                      //function pronostico($tram) {        //inicia funcion pronostico 26ene2022
//function tiempo_espera8($tram) {  

date_default_timezone_set("America/Argentina/Buenos_Aires");

#$tram= 1;// $_POST['tramite'];       //FALLA ESTO??????? VALIDAR 15/01/21    !!!


//$tram= $_POST['tramite'];  

#echo "TRAM: ". $tram . "<br>";
// echo $result = ($_POST);


/*
if($tram === '')
{echo json_encode( 'tramite VACIO!!!');
}else{
    echo json_encode('correcto: '.$tram);
}

*/


//OBTIENE EL TIPO DE TRAMITE SEGUN EL TRAMITE SELECCIONADO:

/*
if (!isset($_GET['notifica'])) {    //para ver si viene a consultar para notificacion o para settear el codigo del tipo_tramite
  # code...
*/
      //echo "tramite: " . $tram;
//$id_tram= $tram;
  //$id_tram=5;
  //if(isset($tram)){
 



                /* 28/05
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





//}   //fin if (isset)

 //echo $id_tram;
 /*
}elseif (isset($_GET['notifica'])) {
  $id_tram=$_GET['tram'];
}

*/



//$fecha= (date('Y-m-d H:i:s'));


/* */
//$fecha1= (date('Y-m-d'));
$fecha1= "2022-01-21";
//echo $fecha1;
$fecha2= $fecha1 ."%";
 /* */

//$fecha2= '2021-08-02%';   //CAMBIO PARA PRUEBA 24/01/2022

/*
if (isset($_GET['fecha2'])) {
  $fecha2= $_GET['fecha2'];
  # code...
}
*/


/* PROBAR PARA CALCULAR TIEMPO ESPERA NOTIFICACION:
$tram= $_GET['id_registrado'];

$fecha2=$_GET['fecha_registro'];
*/
#echo $fecha2;

// DESDE ACA PROBAR PASAJE DE PARAMETROS:
    try {


        require_once('includes/funciones/bd_conexion.php');  

        //require_once('includes/templates/bd_conexion.php');            //CREA LA CONEXION

  // $sql= "SELECT * FROM registrados WHERE fecha_registro LIKE '2020-12-13%' AND  status_turno = 1  AND id_tipo_tramite =1";  // AND dni <> $dni ");

 //$sql= "SELECT * FROM registrados WHERE fecha_registro LIKE '2020-12-13%' AND  status_turno = 1  AND id_tipo_tramite =1";  // AND dni <> $dni ");
 #  $sql= "SELECT COUNT(id_registrado) AS cont FROM registrados WHERE fecha_registro like '2020-12-13%' AND  status_turno = 1  AND id_tipo_tramite =1";
 # $sql= "SELECT COUNT(id_registrado) FROM registrados WHERE fecha_registro like '$fecha2' "; //$fecha2"; // AND  status_turno = 1  AND id_tipo_tramite =1";
 
 
 #$sql= "SELECT COUNT(id_registrado) FROM registrados WHERE fecha_registro like '2021-03-30%'  AND  status_turno = 1  AND id_tipo_tramite =$tram";


  //$sql= "SELECT COUNT(id_registrado) FROM registrados WHERE  id_tipo_tramite =$tram";
   //SEGUIR ACA:
 //$sql= "SELECT COUNT(id_registrado) FROM registrados WHERE fecha_registro like '$fecha2'  AND  status_turno = 1  AND id_tipo_tramite =$id_tram";
   
 // ver:    $sql= "SELECT COUNT(id_registrado) FROM registrados WHERE fecha_registro like $fecha2  AND  status_turno = 1  AND id_tipo_tramite =$tipo_tram";

 //$sql= "SELECT COUNT(id_registrado) as 'count' FROM registrados WHERE fecha_registro like '$fecha2'  AND  status_turno = 1 "; //1 AND tramite_id = '$tram' ";  //$id_tram"; // AND id_tipo_tramite =$id_tram";

 //$sql= "SELECT COUNT(id_registrado) as 'count' FROM registrados WHERE fecha_registro like '$fecha1'% AND status_turno=1 AND id_tipo_tramite=$id_tram";   //AND tramite_id = '$tram' ";  //$id_tram"; // AND id_tipo_tramite =$id_tram";
  //$sql= "SELECT COUNT(id_registrado) as 'count' FROM registrados WHERE fecha_registro like '$fecha2' AND tramite_id='$tram' "; //AND status_turno=1 AND id_tipo_tramite=$id_tram";   //AND tramite_id = '$tram' ";  //$id_tram"; // AND id_tipo_tramite =$id_tram";
    $sql= "SELECT COUNT(id_registrado) as 'count' FROM registrados WHERE fecha_registro like '$fecha2' "; //" AND tramite_id='$tram' "; //AND status_turno=1 AND id_tipo_tramite=$id_tram";   //AND tramite_id = '$tram' ";  //$id_tram"; // AND id_tipo_tramite =$id_tram";

 //$sql= "SELECT COUNT(id_registrado) FROM registrados WHERE fecha_registro like '$fecha2'";

 //SELECT COUNT(id_registrado) FROM registrados WHERE fecha_registro like '2022-01-21%' AND status_turno = 1 AND tramite_id =5

  # $sql= "SELECT * FROM registrados WHERE id_tipo_tramite ='$tram'";

  # $sql= "SELECT * FROM registrados WHERE fecha_registro like $fecha2"; 
   #$sql= "SELECT * FROM registrados WHERE fecha_registro like date('Y-m-d')"; 
   #$sql= "SELECT COUNT(id_registrado) FROM registrados WHERE fecha_registro = date('Y-m-d')"; 
    #$sql= "SELECT COUNT(id_registrado) FROM registrados WHERE fecha_registro like '2021-03-17%' "; // AND  status_turno = 1  AND id_tipo_tramite =1";
 //$sql= "SELECT COUNT(id_registrado) FROM registrados WHERE fecha_registro LIKE '2020-12-13%' AND status_turno = 1 AND id_tipo_tramite =1";
 #SELECT COUNT(id_registrado) as cant, id_registrado FROM registrados WHERE fecha_registro LIKE '2020-12-13%' AND status_turno = 1 AND id_tipo_tramite =1 GROUP BY id_registrado
     
 //$resultado = $conn->query($sql);
 $resultado = mysqli_query($conn, $sql);

// var_dump($resultado);

//$valores = mysqli_fetch_assoc($resultado);
//var_dump($valores);

} catch (Exception $e) {
    //throw $th;
    echo "Error!!!".$e->getMessage()."<br>";
    //return false;
}


/*

https://stackoverflow.com/questions/6907751/select-count-from-table-of-mysql-in-php
$result = mysql_query("SELECT COUNT(*) AS `count` FROM `Students`");
$row = mysql_fetch_assoc($result);
$count = $row['count'];
*/
//$total= mysqli_fetch_all($resultado);
$total= mysqli_fetch_assoc($resultado);
$cont= intval($total['count']);
//$espera= $cont;//$cont= $total['count'];
//$cont=3;

//$result = mysql_query("SELECT count(*) from Students;");
//echo mysql_result($result, 0);

//$result = mysqli_query("SELECT count(*) from registrados;");
//echo "muestra cant:" . mysql_result($result, 0);

//https://stackoverflow.com/questions/6907751/select-count-from-table-of-mysql-in-php



                    //$total = mysql_fetch_row($resultado);

//$total= $resultado->fetch_row();
#var_dump($total);

                    //$cont = intval($total);
//$cont = intval($total[0]);
#echo $cont;
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

/*
if (isset($espera['cant']) ){
  echo "Cantidad de Personas delante: " . $espera['cant'];
  echo "Minutos de espera: " . $espera['minutos'];
  require 'notifica-dinamico.php';
  # code...
}   */

  #  echo $espera[0];
    
#echo "<br>". "JSON: ";

/* VER: SI VA  O NO!!?  */
/*  */
//echo json_encode($espera);


//var_dump($espera);










$rta= json_encode($espera);  //24/01/2021: mete todo en json pero no se como mostrarlo por GET cuando vuelve.
//header ("Location: selecciona-envia.php?$espera");
                //  28/05 
                header ("Location: selecciona-envia.php?rta="$rta);





















/*
$espera= date("i:s", $minutos);
    $tipo_tramite = $id_tram;
  //  'fecha' => $fecha2;


//header ("Location: selecciona-envia.php?cont=$cont&min=$minutos&espera=$espera&tram=$tipo_tramite&fecha=$fecha2&$rta");

header ("Location: selecciona-envia.php?cont=$cont&min=$minutos&espera=$espera&tram=$id_tram&fecha=$fecha2");
    
*/


/*return json_encode($espera);  */
//          var_dump($espera);      //CAMBIO PARA PRUEBA 24/01/2022

            //return $espera;

//CIERRE PRUEBA PASAJE DE PARAMETROS

#echo json_encode($espera['minutos']);
#echo json_encode($espera['espera']);
#echo json_encode($espera['cant']);
//print $espera;

#$conn->close();

//}

                    //}   //Cierre funcion pronostico 26/ene2022

//} //fin function pronostico

?>





<?php

                  //pronostico($tram);      //26/ene2022

//$tram= $_GET['tram'];

//tiempo_espera8($tram);
//$prueba= tiempo_espera3();
//echo "PRUEBA: " . $prueba;
/*
echo "cont: " . $prueba[0];
echo "minutos: " . $prueba[1];
echo "espera: " . $espera[2];
*/
/*

$pjName = $_POST['pjName'];

$query = mysql_query("SELECT * FROM pcu_locales WHERE Propietario = '$pjName' AND TipoLocal = 1");

$json = array();
while($row = mysql_fetch_array($query)){
    $json[] = array(
    'NombreLocal' => $row['NombreLocal'],
    'GPS' => $row['GPS'],
    'Calle' => $row['Calle']
    );
}
$jsonstring = json_encode($json);
echo $jsonstring;

*/
?>