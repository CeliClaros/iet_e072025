
<?php

session_start();
error_reporting(0);
$usuario= $_SESSION['email'];
 
 require_once 'includes/templates/barra-user.php'; 
 require_once 'includes/funciones/tramite.php';

//FILE:
//eventos_reservados.php

//VIEW: Vista de Objeto Evento

//text/x-generic eventos-reservados.php ( HTML document, UTF-8 Unicode text, with CRLF line terminators )

 ?>
 

 <section class="seccion">

    <h2>Tramites Reservados</h2>
      <p> </p>

  </section>  <!--seccion-->


  <section class="programa">  <!--Trámites-->
    <div class="contenedor-video">
    
      <video autoplay loop poster="img/bg-talleres.jpg" >


          <source src="img/fondo-fila.png" type="img"> 
      </video>
    </div>  <!--contenedor-video-->

    <div class="contenido-programa">
      <div class="contenedor">
          <div class="programa-evento">

        <h2>Tramites, estado actual</h2>

<nav class="menu-programa">
<?php 

//crea array para setear categorias
 $categoria=array();
 
 //Llama a la funcion del MODEL:
 
$lista_categoria= getCategoria();

//VIEW 
//muestra lista categorias:
    
 while ( $lista_categoria) {

//muestra categorias: VIEW
?>

   <a href="#talleres"><i class="<?php echo $lista_categoria['icono']; ?>" aria-hidden="true"></i> <?php echo $lista_categoria['tipo_tramite']; ?></a>
  
 <?php echo $lista_categoria['tipo_tramite']; ?></a>
  
 
    <?php 
} //fin while categoria tramites ?>

 </nav>


<?php 

// VA EN CONTROLLER????
//Llama funcion getRegistrados DEL MODEL:
//===========&& FUNCION CONTROLLER: &&==========================
$resultado= getRegistrados(); // validar variable, corresponde $resultado ó $listar_rta ????

//Llama las funciones de model Evento:

$listar_rta= getRegistrados();  

//Llama a la funcion que filtra por eventos del dia:

function eventosHoy($resultado){
    
//declara array para manejar eventos registrados:

$eventos=array();

//obtiene los datos desde arreglo asociativo:


  while($listar_rta=mysqli_fetch_assoc($resultado)) {

      $fecha_ver= $listar_rta['fecha_registro'];

    $fecha_filtro= date("Y-M-d", strtotime($fecha_ver));             //date("d F", strtotime($fecha));

   // $fecha_registrados= $listar_rta['fecha_registro'];


     $registrados_hoy= date("Y-M-d", strtotime($listar_rta['fecha_registro'] ));      //toma solo la fecha del dsteTime del registro;

  if ($registrados_hoy== date("Y-M-d") ){       //sin esto muestra todos los de la base!!! acá filtra los eventos del día


// Agregar: Y que el usuario sea el de la sesiòn para mostrar los botones sòlo en esa opciòn.

    $tipo_tramite= $listar_rta['id_tipo_tramite'];
    
    // arma el arreglo con datos del evento registrado:
    
        $un_evento = array(
          'tramite' => $listar_rta['id_registrado'], 
          'fecha' => $listar_rta['fecha_registro'], 
          'nombre' => $listar_rta['nombre'], 
          'apellido' => $listar_rta['apellido'],
          'email' => $listar_rta['email'],
          'tipo' => $listar_rta['id_tipo_tramite'],
          'tram' => $listar_rta['tramite_id']
          );

//BIEN: FILTRA POR TIPO_EVENTO
       // $eventos[$tipo_tramite][] = $un_evento;

//FILTRA POR FECHA:

$eventos[$fecha_filtro][]= $un_evento;

//$eventos[]= $un_evento;

}   //endif


}     //fin while FETCH_ASSOC;
          //var_dump($eventos);

return $un_evento;
    
} // fin funcion eventoHoy()

//===========&& FIN  FUNCION &&==========================

//===========&& FUNCION CONTROLLER????: &&==========================
//llamar la funcion eventosHoy:
//...

$eventos= eventosHoy(); // ver?? es $eventos??


//&&===============================&&
//VIEW: mostrar eventos
//IMPRIMIR TODOS LOS EVENTOS:

    foreach ($eventos as $dia => $lista_eventos) {  ?>
<?PHP     
     //=================================
     //VER: ??? ver si reemplazar por $eventos, listar_rta quedó en la funcion, ver si muestra el tramite!!
?>

 <h3>Tramite <?php echo $listar_rta['id_registrado']; ?> </h3> 
 
 <h3>Tramite <?php echo $eventos['tramite']; ?> </h3> 
//=====================================

    <?php foreach ($lista_eventos as $evento): ?>
                         
     //muestra los eventos: FORMULARIO HTML:
     
    <form role="form" action="selecciona_envia.php" method="post">
    
  
//View: Muestra ID del evento:
 <p class="titulo"> <?php echo $evento['tramite'] ?> </p>
                          
<?php  
//llama a la funcion tramite y envía como parámetros los nombres del TRamite y tipo_tramite.
//funcion tramite se llamó con include_once al principio:

$tramite=tramite( $evento['tipo']  , $evento['tram']);    

//Arma Json con respuesta de Function tramite.
$ver= json_decode($tramite, true); 

$nm_tramite=$ver['nm_tramite'];
$tipo_tramite=$ver['tipo_tramite'];
?>


<?PHP
//===========&& VISTA EVENTO???: &&==========================
?>


<!--VIEW: MUESTRA DATOS EVENTO: -->

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

   <!-- VER???  -->         <input  type="hidden" name="login-user" value="1" >   
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

  </i></p>
<!--COMENTADO:
      <p><i class="fas fa-clock" aria-hidden="true"></i> <?php //echo $hora . "hrs"; //$fecha; ?></p>
                    <p><i class="fas fa-calendar" aria-hidden="true"></i> <?php // echo $fecha_ver; ?> </p>
                    <p><i class="fas fa-user" aria-hidden="true"></i> <?php // echo $listar_rta['nombre'] . " " . $listar_rta['apellido']; ?> </p>

-->

  <?php    }      //fin foeach ?>

<?php 

  //var_dump($listar_rta);

 //       echo $listar_rta['id_tipo_tramite'];
 echo "<br>";

 $fecha= $listar_rta['fecha_registro'];
 $fecha_ver= date("d F", strtotime($fecha)); //, 'America/Argentina');
 $hora= date("H:i", strtotime($fecha)) ;
?>
<!-- VISTA???:   -->
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
  
<?php    echo "tipo tramite: " . $listar_rta['id_tipo_tramite'];  ?>

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
</div>  <!--TRAMITES-->

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

  
