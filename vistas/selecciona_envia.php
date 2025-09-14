<?php 
						//session_start();
//20210811.-
// include_once "includes/templates/header.php" ; 
      
      include_once "../vistas/includes/templates/barra-user.php" ; 

        //require_once('includes/templates/bd_conexion.php');   

        require_once '../vistas/includes/funciones/bd_conexion.php';   

        require_once "../vistas/includes/funciones/pronostica.php";
        


        ?>

<?php # include_once "includes/tiempo_espera5.php" ; ?>

<!--?php include_once "tiempo_espera8.php" ; ?-->
<?php # include_once "post.php" ; ?>


<script  src="js/jquery-3.6.0.min.js"></script>

?>

      <!--ERA FORM!!    action="draft1.php">   
<!--    
<form name="selecciona" id="selecciona" method="GET">
-->

<div id="resumen" class="resumen clearfix">
  <h3>Selecciona y Reserva</h3>  <!--RESUMEN -->
  <div class="caja clearfix">
    <div class="extras">

    <!--    <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>    -->

<!--
 <form role="form" name="selecciona" id="selecciona" method="POST" action="pronostico.php"> 

-->

 
<div class="orden">
<form role="form" name="selecciona" id="selecciona" method="GET" > 

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

  /*20220930
echo "RESULTADO DE QUERY TRAMITES-OPCIONES: <BR>";

    
      var_dump($resultado);
        
   

$valores = mysqli_fetch_assoc($resultado);
//$valores = mysql_fetch_array($resultado);
var_dump($valores);

 */
$valores = mysqli_fetch_assoc($resultado);


} catch (Exception $e) {


    //throw $th;
    echo "Error!!!".$e->getMessage()."<br>";
    //return false;
        
      }



?>
<!--
<input type="text" id="apellido" name="apellido" placeholder="Tu Apellido" size="13">
-->
<!--<select name="tramite" selected='' id="tramites" size="12" required>-->
<select name="tramites[]" id="tramites"  size="5">  
    <option value="Por favor seleccione una opcion">Seleccione</option>
    
<?php while ($valores=mysqli_fetch_assoc($resultado)) {
   $id= $valores['tramite_id'];		$tr=$id;
   $nm_tramite= $valores['nm_tramite'];

 
  //  $valores = mysql_fetch_assoc($resultado);  ?>
    <option value="<?php echo $id; ?>"><?php echo $nm_tramite; ?></option>  
    <!--<option value=""><?php //echo $valores['nm_tramite']; ?></option>  -->

<?php   } //    FIN WHILE             echo "id: " . $id . "nm_tram: " . $nm_tram;?>    
  </select>



<?php //echo "<br>" . "TR SELECCIONADO????:  " . $id; ?>
<!--
				<input type="submit" onclick="this.form.action='pronostico.php?tramite='"<?php echo $id; ?>>
-->

  <script type="text/javascript">
///MEJORAR PARA QUE LO TOME SOLAMENTE CUANDO NO HAY SELECCION EN SELECT!!
        var formulario= document.getElementById('tramites');
   //     if (formulario="null") {alert('Por favor seleccione una opcion')};


  </script>



<input type="hidden" name="tram" id= "tram">

<input type="submit" value="Disponibilidad" onclick="this.form.action='../vistas/includes/funciones/pronostica.php?tramite='"<?php echo $id; ?> class="button"></input>

 <?php
if (isset($_GET['rta'])) {
  
 $ver= json_decode($_GET['rta'], true); echo "VER: " . $ver[0]['tram']; 
 $seleccion=$ver[0]['tram'];

echo "$VER: " . $ver;
echo "$SELECCION: " . $seleccion;
}

 ?>

<?php if(isset($_GET['rta'])){
//si recibe respuesta de la funcion pronostica,
echo "json_decode_ Mostrar rta:";

$RTA= json_decode($_GET['rta']);

var_dump($RTA);

  var_dump($consulta=$_GET['rta']);
} //fin if ?>


</div> <!--FIN DIV ORDEN-->

</div> <!--FIN DIV EXTRAS -->







