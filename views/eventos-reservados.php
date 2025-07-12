
<?php
session_start();
error_reporting(0);
$usuario= $_SESSION['email'];
 //require_once 'includes/templates/header-min.php'; 
 require_once 'includes/templates/barra-user.php'; 
require_once 'includes/funciones/tramite.php';
// require_once 'includes/templates/index-barra.php'; 
 ?>
 

 <section class="seccion">

    <h2>Tramites Reservados</h2>
      <p> </p>

  </section>  <!--seccion-->


  <section class="programa">  <!--Trámites-->
    <div class="contenedor-video">
    
      <video autoplay loop poster="img/bg-talleres.jpg" >
<!-- 
      <source src="video/video.mp4" type="video/mp4">
      <source src="video/video.webm" type="video/webm">
      <source src="video/video.ogv" type="video/ogg">  
           
      <source src="img/fondo-fila.png" type="img">-->

          <source src="img/fondo-fila.png" type="img"> 
      </video>
    </div>  <!--contenedor-video-->

    <div class="contenido-programa">
      <div class="contenedor">
          <div class="programa-evento">

            <!--h2>PROGRAMA DEL EVENTO
            OJO!, VER BIEN EN ESTA PARTE DE CAMBIAR LOS TEXTOS DEL MENU!!!!
            </h2-->

            <h2>Tramites, estado actual</h2>

            <nav class="menu-programa">
<?php 
include ('includes/funciones/bd_conexion.php');
date_default_timezone_set("America/Argentina/Buenos_Aires");
$sql_tramite= "SELECT * FROM categoria_tramite";
 $lista_categoria_sql= mysqli_query($conn, $sql_tramite);
// $lista_categoria= mysqli_fetch_assoc($lista_categoria_sql);
 $categoria=array();

 while ( $lista_categoria= mysqli_fetch_assoc($lista_categoria_sql)) {
   

?>

   <a href="#talleres"><i class="<?php echo $lista_categoria['icono']; ?>" aria-hidden="true"></i> <?php echo $lista_categoria['tipo_tramite']; ?></a>
 <!--  <a href="#talleres"><i class="fas fa-landmark" aria-hidden="true"></i> <?php echo $lista_categoria['tipo_tramite']; ?></a>
   <a href="#conferencias"><i class="fas fa-landmark" aria-hidden="true"></i>Trámites Personalizados:  Inversiones,Pagos</a>
   <a href="#seminarios"><i class="fas fa-landmark" aria-hidden="true"></i>Consultas, Productos, Servicios</a>
    -->

    <?php 
} //fin while categoria tramites ?>

                <!--
                <a href="#talleres><i class="fas fa-code" aria-hidden="true"></i>Talleres</a>
                <a href="#conferencias"><i class="far fa-comment" aria-hidden="true"></i>Conferencias</a>
                <a href="#"><i class="fas fa-landmark" aria-hidden="true"></i>Seminarios</a>
               SACO ESTOS: 
                <a href="#talleres"><i class="fas fa-landmark" aria-hidden="true"></i>Trámites en Caja: Transferencias</a>

                <a href="#conferencias"><i class="fas fa-landmark" aria-hidden="true"></i>Trámites Personalizados:  Inversiones,Pagos</a>
                <a href="#seminarios"><i class="fas fa-landmark" aria-hidden="true"></i>Consultas, Productos, Servicios</a>
 -->
            </nav>

<?php 
        //conexion:
require_once('includes/funciones/bd_conexion.php');
date_default_timezone_set("America/Argentina/Buenos_Aires");

//query:

$sql= "SELECT * FROM registrados"; // WHERE fecha_registro like '2021-08-11%'";
 //$resultado = $conn->query($sql);

 $resultado= mysqli_query($conn, $sql);

 //$total= $resultado->fetch_row();
// var_dump($total);

//$sql= mysqli_query($conn, "SELECT * registrados");

            //$listar_rta=mysqli_fetch_assoc($resultado);
//var_dump($listar_rta);

/*doc:
$originalDate = "2017-03-08";
$newDate = date("d/m/Y", strtotime($originalDate));
*/

/*
$fecha= $listar_rta['fecha_registro'];
echo $fecha_ver= date("d F", strtotime($fecha)); //, 'America/Argentina');
echo "<br>";
echo $hora= date("H:i", strtotime($fecha)) . " hrs";    */
//prueba
 
//prueba
  ?>


                
