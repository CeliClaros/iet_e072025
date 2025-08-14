
<?php 
session_start();
//20210811.-
// include_once "includes/templates/header.php" ; 
      
      include_once "includes/templates/barra-user.php" ; 

        //require_once('includes/templates/bd_conexion.php');   

        require_once 'includes/funciones/bd_conexion.php';   
        ?>

<?php # include_once "includes/tiempo_espera5.php" ; ?>

<!--?php include_once "tiempo_espera8.php" ; ?-->
<?php # include_once "post.php" ; ?>


<script  src="js/jquery-3.6.0.min.js"></script>

<!--
<script  src="js/calcula-disponible.js"></script>  -->
<?php

?>

<form role="form" name="selecciona" id="selecciona" method="POST" >  


<div id="resumen" class="resumen clearfix">
  <h3>Selecciona y Reserva</h3>  <!--RESUMEN -->
  <div class="caja clearfix">
    <div class="extras">

    <!--    <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>    -->

<!--
 <form role="form" name="selecciona" id="selecciona" method="POST" action="pronostico.php"> 

-->


<div class="orden">
<?php                                                         //$tram='0'; ?>
  <strong>  <label for="tramite"> <h4>Por favor, Seleccione un Tramite </h4> </label> <br> </strong>
  <!--<select multiple="tramite[]" name="tramite" id="tramite" required>  -->
<!--<select name="tramite" id="tramite" required>  -->

      <?php 
      try {
             
                                          //      $tram= 'Otros';
      $clave= 'PAGAR%';
      //$sql= "SELECT * FROM tramites WHERE nm_tramite = '$tram' ";
      //$sql= "SELECT * FROM tramites WHERE clave like '$clave' ";
      $sql="SELECT * FROM tramites;";

      //$resultado = $conn->query($sql);
      $resultado = mysqli_query($conn,$sql);
      //$resultado = $mysqli->query($sql);
echo "RESULTADO DE QUERY TRAMITES-OPCIONES: <BR>";
var_dump($resultado);

$valores = mysqli_fetch_assoc($resultado);
//$valores = mysql_fetch_array($resultado);
var_dump($valores);

} catch (Exception $e) {


    //throw $th;
    echo "Error!!!".$e->getMessage()."<br>";
    //return false;
        
      }



?>

<select name="tramites[]" id="tramites"  size="5">  
    <option value="Por favor seleccione una opcion">Seleccione</option>
    
<?php while ($valores=mysqli_fetch_assoc($resultado)) {
   $id= $valores['tramite_id'];
   $nm_tramite= $valores['nm_tramite'];

 
  //  $valores = mysql_fetch_assoc($resultado);  ?>
    <option value="<?php echo $id; ?>"><?php echo $nm_tramite; ?></option>  
    <!--<option value=""><?php //echo $valores['nm_tramite']; ?></option>  -->

<?php   } //echo "id: " . $id . "nm_tram: " . $nm_tram;?>    
  </select>
  

<!--


  <select name="tramite" selected='' id="tramite" size="10" required>
    <option value="<?php  //echo $tram='0'; ?>">==Selecciona un Tramite==</option> 
    <option value="">==*Atencian en Caja*==</option> 
    <option value="5" >Pagar Servicios e Impuestos</option>
    <option value="<?php //echo $tram='1'; ?> ">Pagar Servicios e Impuestos</option>
    <option value="<?php //echo $tram='6'; ?>">Transacciones, Cobros, Depósitos</option>
    <option value="<?php //echo $tram='7'; ?>">Transferencias</option>
    <option value="<?php  // if($tram=='0') {echo $tram='8'; } ?>">Otros</option>
    
    <option value="">==*Atención Personalizada*==</option> 
    <option value="<?php  //if($tram=='8'){echo $tram='9'; } ?>">Operar Bonos y Acciones</option>
    <option value="<?php  //if($tram=='9'){ echo $tram='5'; } ?>">Inversiones</option>
    <option value="<?php  //if($tram==0){ $tram=11; } ?>">Tatulos y Valores</option>
    <option value="12" <?php// if($tram==0){ $tram=12; } ?>>Otros</option>

    <option value="">==*Informes Recepción*==</option> 
    <option value="13" <?php  //if($tram==0){ $tram=13; } ?>>Consultas</option>
    <option value="14" <?php  //if($tram==0){ $tram=14; } ?>>Blanqueo de Clave</option>
    <option value="15" <?php  //if($tram==0){ $tram=15; } ?>>Informes para Clientes</option>
    <option value="16" <?php  //if($tram==0){ $tram=16; } ?>>Otros</option>
  </select>     -->  
