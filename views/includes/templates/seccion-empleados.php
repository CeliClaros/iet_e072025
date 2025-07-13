<?php include_once "includes/templates/header.php" ; ?>


  <section class="seccion">

    <h2>Trámites Seleccionados</h2>
      <p> </p>

  </section>  <!--seccion-->


  <section class="programa">  <!--Trámites-->
    <div class="contenedor-video">
     
      <video autoplay loop poster="img/bg-talleres.jpg" >

      <source src="video/video.mp4" type="video/mp4">
      <source src="video/video.webm" type="video/webm">
      <source src="video/video.ogv" type="video/ogg">
      
      </video>

  
    </div>  <!--contenedor-video-->

    <div class="contenido-programa">
      <div class="contenedor">
          <div class="programa-evento">

            <!--h2>PROGRAMA DEL EVENTO
            OJO!, VER BIEN EN ESTA PARTE DE CAMBIAR LOS TEXTOS DEL MENU!!!!
            </h2-->

            <h2>Trámites, estado actual</h2>

            <nav class="menu-programa">
                <!--
                <a href="#talleres><i class="fas fa-code" aria-hidden="true"></i>Talleres</a>
                <a href="#conferencias"><i class="far fa-comment" aria-hidden="true"></i>Conferencias</a>
                <a href="#"><i class="fas fa-landmark" aria-hidden="true"></i>Seminarios</a>
                -->
                <a href="#talleres"><i class="fas fa-landmark" aria-hidden="true"></i>Trámites en Caja: Transferencias</a>

                <a href="#conferencias"><i class="fas fa-landmark" aria-hidden="true"></i>Trámites Personalizados:  Inversiones,Pagos</a>
                <a href="#seminarios"><i class="fas fa-landmark" aria-hidden="true"></i>Consultas, Productos, Servicios</a>

            </nav>
        
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



<section class="invitados contenedor  seccion">   
  <!--USUARIOS-->

  <h2>Nuestros Empleados / Clientes</h2>
  <ul class="lista-invitados clearfix">
    <li>
      <div class="invitado">

        <img src="img/invitado1.jpg" alt="imagen invitado">
        <p>Rafael Bautista. EMPLEADO1</p>
      </div>
    </li>

     <li>
      <div class="invitado">

        <img src="img/invitado2.jpg" alt="imagen invitado">
        <p>Susana Rivera. EMPLEADO2</p>
      </div>
    </li>
    <li>
      <div class="invitado">

        <img src="img/invitado3.jpg" alt="imagen invitado">
        <p>Gregorio Sanchez. EMPLEADO3</p>
      </div>
    </li>
    <li>
      <div class="invitado">

        <img src="img/invitado4.jpg" alt="imagen invitado">
        <p>Shari Herrera. EMPLEADO4</p>
      </div>
    </li>

    <li>
      <div class="invitado">

        <img src="img/invitado5.jpg" alt="imagen invitado">
        <p>Harold Garcia. EMPLEADO5</p>
      </div>
    </li>

    <li>
      <div class="invitado">

        <img src="img/invitado6.jpg" alt="imagen invitado">
        <p>Susan Sanchez. EMPLEADO6</p>
      </div>
    </li>

  </ul>
</section>

<div class="contador parallax">
  <div class="contenedor"></div>
  <ul class="resumen-evento clearfix">

    <li><p class="numero"></p>Invitados</li>
    <li><p class="numero"></p>Talleres</li>
    <li><p class="numero"></p>Días</li>
    <li><p class="numero"></p>Conferencias</li>
  </ul>
</div>

<div class="newsletter parallax">
<div class="contenido contenedor">
  <p>Registrate</p>
  <h3>IET</h3>
  <a href="registro.html" class="button transparente">Registro</a>

</div>  <!--contenido-->
</div>  <!--newsletter-->

<section class="seccion">
<h2>Faltan</h2>
<div class="cuenta-regresiva contenedor">
  <ul class="clearfix">
    <li><p id="dias" class="numero"></p>días</li>
    <li><p id="horas" class="numero"></p>horas</li>
    <li><p id="minutos" class="numero"></p>minutos</li>
    <li><p id="segundos" class="numero"></p>segundos</li>

    <span id="clock"></span>
    
    <div id="getting-started"></div>



    


<!--

    <div id="getting-started"></div>
<script type="text/javascript">
  jQuery('#getting-started').countdown("2021/01/01", function(event) {
    jQuery(this).html(event.strftime('%w weeks %d days %H:%M:%S'));
  }) ;
</script>

-->



  </ul>
</div>


</section>