<?php 
$eventos=array();

  while($listar_rta=mysqli_fetch_assoc($resultado)) {

      $fecha_ver= $listar_rta['fecha_registro'];

    $fecha_filtro= date("Y-M-d", strtotime($fecha_ver));             //date("d F", strtotime($fecha));



   // $fecha_registrados= $listar_rta['fecha_registro'];

  
     $registrados_hoy= date("Y-M-d", strtotime($listar_rta['fecha_registro'] ));      //toma solo la fecha del dsteTime del registro;

  if ($registrados_hoy== date("Y-M-d") ){       //sin esto muestra todos los de la base!!!


// Agregar: Y que el usuario sea el de la sesiòn para mostrar los botones sòlo en esa opciòn.


    $tipo_tramite= $listar_rta['id_tipo_tramite'];
        $un_evento = array(
          'tramite' => $listar_rta['id_registrado'], 
          'fecha' => $listar_rta['fecha_registro'], 
          'nombre' => $listar_rta['nombre'], 
          'apellido' => $listar_rta['apellido'],
          'email' => $listar_rta['email'],
          'tipo' => $listar_rta['id_tipo_tramite'],
          'tram' => $listar_rta['tramite_id']
          );

//GENIAAAAAALLLL: 
//FILTRA POR TIPO_EVENTO
       // $eventos[$tipo_tramite][] = $un_evento;

//FILTRA POR FECHA:
$eventos[$fecha_filtro][]= $un_evento;


//$eventos[]= $un_evento;

}   //endif


}     //fin while FETCH_ASSOC;
          //var_dump($eventos);

//IMPRIMIR TODOS LOS EVENTOS:

    foreach ($eventos as $dia => $lista_eventos) {  ?>
     <?php  
     // $registrados_hoy= date("Y-M-d", strtotime($lista_eventos['fecha_registro'] ));
?>
     <?php// if ($registrados_hoy== date("Y-M-d") ): ?>
       
     
                    <h3>Tramite <?php echo $listar_rta['id_registrado']; ?> </h3>


                    <?php foreach ($lista_eventos as $evento): ?>
                         

                         

 <!-- va???  -->          <form role="form" action="selecciona_envia.php" method="post">
  <!--<form role="form" name="login-user-form" id"login-user" method="post" action="consulta-login.php">  -->
 <div class="dia">

<?php 
//echo $listar_rta['id_tipo_tramite'] . "tram: " .  $listar_rta['tramite_id'];
/*$tramite=tramite($listar_rta['id_tipo_tramite'], $listar_rta['tramite_id']);
 $ver= json_decode($tramite, true); //echo "VER: " . $ver[0]['tramite_id']; 
$nm_tramite=$ver['nm_tramite'];
$tipo_tramite=$ver['tipo_tramite']  */

 ?>

                          <p class="titulo"> <?php echo $evento['tramite'] ?> </p>
                          
                  <?php  //linea anterior (196) trae el id del evento y lo muestra en pantalla
$tramite=tramite( $evento['tipo']  , $evento['tram']);     //llama a la funcion tramite y trae los nombres del TRamite y tipo_tramite.
 $ver= json_decode($tramite, true); //respuesta de Function tramite.
$nm_tramite=$ver['nm_tramite'];
$tipo_tramite=$ver['tipo_tramite'];
?>

<p class="titulo">Tipo Evento:</p>
 <p><?php echo $tipo_tramite; ?></p>
 <p class="titulo">Nombre Evento:</p>
 <p><?php echo $nm_tramite; ?></p>

<?php //LAS SIGUIENTES DOS LINEAS TRAEN EN CADA CAJITA DEL FRONT LA FECHA Y NOMBRE APELLIDO DEL USUARIO QUE RESERVÒ (UTIL PARA EL OPERADOR.- ?>
                          
<!--MUY IMPORTANTE!!!!!!: 

                          <p><i class="fas fa-clock" aria-hidden="true"></i> <?php //echo $evento['fecha'];  //$hora . "hrs";?></p>
                           <p><i class="fas fa-user" aria-hidden="true"></i> <?php //echo $evento['nombre'] . " " . $evento['apellido']; ?> </p>
                           -->
                           <?php //if ($_SESSION['email'] == $evento['email']) {
                            if ($usuario === $evento['email']) {
                           
                          ?>

   <!-- va???  -->         <input  type="hidden" name="login-user" value="1" >   
                           <button type="submit">Reagendar</button>

                           <button type="submit">Cancelar Evento</button> 
                     
<?php 
                    

                          } ?> 
                            <pre>
                              <?php //var_dump($evento); ?>

                            </pre>

                          </div>

  </form>



                    <?php endforeach    //fin foreach de dias?>
                     <?php //endif  de la linea: 160!!  ?>
<?php 
/*doc: 
  setlocale(LC_TIME, 'spanish');
  <p><i> <?php echo date("d, F ", strtotime($dia)); 
echo "<br>";
//echo strftime("%a %d de %B del %y", strtotime($dia));
*/?>  </i></p>
<!--
                    <p><i class="fas fa-clock" aria-hidden="true"></i> <?php //echo $hora . "hrs"; //$fecha; ?></p>
                    <p><i class="fas fa-calendar" aria-hidden="true"></i> <?php // echo $fecha_ver; ?> </p>
                    <p><i class="fas fa-user" aria-hidden="true"></i> <?php // echo $listar_rta['nombre'] . " " . $listar_rta['apellido']; ?> </p>


                    -->
  <?php    }      //fin foeach ?>