</div> <!--orden-->
<!-- 28/05: 
      <input id="calcular" onclick="prueba()" type="button" class="button" value="Calcular Disponibilidad">
-->
<!-- 
<a href="pronostico($tramite)" class="button">Verificar Status</a>   

<input id="calcular"  type="button" class="button" value="Calcular Disponibilidad">


   ó:
<?php // $tramite= 6;  ?>
 <a href="pronostico.php?tramite=6"class="button">Verificar Status</a>   

 -->

   <!--


  <!--
   <a href="pronostico.php?tramite" class="button">Verificar Status</a>   
 

<a href="pronostico.php?tramite="+this.value class="button">Verificar Status</a>  
 

<a href="pronostico.php?tramite="tramite.value class="button">Verificar Status</a>  
 --> 
          <?php // 28/05 echo "tramite selected: " . $id . " " . $tram . "<br>";  ?>

<!--   28/05:  
<button type="submit" name="envio" value="pronostico.php">Envio</button>    -->

<input type="submit" onclick="this.form.action='pronostico.php?tramite='"<?php echo $id; ?>>




<!-- ES EL OFICIAL: POR AHORA
<a href="pronostico.php?tramite="<?php echo $id; ?> class="button">Probar Envio</a>  
-->


<!--
<button type="submit" name="envio" value="tiempo_espera8.php">Envio</button>  -->


<!-- 28/05: 
<a href="pronostico.php?tramite="<?php echo $id; ?> class="button" onclick="prueba()">Verificar Status</a>  


          <button onclick="prueba()">Enviar</button>
-->
<!--
<a href="pronostico.php?tramite=<?php echo $id; ?>" class="button">Verificar Status</a>  

<a href="pronostico.php?tramite=<?php echo $tram; ?>" class="button">Verificar Status</a>  -- >
<!--<a href="pronostico.php?tramite=tram" class="button">Verificar Status</a>  -->

    <?php  

    $rta=array();
    $ver= json_decode($rta, true);  
    //$ver= json_decode($_GET['rta'], true);  

    if (isset($ver)) {
      # code...
    
    echo "este es el json con los datos" . print_r($ver->cant); 
    echo "MINUTOS:  " . print_r($ver->minutos);
    echo "ver[reserva]ESPERA EN MINUTOS:  " . print_r($ver->espera);
    echo "ver[reserva]TRAM:  " . print_r($ver->tram);
    echo "ver[reserva]tipo_tramite:  " . print_r($ver->tipo_tramite);
    echo "ver[reserva]FECHA_RESERVA:  " . print_r($ver->fecha);


    echo "cantidad de reservas??: " . $ver['cant'];
    echo "ver[reserva]:  " . $ver['reserva'];
    //echo "<br>" . "cant: " . $ver['cant']; 
      if (isset($_GET['rta'])) { /// como recepcionar un json por get y mostrar en el front
        $rta= $_GET['rta'];
        echo "<br>" .  "Viene por get de rta: tramite: " . $rta; 
        echo "<br>" . "cant: "  . $ver['cant'];
        echo "clave: " . $clave;
      } 


}


      //JSON  que viene de pronostico.php
/*
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
*/
      ?>
    

<!--
<input id="calcular"  type="button" class="button" value="Calcular Disponibilidad"> <!-- onclick="tiempoEspera()" >     -->
 <!--este boton no se manda -->
<!--
<input type="text" id="apellido" name="apellido" placeholder="Tu Apellido" size="13">
name= "tramiteselec"
-->

          
</div> <!-- extras -->