<section class="precios seccion">  <!--Reemplazando la sección class: precios seccion -->
  <h3>Trámites Disponibles </h3>
  <div class="contenedor">
    <ul class="lista-precios clearfix">  <!--lista de Trámites Posibles-->
      <li>
        <div class="tabla-precio"> <!--Tabla Trámite-->
          <h3>Atención en Caja</h3>
            <!--p class="numero">30 VER REEMPLAZO, IMG</p-->  <!--numero ES descripción del Trámite-->
              <ul>
                <li><i class="fas fa-check"></i>  Pagar Servicios e Impuestos </li>
                 <li><i class="fas fa-check"></i>  Transacciones: Cobros, Depósitos</li> 
                  <li><i class="fas fa-check"></i>  Transferencias</li> 
              </ul>

              <!--BOTON RESERVA-->
              <!--
              <a href="registro.html" class="button hollow">Reservar</a>
              -->

              <!--FIN BOTON RESERVA-->

        </div>
      </li>

              <li>
                <div class="tabla-precio"> <!--Tabla Trámite-->
                  <h3>Atención  Personalizada</h3>
                   <ul>
                     <li><i class="fas fa-check"></i>  Operar Bonos y Acciones</li>
                     <li><i class="fas fa-check"></i>  Inversiones</li>
                     <li><i class="fas fa-check"></i>  Títulos y Valores</li>
                   </ul>

                   <!--BOTON RESERVA-->
                   <!--
                    <a href="registro.html" class="button hollow">Reservar</a>
                   -->
                    <!--FIN BOTON RESERVA-->

                </div>
                  </li>

               <li>
                 <div class="tabla-precio"> <!--Tabla Trámite-->

                   <h3>Informes Recepción</h3>
                     <ul>
                       <li><i class="fas fa-check"></i>  Blanqueo de Claves</li>
                       <li><i class="fas fa-check"></i>  Solicitar algún Producto o Servicio al Banco</li>
                      <li><i class="fas fa-check"></i>  Consultas</li>
                    </ul>

                    <!--BOTON RESERVA-->

                <!-- a href="registro.html" class="button hollow">Reservar</a  -->  

                    <!--FIN BOTON RESERVA-->

                 </div>
               </li>
    </ul>
<!--
  </section>
-->





<!--
<section class="seccion contenedor">

  <h2>Registro de Usuarios</h2>
  <form id="registro" class="registro action="index.html" method="POST"></form>
  <div id="datos_usuario" class="registro caja clearfix"></div>

  <div class="campo">
  <label for="nombre">Nombre:</label>
  <input type="text" id="nombre" name="nombre" placeholder="Tu Nombre"> 
  </div>
  
  <div class="campo">
  <label for="apellido">Apellido:</label>
  <input type="text" id="apellido" name="apellido" placeholder="Tu Apellido">
  </div>

  <div class="campo">
    <label for="dni">DNI:</label>
    <input type="text" id="dni" name="dni" placeholder="Tu Documento">
    </div>


    <div class="campo">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" placeholder="Tu Email">
      </div>

<div id="error"></div>

</section>
-->

<!--PAGOS Y EXTRAS-->   <!--RESUMEN Y RESERVA DE TURNO-->


<div id="resumen" class="resumen clearfix">
  <h3>Selección y Reserva</h3>  <!--RESUMEN -->
  <div class="caja clearfix">
    <div class="extras">

      <!--REGALOS -- >
      <div class="orden">
        <label for="camisa_evento">Camisa del evento $10 <small>(descuento 70% dto.)</small></label>
        <input type="number" min="0" name="camisas" id="camisa_evento" size="3" placeholder="0">
      </div>  <! --orden-->

     <!--Etiquetas
      <div class="orden">
        <label for="etiquetas">Paquetes de 10 Etiquetas $2 <small>(HTML5, CSS3, JavaScript, Chrome)</small></label>
        <input type="number" min="0" name="etiquetas" id="etiquetas" size="3" placeholder="0">
      </div>  <! --orden -- >
       FIN INPUT ETIQUETAS -->
      <!--#FIN INPUTS REGALOS-->


      <div class="orden">
        <strong>  <label for="tramite"> Por favor, Seleccione un Trámite </label> <br> </strong>
        <select name="" id="tramite" required>
          <option value="">==Selecciona un Trámite==</option> 
          <option value="">==*Atención en Caja*==</option> 
          <option value="PAGAR">Pagar Servicios e Impuestos</option>
          <option value="TRANSAC">Transacciones, Cobros, Depósitos</option>
          <option value="TRANSFE">Transferencias</option>
          <option value="CAJA">Otros</option>
          
          <option value="">==*Atención Personalizada*==</option> 
          <option value="OPERAR">Operar Bonos y Acciones</option>
          <option value="INV">Inversiones</option>
          <option value="TIT">Títulos y Valores</option>
          <option value="PERS">Otros</option>

          <option value="">==*Informes Recepción*==</option> 
          <option value="CONS">Consultas</option>
          <option value="CLAVE">Blanqueo de Clave</option>
          <option value="CLIENT">Informes para Clientes</option>
          <option value="INFO">Otros</option>
        </select>
      </div> <!--orden-->

      <input id="calcular" type="button" class="button" value="Calcular Disponibilidad">

    </div> <!--extras-->
      <div class="total">
      
        <p>Día y Hora Seleccionados, [Día y Hora aprox. de Atención]:</p>  <!--era: Resumen:-->
        <div id="lista-productos"> </div>    <!--"para poner un resumen de todo lo que está comprando"-->
      

          <p>Cantidad de turnos anteriores:</p>
          <div id="cant-turnos"></div>

        <p>Tiempo de Espera:</p>  <!--Total-->
        <div id="suma-total">
          <!--para mostrar lo que está pagando-->
        </div>



        <input id="btnRegistro" type="submit" class="button" value="Reservar">

      </div> <!--.total-->
  </div>  <!--.caja-->
</div>  <!--#resumen-->

</section>

<div id="mapa" class="mapa">

  <!--los datos se ven en JS-->
</div>


<section class="section"></section>


<?php include_once "includes/templates/footer.php" ; ?>