<!---COMIENZA LA PARTE DE RESERVA!!: -->  

<div class="total">
<form role="form" name="reserva" id="reserva" method="GET" > 



<!--
    ESTÁ REPETIDO, CON EL DE "CALCULO HORA_APROX DE ATENCION" ALCANZA!!!!
  <p>Día y Hora Seleccionados, [Día y Hora aprox. de Atención]:</p>  <!- -era: Resumen: - ->
  <div id="lista-productos"> </div>    <!- -"para poner un resumen de todo lo que está comprando"- - ->
-->


  


   <h4> <p>Cantidad de turnos anteriores: </p> </h4>
  <h4>  <div id="cant-turnos"><?php //echo  $_GET['rta']; // . "<br>"; print_r($ver->{'cant'}) ; // intval($ver[0]['cant']);//echo  $cant; 
      echo $ver[0]['cant'] . "   Eventos en Espera";
      $cantidad= $ver[0]['cant']; 

   ?></div>  </h4>




<h4>  <p>Tiempo de Espera [HORA: MINUTOS]   </p>  </h4> <!--Total -->
 <h4> <div id= "tiempo-espera">  <!--   //"suma-total"--><!--para mostrar lo que está pagando-->
  <?php // echo $_GET['rta'] ; // . "<br>"; print_r($ver->{'espera'}) ; // intval($ver[0]['espera']); // echo  $minutos;  

    // echo "   " . $ver[0]['minutos'] . "   HH:Min";
     //echo// "Tiempo: " .
     echo $tiempo= date("i:s", $ver[0]['minutos']) . "   HH:Min";;
  ?> </div>  </h4>



    
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
<h3>
<?php
if($cantidad===0){
//  echo "No hay Eventos en Espera <br> Puede Reservar Ahora"; 
        } //fin if cant cero, para indicar que reserve   
  ?> </h3>


<input type="hidden" name="reserva" id= "reserva" value=<?php if (isset($seleccion)) {
  echo $seleccion; 
}?> ></input>

<input  type="submit" value="Reservar" onclick="this.form.action='../vistas/includes/funciones/reserva.php?reserva&tramit='"<?php echo $id; //$ver[0]['tram']; //$id; //$seleccion;//$ver[0]['tram']; ?> class="button"></input>

<!--
<input type="submit" value="Disponibilidad" onclick="this.form.action='includes/funciones/pronostica.php?tramite='"<?php echo $id; ?> class="button"></input>
<input type="submit" onclick="this.form.action="draft1.php?tramite=<?php echo $id; ?>>

-->
<!--  28/05 cambio button
<button type="submit" name="envio" value="draft1.php">Reserva</button>

-->

    <?php /* doc: para devolver mensaje Registro exitoso aqui:  viene de draft1.php si lo ponemos en el action de este form */
     /* */

if (isset($_GET['fila'])) {
  # code...
  echo "<br>  EVENTO ID: " . $_GET['fila'];
  echo "<br>   EVENTO ID: " . $_GET['id'];
}

      if( isset($_GET['ok'])){  ?>
  <h4> <br><br> <p>Evento Registrado:  </p>  </h4> <!--Total -->
  <div id= "persiste"> <!--   //"suma-total"--><!--para mostrar lo que está pagando-->
  <?php  echo  "Se registro exitosamente el Evento!!!" ?> 
   <?php  echo "<br>" . "nombre: " . $nombre= $_SESSION['nombre']; ?>
   <?php echo "<br>" . "nombre: " . $nombre= $_SESSION['nombre'] . "  tramite: " . $tram= $_SESSION['tramite']; ?>
  </div>

    <?php    }else{

   //       echo "Error No Registrado!!!????";

      }

?>

<!--AJAX PARA GUARDAR RESERVA: -->
</form>
<!--
<script  src="js/calcula-disponible.js"></script>  -->

<script  src="js/envia-datos-ajax.js"></script>  
<!--

<script type="js/prueba1.js"></script>
-->
</div>  <!--FIN DIV TOTAL-->





</div>  <!--FIN DIV CAJA-->
</div>
</form>

 ?>