<!-- doc:

 print "<a href='search($id)' >$name</a>";
    }
}  

function search($id){

-->





<?php 
//resumen y reserva:
 ?>

<div class="total">

<!--
    ESTÁ REPETIDO, CON EL DE "CALCULO HORA_APROX DE ATENCION" ALCANZA!!!!
  <p>Día y Hora Seleccionados, [Día y Hora aprox. de Atención]:</p>  <!- -era: Resumen: - ->
  <div id="lista-productos"> </div>    <!- -"para poner un resumen de todo lo que está comprando"- - ->
-->


  


   <h4> <p>Cantidad de turnos anteriores: </p> </h4>
  <h4>  <div id="cant-turnos"><?php if(isset($ver->{'cant'}===0)){echo "No hay Eventos reservados, <br> Su atención iniciará inmediatamente"}else{ echo  $_GET['rta'] . "RESPONDEE!!?". "<br>"; print_r($ver->{'cant'}) }; //fin else de cant_Eventos en cero. // intval($ver[0]['cant']);//echo  $cant;  ?></div>  </h4>

<h4>  <p>Tiempo de Espera [HORA: MINUTOS]   </p>  </h4> <!--Total -->
 <h4> <div id= "tiempo-espera">  <!--   //"suma-total"--><!--para mostrar lo que está pagando-->
  <?php echo $_GET['rta']  . "<br>"; print_r($ver->{'espera'}) ; // intval($ver[0]['espera']); // echo  $minutos;  ?> 



    
  </div>  </h4>






<!-- PARA AGREGAR TIEMPO DE ESPERA APROX:
  <p>[Día y Hora aprox. de Atención]:</p>  -->  <!--era: Resumen: -->
  <!--div id="hora_aprox_at"> </espera 
  ///EL SGTE. DIV ES PARA MOSTRAR LA HORA DE ATENCION APROXIMADA>>> CALCULAR!!!
    "CALCULO HORA_APROX DE ATENCION" -->
  <!--
  <div id= "hora-aprox"></div> --> <!-- ///"lista-productos"> </div -->    <!--"para poner un resumen de todo lo que está comprando"- -->



  <!--input type="hidden" name="tramite" id= "tramite"> <!- - value="total_pedido"-->
 <!--<input type="hidden" name="total_pedido" id= "total_pedido"--> <!-- value="total_pedido"-->
  


<!--OFICIAL PARA REGISTRAR TURNO:
  <input id="submit" type="submit" name="submit" class="button" value="Reservar"> -->  <!--id="btnRegistro" -->
   <!--PRUEBA   <input type="submit" onclick="this.form.action= 'draft1.php'">

-->
<input type="submit" onclick="this.form.action="draft1.php?tramite=<?php echo $id; ?>>


<!--  28/05 cambio button
<button type="submit" name="envio" value="draft1.php">Reserva</button>

-->

    <?php /* doc: para devolver mensaje Registro exitoso aqui:  viene de draft1.php si lo ponemos en el action de este form */
     /* */ if( isset($_GET['ok'])){  ?>
  <h4> <br><br> <p>Evento Registrado:  </p>  </h4> <!--Total -->
  <div id= "persiste"> <!--   //"suma-total"--><!--para mostrar lo que está pagando-->
  <?php  echo  "Se registro exitosamente el Evento!!!" ?> 
   <?php  echo "<br>" . "nombre: " . $nombre= $_SESSION['nombre']; ?>
   <?php echo "<br>" . "nombre: " . $nombre= $_SESSION['nombre'] . "  tramite: " . $tram= $_SESSION['tramite']; ?>
  </div>

    <?php    }else{
      if()

   //       echo "Error No Registrado!!!????";

      }   ?>


<!--AJAX PARA GUARDAR RESERVA: -->
</form>
<!--
<script  src="js/calcula-disponible.js"></script>  -->

<script  src="js/envia-datos-ajax.js"></script>  
<!--

<script type="js/prueba1.js"></script>
-->
</div>