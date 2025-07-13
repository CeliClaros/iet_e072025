
<?php 
  session_start();
   ?>

<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">

  <!--link rel="stylesheet" href="css/fontawesome.min.css"-->

  <!--íconos de awesome:-->
  <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

  <!--link rel="stylesheet" href="css/fontawesome.css"-->

  <!--tipos de letra de api google:-->

  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald&family=PT+Sans&display=swap" rel="stylesheet">
  
  
  <!--lifelet MAPA-->

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
  
  <link rel="stylesheet" href="css/main.css">

  <meta name="theme-color" content="#fafafa">



  <script src="https://www.google-analytics.com/analytics.js" async></script>
   

  <script src="js/jquery/jquery-1.12.0.min.js"></script>


  <script src="js/vendor/jquery.animateNumber.min.js" ></script>

  <script type="text/jQuery" src="js/jquery.countdown.js"></script>



</head>

<body>
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <!---->

  <header class="site-header">
  <div class="hero">  
    <div class="contenido-header">
      <nav class="redes-sociales">
        <a href="#"><i class="fab fa-facebook-square"></i></a>

        <a href="#"><i class="fab fa-twitter-square"></i></a>
        <a href="#"><i class="fab fa-pinterest-square"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
      

<!-- PRUEBA PERFIL USUARIO: 
      <nav class="navegacion-principal clearfix">
        <div class= "fas fa-power-off">
             <a href="#" > Mi Perfil</a>
     </div>
         </nav>  FIN PRUEBA PERFIL-->



   <!--     //<i class="fab fa-youtube"></i>
        <a href="#"><i class="fab fa-youtube"></i></a>
        <i class="fas fa-user-clock"></i>

       <br>
        
        <!--i class="far fa-calendar-alt"></i>
        <i class="far fa-calendar-check"></i>
        <i class="fas fa-hourglass"></i>
        <i class="fas fa-hourglass-start"></i>
        <i class="fas fa-hourglass-half"></i>
        <i class="fas fa-hourglass-end"></i>
        <i class="far fa-compass"></i>

        <i class="fas fa-map-marker-alt"></i>
        
        
        <i class="fas fa-bell"></i>
        
        <i class="fas fa-bell-slash"></i>

        <i class="fas fa-star"></i-->
<!--  -->
      </nav>
      <div class="informacion-evento">
      <div class="clearfix">
        <p class="fecha"><i class="far fa-calendar-alt"></i> <?php // setlocale(LC_ALL,"es_ES"); echo date("d-M");  //echo TODAY() ?> </p> <!--10-12-Dic</p>  -->
        <p class="ciudad"><i class="fas fa-map-marker-alt"></i>  Buenos Aires, AR</p>
      </div>
        <h1 class="nombre-sitio">  Invierte el tiempo!<br> <i class="fas fa-user-clock"></i></h1>
          
          <br>     
        <p class="slogan"><span>Tu tiempo es importante</span>, aprovechalo como mejor te parezca mientras esperas tu turno</p>
      </div> <!--informacion-evento-->
      
    </div> <!--contenido-header-->
    
  </div>  <!--class hero-->


  </header>
  <!-- PRUEBAAAAA-->

  <div class="barra">

    <div class="contenedor clearfix">

      <div class="logo">
          <a href="index.php">
        <!--DANI introducir logo.svg
        <img src="img/logo.svg" alt="logo gdlwebcamp">-->
        <!--
            "iet"  -->
        </a>

        <a href=""></a>
      </div>
      
      <div class="menu-movil">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <nav class="navegacion-principal clearfix">
        <!--
        <a href="#">Trámite</a>  --> <!--TRAMITE ES CONFERENCIA-->
 <!--  

       <a href="#">Calendario-Trámite</a>
        <a href="#">INVITADOS- Empleados?</a>
        <a href="listado.php">Listado Turnos</a>
        <a href="registro.php">Reservar Turno</a>

        <a href="listado.php">Login</a>

        <a href="login_user.php">Login</a>

        <a href="registro.php">Registro para iniciar</a>
        <a href="cartilla.php">Inicio</a>   VER-
        <a href="cartilla.php">Cartilla Trámites</a>
         <a href="registro_borrador_ajax5.php">Disponibilidad</a>
'selecciona-envia.php-->
  <!--          <a href="selecciona-envia.php">Disponibilidad</a>
        <a href="listado.php">Disponibilidad</a>
        <a href="listado.php">Estado Atención</a>
         <a href="#">Perfil, Mis Turnos (Logs)</a>  -->
<!--        <a href="registro.php">Reservar Turno</a>  
       <a href="registro_borrador_ajax5.php">Solicitar Notificación</a>-->
<!--      <a href="notifica-dinamico1.php">Solicitar Notificación</a> 
        <a href="notifica-dinamico3.php4>Mi_Evento</a>-->
         
<!--
         <div class= "fas fa-power-off">
             <a href="#" > Mi Perfil</a>
     </div> CON DIV RECUADRA EL BOTON EN NJA-->
 <a href="#"><i class="fa fa-youtube"></i></a>
 <a href="#"><i class="ion ion-user-o"></i></a>  <!-- disponibilizar icono USER para Opcion Config.PERFIL  
       <a href="#" > Mi Perfil</a>-->
          <a href="cartilla.php">Cartilla</a>
           <a href="eventos-reservados.php">Eventos</a>
         <a href="notifica-dinamico4.php">Mi_Evento</a>
    <!--          <a href="registro_borrador_ajax5.php">Perfil</a> 
        <a href="registro_borrador_ajax5.php">Reservar Turno</a>-->

         
 

             <a href="selecciona-envia.php">Reservar Turno</a>
      </nav>


    </div>  <!--contenedor-->
  </div>  <!--barra-->

  
  
 
  