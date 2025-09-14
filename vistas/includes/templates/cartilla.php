
<!---->
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <?php 

  require_once 'includes/templates/barra-user.php';
  // require_once 'includes/templates/cartilla.php';


 ?>
</head>
<body>





<!--INICIO PAQUETES:-->


<div id="paquetes" class="paquetes">    <!--Seleccionar Trámite-->
  <h3>Cartilla de Trámites</h3>

  <ul class="lista-precios clearfix">  <!--lista de Trámites Posibles-->
      <li>
        <div class="tabla-precio"> <!--Tabla Trámite-->
       <!-- <a href="registro_borrador_ajax5.php"> <h3>Atención en Caja</h3></a>  -->

          <h3>Atención en Caja</h3>
            <!--p class="numero">30 VER REEMPLAZO, IMG</p-->  <!--numero ES descripción del Trámite-->
              <ul>
                <li><i class="fas fa-check"></i>  Pagar Servicios e Impuestos </li>
                 <li><i class="fas fa-check"></i>  Transacciones: Cobros, Depósitos</li> 
                  <li><i class="fas fa-check"></i>  Transferencias</li> 
              </ul>
              
              <!--a href="#" class="button hollow">Reservar</a-->

              <!--

              <div class="orden"> <! --seleccionar trámite ó agregar cantidad de boletos en original- ->
                  <label for="pase_dia">Selecciona Trámite</label>    <! --pase_dia es Atencion x Caja- ->
                  <! --input type="number" min="0" id="pase_dia" size="3" placeholder="0"- ->
                  <input type="text" min="" id="pase_dia" size="20" placeholder="0">
              
              </div>
          -->

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

                    <!--a href="#" class="button hollow">Reservar</a-->

                      <!--
                    <div class="orden"> <! --seleccionar trámite ó agregar cantidad de boletos en original- ->
                      <label for="pase_completo">Selecciona Trámite</label>   <! --pase_completo es Atención Personalizada-->
                      <!--.nput type="number" min="0" id="pase_completo" size="3" placeholder="0"- ->
                      <input type="text" min="" id="pase_completo" size="20" placeholder="0">
                      
                  </div>
              -->

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
                <!--a href="#" class="button hollow">Reservar</a-->  


                <!--    

                <div class="orden"> <! --seleccionar trámite ó agregar cantidad de boletos en original- ->
                  <label for="pase_dosdias">Selecciona Trámite</label>  <!- -pase_dosdias es Atención Recepción- ->
                  <! --input type="number" min="0" id="pase_dodsias" size="3" placeholder="0"- ->
                  <input type="text" min="" id="pase_dosdias" size="20" placeholder="0">
                  <! --input type="text" min="" id="  -pase_dosdias" size="25" placeholder="0"- ->
              </div>

              
          -->


                 </div>
               </li>
    </ul>

</div>  <!--#paquetes-->

<!--FIN PAQUETES || LISTA DE TRAMITES-->




<!---->


</body>
</html>

<?php 
  require_once 'includes/templates/footer.php';
   ?>