<?php 

  //var_dump($listar_rta);

 //       echo $listar_rta['id_tipo_tramite'];
 echo "<br>";

          //var_dump($un_evento);

  //if ($listar_rta['id_tipo_tramite'] == 1) {
  /*  echo $listar_rta['nombre'] . " " . $listar_rta['apellido'];
    echo "<br>";
    //echo //    $listar_rta['id_tipo_tramite'];
*/
//FORMAT HORA:

  /*  
    $fecha= $listar_rta['fecha_registro'];
echo $fecha_ver= date("d F", strtotime($fecha)); //, 'America/Argentina');
echo "<br>";
echo $hora= date("H:i", strtotime($fecha)) . " hrs";
*/


 $fecha= $listar_rta['fecha_registro'];
 $fecha_ver= date("d F", strtotime($fecha)); //, 'America/Argentina');
 $hora= date("H:i", strtotime($fecha)) ;
?>
<?php

 ?>
            <div id="talleres"  class="info-curso ocultar clearfix">
                <div class="detalle-evento">
                    <!--HTML5, CSS3, JAVASCRIPT-->
<p><i><?php echo $tram= tramite($tipo_tramite, $un_evento['tramite']); //DEBERA TRAER NOMBRE TRAMITE Y NOMBRE TIPO TRAM DESDE FUNCION TRAMITE.- ?></i></p>
$tram=tramite($listar_rta['id_tipo_tramite'], $listar_rta['tramite_id']);
<p><i><?php // echo $tram[0]; ?></i></p>

                    <h3>Tramite <?php echo $listar_rta['id_registrado']; ?> </h3>
                    <p><i><?php echo $tram . "Tramite a Realizar"; ?></i></p>
                    <p><i class="fas fa-clock" aria-hidden="true"></i> <?php echo $hora . "hrs"; //$fecha; ?></p>
                    <p><i class="fas fa-calendar" aria-hidden="true"></i> <?php echo $fecha_ver; ?> </p>
                    <p><i class="fas fa-user" aria-hidden="true"></i> <?php echo $listar_rta['nombre'] . " " . $listar_rta['apellido']; ?> </p>
                </div>

<?php 
//} fin if //TIPO_TRAMITE: 1


 /*
  echo   $listar_rta['id_tipo_tramite'];

   echo "<br>" . "FIn wihle";  */

                      //echo "<br>";
   

                                    // }  //fin while




 //echo   $tipo_tramite= $listar_rta['id_tipo_tramite'];
//if ($tipo_tramite == '1'){ 


//if ($listar_rta['id_tipo_tramite'] == 1){ 
?>
               
   <div id="talleres"  class="info-curso ocultar clearfix">
                <div class="detalle-evento">
                    <!--HTML5, CSS3, JAVASCRIPT-->

                    <h3>Tramite <?php echo $listar_rta['id_registrado']; ?> </h3>
                    <p><i><?php $tram=tramite($listar_rta['id_tipo_tramite'], $listar_rta['tramite_id']);
                    echo $tram . "Tramite a Realizar"; ?></i></p>
                <p><i><?php echo $listar_rta['tramite_id']; ?></i></p>
                    <p><i class="fas fa-clock" aria-hidden="true"></i> <?php echo $hora . "hrs"; //$fecha; ?></p>
                    <p><i class="fas fa-calendar" aria-hidden="true"></i> <?php echo $fecha_ver; ?> </p>
                    <p><i class="fas fa-user" aria-hidden="true"></i> <?php echo $listar_rta['nombre'] . " " . $listar_rta['apellido']; ?> </p>
                </div>
  
<?php //} // endif trmite tipo1 
//else{
  echo "tipo tramite: " . $listar_rta['id_tipo_tramite'];
