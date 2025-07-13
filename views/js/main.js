(function() {
    //  "use strict";
     // var regalo= document.getElementById('regalo');  valor regalo para comentarios dentro de PRUEBA2
  
      var regalo= document.getElementById('tramite');
  
      document.addEventListener('DOMContentLoaded', function(){
          console.log('listo');
  
  
  // &&&&&&&&&&&& INICIA MAPA   &&&&&&&&&&&&&&&&&
  
          //MAPA:
          //var map = L.map('mapa').setView([51.505, -0.09], 13);
  
         // You clicked the map at LatLng(-34.159532, -58.958709) Roca 15,Campana, Bco.Nacion.
         var map = L.map('mapa').setView([-34.159532, -58.958709], 16);
  
          //-34.159537, -58.958682   ||  -34.159528, -58.958682
  
          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
              attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          }).addTo(map);    
         L.marker([-34.159532, -58.958709]).addTo(map)
          //    .bindPopup('hola!')
           //   .openPopup();
          .bindPopup('<strong>Banco Nación Argentina <br>Sucursal Campana</strong> ')
          .openPopup();
        
         // .bindTooltip('Un Tooltip')
         // .openTooltip();
  
  
        //  L.marker([51.5, -0.09]).addTo(map)
         // .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
             
              //.bindPopup('<strong>Estás aquí.<br>Bco.Nación Arg. Suc.Campana</strong>:) ')
         //  .openPopup();
  
          // &&&&&&&&& FIN MAPA &&&&&&&&
  
  
          //Campos Datos de Usuario:
  
          var nombre = document.getElementById('nombre');
          var apellido = document.getElementById('apellido');
          var dni = document.getElementById('dni');
          var email = document.getElementById('email');
  
          // Campos Pases  ---  Campos de Trámites:
          var pase_dia = document.getElementById('pase_dia'); //caja 
          var pase_completo = document.getElementById('pase_completo');  //personalizado
          var pase_dosdias = document.getElementById('pase_dosdias');  //consultas
          
          var tramite = document.getElementById('tramite');  //TRAMITE
  
  
  
          var camisas = document.getElementById('camisas');
          var etiquetas = document.getElementById('etiquetas');
  
  
          //Botones y divs
          var calcular = document.getElementById('calcular');
          var errorDiv = document.getElementById('error');
          var botonRegistro = document.getElementById('btnRegistro');   //v.206
          //var lista_productos = document.getElementById('lista-productos');
          
          //PONE GRISADO EL BOTON RESERVAR: (NO FUNCIONAN GRISANDO!!! BLOQUEAN LA FUNCIONALIDAD!!!!!)
              botonRegistro.disabled = true;
              //console.log("Por favor Verifique disponibilidad antes de Reservar")
         // btnRegistro.disabled=true;
         //document.getElementById('submitbutton').disabled = !cansubmit;
         //document.getElementById('calcular').disabled = !cansubmit;
          
          
          
          var suma = document.getElementById('tiempo-espera');      //('suma-total');
  
          var cant = document.getElementById('cant-turnos');
  
          var lista = document.getElementById('hora-aprox');    //('lista-roductos'p);
          //var hora_aprox_atencion = document.getElementById('hora_aprox_at');
  
  
        //  var lista_productos = document.getElementById('tramite');
          //var lista = document.getElementById('lista-productos');
         
  
          //INICIA IF  PARA ELIMINAR EL ERROR CONSOLE, LINEA 83, V254:
          //CIERRA ESTE IF EN LINEA 400:
  
          if(document.getElementById, ('calcular')){
  
          calcular.addEventListener('click', calcularMontos);   //CalcularMontos Funcion de Calcular Disponibilidad
  
  
        // pase_dia.addEventListener('click', mostrarDias);  //cuando se cambia el valor ingresado no sirve el clic, usar blur. 
       //   pase_dia.addEventListener('blur', mostrarDias);   //con blur, el input toma el último valor que se cargó.
       //   pase_dosdias.addEventListener('blur', mostrarDias); 
       //   pase_completo.addEventListener('blur', mostrarDias); 
  
  
  
  
          nombre.addEventListener('blur', validarCampos);
  
          apellido.addEventListener('blur', validarCampos);
  
          dni.addEventListener('blur', validarnro);
  
          email.addEventListener('blur', validarCampos);
  
  
  
          email.addEventListener('blur', validarMail);
  
  
  
  
          nombre.addEventListener('blur', function(){
  
              if(this.value == ' '){
  
                  errorDiv.style.display= 'block';
                  errorDiv.innerHTML="este campo es obligatorio";
                  this.style.border= '1px, solid, red';
                  errorDiv.style.border = '1px solid red';
              }
          });
  
  
  
          apellido.addEventListener('blur', function(){
  
              if(this.value == ' '){
  
                  errorDiv.style.display= 'block';
                  errorDiv.innerHTML="este campo es obligatorio";
                  this.style.border= '1px, solid, red';
                  errorDiv.style.border = '1px solid red';
              }
          });
  
  
          
  
  
  
          function validarCampos(){
              if(this.value == ''){
  
                  errorDiv.style.display= 'block';
                  errorDiv.innerHTML="este campo es obligatorio";
                  this.style.border= '1px solid red';
                  errorDiv.style.border = '1px solid red';
              } else{
  
                  errorDiv.style.display= 'none';
                  this.style.border= '1px solid #cccccc';
              }
         }
  
  
         function validarMail(){
              if(this.value.indexOf("@") > -1){
  
                  errorDiv.style.display= 'none';
                  this.style.border= '1px solid #cccccc';
              }else{
  
                  errorDiv.style.display= 'block';
                  errorDiv.innerHTML="debe tener al menos un '@' ";
                  this.style.border= '1px solid red';
                  errorDiv.style.border = '1px solid red';
              }
  
         }
  
  
  
         function validarnro(){
             var nro = parseInt(dni.value, 10) || 0;
             console.log(dni.value);
  
         if((this.value > 4000000) && (this.value < 71000000)){
       //  if((this.value.indexOf('1-9') < -1)){ // && (this.value.indexOf('1-9') < 72000000)){
  
        //  errorDiv.style.display= 'block';
         // errorDiv.innerHTML="No es dni válido' ";
        //  errorDiv.style.border = '1px solid red';
  
           errorDiv.style.display= 'none';
           this.style.border= '1px solid #cccccc';
         //  innerHTML="Correcto!! ";
  
           console.log('correcto!');
  
          }else{
  
              errorDiv.style.display= 'block';
              errorDiv.innerHTML="debe tener al menos un nro. de dni válido";
              this.style.border= '1px solid red';
              errorDiv.style.border = '1px solid red';
          }
  
     }
  
  
  
  
  
          //iNGRESAR TRAMITE:
       
  
          //PRUEBA BOTON: funciona ok!!!
          //CALCULAR DISPONIBILIDAD:
  
              function calcularMontos(event){
         // calcular.addEventListener('click', calcularMontos);
  
              event.preventDefault;
             console.log("Has hecho clic en Calcular");
              console.log(tramite.value);
  
              
  
              if(tramite.value === ''){
  
                  alert('Por favor selecciona un Trámite');
                  tramite.focus();
              }else{
                  //var pruebaHora = new Date();            
                  var fechaHoy = new Date();  //VER VIDEO 207, MINUTO 6 EN ADELANTE PARA VER COMO AGREGAR MÁS CAMPOS.
                  
                  console.log(fechaHoy); 
                //  calcularDemora(); //devolver cantidad de turnos anteriores?? y tiempo de espera
  
                  console.log(tramite.value);
  
                //  lista_productos.innerHTML="PROBANDO IMPRESION";
                  lista.innerHTML=fechaHoy;   //DEFINIR FUNCTION PARA CALCULAR "hora-aprox" DE ATENCION.
                  suma.innerHTML=fechaHoy;    //DEFINIR FUNCTION PARA CALCULAR "tiempo-espera".
  
                  cant.innerHTML=fechaHoy;    //DEFINIR FUNCTION PARA CALCULAR "cant-turnos"PREVIOS.
  /*
  VIENEN DE VARIABLES DEFINIDAS ENTRE LAS LINEAS: 78 Y 82
  
        var suma = document.getElementById('tiempo-espera');      //('suma-total');
  
          var cant = document.getElementById('cant-turnos');
  
          var lista = document.getElementById('hora-aprox');  
  
  
  
  
  */
  
  
  
  
  
                  botonRegistro.disabled= false;
               //   document.getElementById('tramite');  //.value= tramiteselec;                
                  //document.getElementById('total_pedido').value= tramite;  //vs.345, min:3:29
                 // document.getElementById('total_pedido').innerHTML= tramite;  //vs.345, min:3:29
                  
                  /*no responde lo siguiente, no imprime el resumen desde el for!!
              
                  var listadoTurnos= [];
                  if(fechaHoy > 0){
                  listadoTurnos.push(fechaHoy + 'fecha de hoy!');
                  }
                  console.log(listadoTurnos);
  
                 // lista_productos.innerHTML="PROBANDO IMPRESION";
                  
                  var resultado= 'listadoTurnos';  
                  for(var i = 0; i < listadoTurnos.length; i++){
                      lista_productos.innerHTML += listadoTurnos[i] + 'prueba' + '</br>';
                    //  lista.innerHTML += listadoTurnos[i] + 'prueba' + '</br>';
                    //  var imprimir.innerHTML += listadoTurnos[i] + 'prueba' + '</br>';
                     // lista.innerHTML += listadoTurnos[i] + 'prueba' + '</br>';
              */
                  
                  }
  
                  /*
                  //console.log('ya elegiste trámite');
                  //console.log(tramite.value);
                  var tramiteHoy = tramite.value;         //DEBERIA TOMAR LA FECHA Y HORA DEL CLIC EN UNA VARIABLE DE TEMPO!!
                  
                  var hoy= new Date();
                //  hoy= getTime();
                //  var tramiteTime= hoy;           //getTime();
  
                  var fecha= hoy.getDay() + '-' + (hoy.getMonth()+1) + '-' + hoy.getFullYear();
  
                  var hora= hoy.getHours() + ';' + hoy.getMinutes + ':' + hoy.getSeconds();
                  var fecha_hora= new Date();
                  var fecha_hora= fecha + ' ' + hora;
                      
                  console.log(fecha_hora.value);          */
                  
                  //console.log(fecha.value);
                  //console.log(tramiteTime.value);
  
              /*PRUEBA FECHA:
                  var pruebaHora = new Date();
                  var fechaHoy = new Date();
                  
                  console.log(pruebaHora);
                  */
  
                 // document.write(fechaHoy.getHours());
  
                // console.log( document.write(fechaHoy.getDate()));   //escribe en HTML la respuesta
  
                 //VER COMO ESCRIBIR LA RESPUESTA EN CONSOLE DE JS
  
                //  document.write(d.getHours());
  
                 // var fechaHoy= pruebaHora.getDate();
                 // console.log(fechaHoy.value);
  
              }
  
     // }
  
  /*PRUEBA2
          function calcularMontos(event){
  
              var camisas = document.getElementById('camisas');
  
              var etiquetas = document.getElementById('etiquetas'); 
  
              event.preventDefault();
  
             // console.log("Has hecho clic en Calcular");
             // console.log(regalo.value);
              if(regalo.value === ''){
                  alert("Por favor, Selecciona un Trámite.");
                  regalo.focus();
              }else{
                 // console.log("Ya elegiste regalo");
                  /*
                  console.log(pase_dia.value);
                  console.log(pase_dosdias.value);
                  console.log(pase_completo.value);
                  * /     CORREGIR PARA CONTINUAR!! LUEGO DE PRUEBA2
  
                  var boletosDia = parseInt(pase_dia.value, 10) || 0;
                  var boletos2Dias = parseInt(pase_dosdias.value, 10) ||0;
                  var boletoCompleto = parseInt(pase_completo.value, 10) ||0;
                  var cantCamisas = parseInt(camisa_evento.value,10) ||0;
                  var cantEtiquetas = parseInt(etiquetas.value, 10) || 0;
  
  
                  console.log("Boletos Día: "+ boletosDia);
                  console.log("Boletos 2 Días: "+ boletos2Dias);
                  console.log("Boletos Completos: "+ boletoCompleto);
  
                  var totalPagar = (boletosDia * 30) + (boletos2Dias * 45) + (boletoCompleto * 50) + ((cantCamisas * 10) * .93) + (cantEtiquetas * 2);
                  console.log(totalPagar);
  
                  var listadoProductos = Array();
  
                  if(boletosDia >= 1) {
                  listadoProductos.push(boletosDia + 'Pases por día');
                  }
                  if(boletos2Dias >= 1) {        
                  listadoProductos.push(boletos2Dias + 'Pases por Dos días');
                  }
  
                  if(boletoCompleto >= 1){
                  listadoProductos.push(boletoCompleto + 'Pases Completos');
                  }
  
                  if(cantCamisas >= 1){
                      listadoProductos.push(cantCamisas + 'Camisas');
                      }
  
                      if(cantEtiquetas >= 1){
                          listadoProductos.push(cantEtiquetas + 'Etiquetas');
                          }
  
  
                //  var resultado = '';
                lista_productos.style.display = "block";        //elimina, es decir, NO MUESTRA, el recuadro gris si no hay datos cargados.  
  
                lista_productos.innerHTML = "";
                  for(var i=0; i < listadoProductos.length ; i++){
                      lista_productos.innerHTML += listadoProductos[i] + '<br/>';
                  }
                  suma.innerHTML = "$ " + totalPagar.toFixed(2);
                  //console.log(listadoProductos);
  
              }
          }
  
  
  FIN PRUEBA2!!
  */
  
          
          function mostrarDias(){
              //console.log("has hecho un clic");
              //console.log(pase_dia.value);
  
              var boletosDia = parseInt(pase_dia.value, 10) || 0;
              var boletos2Dias = parseInt(pase_dosdias.value, 10) ||0;
              var boletoCompleto = parseInt(pase_completo.value, 10) ||0;
  
              var diasElegidos = [];
              if(boletosDia >=1){
  
                  diasElegidos.push('viernes');
              }
              if(boletos2Dias > 0){
  
                  diasElegidos.push('viernes', 'sabado');
              }
  
              if(boletoCompleto > 0){
                  diasElegidos.push('viernes', 'sabado', 'domingo');
              }
  
              for(var i=0; i < diasElegidos.length; i++) {
  
                  document.getElementById(diasElegidos[i]).style.display= 'block';
              }
  
          }
  
         // CONTINUAR...
  
          } //if para evitar los errores de console con addElementListener
         
      }); //DOM CONTENT LOADED
  
  })();
  
  
  $(function(){
  
  //alert("funciona");
  
  //$('div.ocultar').hide();  //se agrego como display: none en main.css
  
  //PROGRAMA DE CONFERENCIAS, PRIMERA PESTAÑA:
  $('.programa-evento .info-curso:first').show();
  
  $('.menu-programa a').addClass('activo');
  
  //TRACKING PARA VER QUÉ ENLACE SE SELECCIONÓ:
  
  $('.menu-programa a').on('click', function(){
  
      $('.menu-programa a').removeClass('activo');
  
       $(this).addClass('activo');
  
      $('.ocultar').hide();
  
  
      var enlace = $(this).attr('href');
     // console.log('enlace');  //PRUEBA PARA VER SI EL LINK DE LAS PESTAÑA RESPONDE.
  
     $(enlace).fadeIn(1000);
  
     return false;
  });
  
  
  // });
  
  
  //Fin Programa Conferencias
  
  
  //MENU FIJO:
  
  var windowHeight= $(window).height();  //cuanto mide la ventana
  var barraAltura = $('.barra').innerHeight(true); //cuanto mide la barra
  console.log(barraAltura);
  
  //Scroll para dejar menu fijo (v.253)
  //console.log(windowHeight);
  $(window).scroll(function() {
      var scroll= $(window).scrollTop();  //cuantos scroll se están haciendo en la página.
     // console.log(scroll);
      if(scroll > windowHeight){
          //console.log("ya rebazaste la altura de la pantalla");
          $('.barra').addClass('fixed');
          $('.body').css({'margin-top': barraAltura+'px'});
      } else {
          console.log("Aún no!!");
          $('.barra').removeClass('fixed');
          $('.body').css({'margin-top': '0 px'});
  
      }
  });
  
  //Fin MENU FIJO .-
  
  //Menu Responsive: MENU HAMBURGUESA (V.255?)
  
  $('.menu-movil').on('click', function(){
      $('.navegacion-principal').slideToggle();
  
  });
  
  
  //Animaciones para los Numeros:
  
  $('.resumen-evento li:nth-child(1) p').animateNumber({ number: 6 }, 3000);
  $('.resumen-evento li:nth-child(2) p').animateNumber({ number: 15 }, 1800);
  $('.resumen-evento li:nth-child(3) p').animateNumber({ number: 3 }, 1200);
  $('.resumen-evento li:nth-child(4) p').animateNumber({ number: 9 }, 1200);
  
  });
  
  //Cuenta Regresiva
  /*
  var fechaVer= fechaHoy + 5;
  console.log(fechaVer);
  dias= innerHTML(fechaVer);
  */
  
  //var self= event;
  
  
  //$('.cuenta-regresiva').countdown('start');
  
  //$(document).ready(function(countdown) { });
  //jQuery(document).ready(function(('#clock').countdown('start')));
  //jQuery(document).ready(function(('#clock').countdown('start')));
  jQuery(document).ready( function(countdown){   //esto faltaba para que aparezca!!
  //jQuery(document).ready(function($){
  
  $('.cuenta-regresiva').countdown('2020/12/24 09:00:00',function(event){
      $(this).html(event.strftime('%D Dias  %H Horas: %M Minutos: %S Segundos')); //esto es lo que esta mostrando y sin CSS(20201210)
  
      $('#dias').html(event.strftime("%D"));  
      $('#horas').html(event.strftime('%H'));
      $('#minutos').html(event.strftime('%M'));
      $('#segundos').html(event.strftime('%S'));  /* VEEER*/
  })
  
  
  $('#clock').countdown("2020/12/24", function(event) {
      var totalHours = event.offset.totalDays * 24 + event.offset.hours;
      $(this).html(event.strftime(totalHours + ' hr %M min %S sec'));
    });
  
  }) //fin ready_function
  
  //$('.cuenta-regresiva').countdown('start');
  
      //$(this).html(event.strftime('%D days %H:%M:%S'));
  /*
      jQuery(document).ready(function(('#clock').countdown('start')));
  
      jQuery(document).ready(function( $('#clock').countdown("2020/10/10", function(event) {
          $(this).html(event.strftime('%D days %H:%M:%S'));
        }));
      ;
  */
  
  /*
  
     // $('#clock').countdown('start');
  //var self=this;
  
  $('#clock').countdown('start'); $('#clock').countdown("2020/10/10", function(event) {
      $(self).html(event.strftime('%D days %H:%M:%S'));
    });
  
  
  
  
         $('#clock').countdown('start'); $('#clock').countdown("2020/10/10", function(event) {
          $(this).html(event.strftime('%D days %H:%M:%S'));
        });
  
        $('#getting-started').countdown('start');
  
  
  */
  
  //});
  
  
  //Menu Fijo: Scroll
  
  window.scroll(function(){
      var scroll = $window.scrollTop();
      console.log(scroll);
  })  
  
  