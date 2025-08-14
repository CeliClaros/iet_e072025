
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


/*

<?php 
//recibe variables:
 //if (isset($_POST['login-user'])){

  $usuario = 'prueba@mail.com';   //$_POST['usuario'];  //en el caso de USER el dato usuario es el email
  $password = 1234;     //$_POST['password']; 
  $fecha2= "2021-08-01%";  //stear fecha con date() para obtener la fecha de hoy.

//}


//funcion busca:
function buscaDisponibilidad($usuario, $password, $fecha2){
//busca el evento actual del cliente, recién logueado y registrado hoy, para notificar status

try {
  //include_once 'includes/funciones/bd_conexion.php';
$mysqli = new mysqli("localhost", "root", "", "iet");
$conn=$mysqli;

  $stmt = $conn->prepare("SELECT * FROM registrados WHERE fecha_registro LIKE ? and id_tipo_tramite = ? and status_turno = 1;");
  //$stmt = $conn->prepare("SELECT * FROM registrados WHERE fecha_registro LIKE ? and email = ? and status_turno = 1;");
  $stmt->bind_param("ss", $fecha2, $usuario);
  $stmt->execute();
  $stmt->bind_result($id_registrado, $nombre, $apellido, $dni, $email, $fecha_registro, $id_tipo_tramite, $tramite_id, $status_turno);
  if ($stmt->affected_rows) {
    $existe = $stmt->fetch();

/*    var_dump($existe);

    echo "id_turno: " . $id_registrado;
    echo "<br>" . "status_turno: " . $status_turno;
    echo "<br>" . "fecha_registro" . $fecha_registro; 
    echo "<br>" . "nombre:  " . $nombre;
* /

    $turno = array(
      'id_registrado' => $id_registrado,
      'nombre' => $nombre ,
      'apellido' => $apellido,
      'dni' => $dni,
      'email' => $email,
      'fecha_registro' => $fecha_registro,
      'id_tipo_tramite' => $id_tipo_tramite,
      'tramite_id' => $tramite_id,
      'status_turno' => $status_turno,
      'fecha_consulta' => $fecha2
       );

    echo "<br>" . "FECHA: " . $turno['fecha_consulta'];
    echo "<br>" . "DNI: " .  $turno['dni'];

var_dump($turno);
return $turno;

//session_start();
//$_SESSION('turno') = $turno;

//$_SESSION['tramite_id'] = $tramite_id;





//json_encode($turno);
/*return $turno;
$stmt->close();
$conn->close();
* /  }  //if rta query;



} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
};

$stmt->close();
$conn->close();

//pronostico($turno);

//}; //fin IF isset variables _POST
 } ; //cierra function getRegistro;

$getRegistro= busca($usuario, $password, $fecha2);

 echo "nombre: " . $getRegistro['nombre'];

//fin funcion busca , para ver disponibilidad
//=============================================



*/
/* INI PRUEBA */

//INI PRUEBA BORRADO  
/*

function pronostico($tramite){

//include 'includes/funciones/bd_conexion';

$fecha2= '2021-08-02%';


if ($tramite >=5 && $tramite <= 8) {
    $tipo_tramite=1;
 }
 elseif ($tramite >=9 && $tramite <= 12 ) {
     $tipo_tramite=2;
 }elseif ($tramite >=13 && $tramite <= 16) {
     $tipo_tramite=3;
 }


date_default_timezone_set("America/Argentina/Buenos_Aires"); 

$conn = new mysqli('localhost', 'root', '', 'iet');  
$query= "SELECT * FROM registrados WHERE status = 1 AND fecha_registro LIKE '$fecha2' AND id_tipo_tramite = '$tipo_tramite'";

$resultado= mysqli_query($conn, $query);
if ($resultado) {
  $registro= mysqli_fetch_assoc($resultado);
  var_dump($registro);

  return $registro;
}else{

  echo "Error conexion!!";

}

return $resultado;

            //FIN PRUEBA BORRADO */
/*
$conn = new mysqli('localhost', 'root', '', 'iet');   
$query= "INSERT INTO cliente (cliente_id,  nm_cliente, apellido_cliente, dni, password, email, celular) VALUES ( DEFAULT, '$nombre', '$apellido' , '$dni' , '$password',  '$email', $celular )";
$resultado=mysqli_query($conn, $query);
$registro= mysqli_fetch_assoc($resultado);
*/


/*
$stmt=$conn->prepare("INSERT INTO cliente (nm_cliente, apellido_cliente, dni, password, email, celular) VALUES (?, ?, ?, ?, ?, ?)"); 
//( DEFAULT, '$nombre', '$apellido' , '$dni' , '$password',   '$email', $celular )";
  $stmt->bind_param("sssssi", $nombre, $apellido, $dni, $password, $email, $celular); 

  //  va???    $stmt = $conn->prepare("INSERT INTO admin_users(usuario, nombre, password) VALUES(?, ?, ?)");
  //$stmt = $conn->prepare("INSERT INTO admins(usuario, nombre, password) VALUES(?, ?, ?)");
  //   va???      $stmt->bind_param("sss", $usuario, $nombre, $password);     //$password_hashed);
  $stmt->execute(); //ejecuta la enserción en la db, entonces se dará el sgte. mensaje en consola.

  //echo($stmt);

  $id_registro = $stmt->insert_id;
  echo "REGISTRO: " . "$id_registro" . "<br>";

  $fila = $stmt->affected_rows;
  echo  "FILA: " . "$fila";
    echo "<br>";
    if ($id_registro) {
      require 'index.php';
    }  */
//---------------

/*
  $stmt = $conn->prepare("SELECT * FROM cliente WHERE email = ?;");
  $stmt->bind_param("s", $usuario);
  $stmt->execute(); //ejecuta la enserción en la db, entonces se dará el sgte. mensaje en consola.
  //$stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $password_admin);

  //Campos tb_cliente ddbb: iet
  //cliente_id, nm_cliente, apellido_cliente, dni, password, email, celular

  $stmt->bind_result($id_cliente, $nombre, $apellido, $dni, $password, $email, $celular);     //$email, $celular); 

    if($stmt->affected_rows){
      $existe= $stmt->fetch();  //Fetch imprime los resultados de la consulta, que se guardan en stmt
    
*/

                            //} // FIN FUNCITON PRONOSTICO

/*FIN PRUEBA */



/*
$tramite=5;
pronostico($tram);

*/














            //date_default_timezone_set("America/Argentina/Buenos_Aires"); 

//selecciona:
?>

<!--
 <form role="form" name="selecciona-form" id"selecciona" method="POST" action="pronostico.php"> -->
 

<!--
 <form role="form" name="selecciona" id="selecciona" method="POST" action="draft1.php"> 

      28/05 cambio form 
    -->

      <form role="form" name="selecciona" id="selecciona" method="POST" >  <!--action="draft1.php">   
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
<!--
<input type="text" id="apellido" name="apellido" placeholder="Tu Apellido" size="13">
-->
<!--<select name="tramite" selected='' id="tramites" size="12" required>-->
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