//}
   //   } // end While      ?>


                    <!--HTML5, CSS3, JAVASCRIPT-->
                    <h3>Tramite <?php echo $listar_rta['id_registrado']; ?> </h3>
                    <p><i class="fas fa-clock" aria-hidden="true"></i> <?php echo $hora . "hrs"; //$fecha; ?></p>
                    <p><i class="fas fa-calendar" aria-hidden="true"></i> <?php echo $fecha_ver; ?> </p>
                    <p><i class="fas fa-user" aria-hidden="true"></i> <?php echo $listar_rta['nombre'] . " " . $listar_rta['apellido']; ?> </p>
                </div>
                <div class="detalle-evento">
                    <h3>Tramite2</h3>
                    <p><i class="fas fa-clock" aria-hidden="true"></i>10:00 hrs</p>
                    <p><i class="fas fa-calendar" aria-hidden="true"></i>10 Diciembre</p>
                    <p><i class="fas fa-user" aria-hidden="true"></i>Nombre Usuario</p>
                </div>
                <a href="#" class="button float-right">Ver Todos</a>
            </div>  <!--#Talleres-->


         <?php    //////////FIN PRUEBA:?>


        
            <div id="talleres"  class="info-curso ocultar clearfix">
                <div class="detalle-evento">
                 
                    <!--HTML5, CSS3, JAVASCRIPT-->
                    <h3>Tramite1</h3>
                    <p><i class="fas fa-clock" aria-hidden="true"></i>09:30 hrs</p>
                    <p><i class="fas fa-calendar" aria-hidden="true"></i>10 Diciembre</p>
                    <p><i class="fas fa-user" aria-hidden="true"></i>Nombre Usuario</p>
                </div>
                <div class="detalle-evento">
                    <h3>Tramite2</h3>
                    <p><i class="fas fa-clock" aria-hidden="true"></i>10:00 hrs</p>
                    <p><i class="fas fa-calendar" aria-hidden="true"></i>10 Diciembre</p>
                    <p><i class="fas fa-user" aria-hidden="true"></i>Nombre Usuario</p>
                </div>
                <a href="#" class="button float-right">Ver Todos</a>
            </div>  <!--#Talleres-->

<!--CONFERENCIAS-->

<div id="conferencias"  class="info-curso ocultar clearfix">
  <div class="detalle-evento">
   
      <!--HTML5, CSS3, JAVASCRIPT-->
      <h3>Tramite3</h3>
      <p><i class="fas fa-clock" aria-hidden="true"></i>11:30 hrs</p>
      <p><i class="fas fa-calendar" aria-hidden="true"></i>12 Diciembre</p>
      <p><i class="fas fa-user" aria-hidden="true"></i>Nombre Usuario</p>
  </div>
  <div class="detalle-evento">
      <h3>Tramite4</h3>
      <p><i class="fas fa-clock" aria-hidden="true"></i>12:00 hrs</p>
      <p><i class="fas fa-calendar" aria-hidden="true"></i>12 Diciembre</p>
      <p><i class="fas fa-user" aria-hidden="true"></i>Nombre Usuario, dni/STATUS</p>
  </div>
  <a href="#" class="button float-right">Ver Todos</a>
</div>  <!--#Talleres-->

<!--#CONFERENCIAS-->


<!--SEMINARIOS-->

<div id="seminarios"  class="info-curso ocultar clearfix">
  <div class="detalle-evento">
   
      <!--HTML5, CSS3, JAVASCRIPT-->
      <h3>Trámites</h3>
      <p><i class="fas fa-clock" aria-hidden="true"></i>09:00 hrs</p>
      <p><i class="fas fa-calendar" aria-hidden="true"></i>11 Diciembre</p>
      <p><i class="fas fa-user" aria-hidden="true"></i>Nombre Usuario</p>
  </div>
  <div class="detalle-evento">
      <h3>Tramite7</h3>
      <p><i class="fas fa-clock" aria-hidden="true"></i>09:15 hrs</p>
      <p><i class="fas fa-calendar" aria-hidden="true"></i>11 Diciembre</p>
      <p><i class="fas fa-user" aria-hidden="true"></i>Nombre Usuario</p>
  </div>
  <a href="#" class="button float-right">Ver Todos</a>
</div>  <!--#Talleres-->




<!--#SEMINARIOS-->





          
          </div> <!--.programa-eventos -->

      </div> <!--.contenedor-->

    </div>  <!--contenido-programa -->

  </section> <!--programa--> 

  

