



<?php

function tramites($tip, $tr){
echo isset($tip);
echo isset($tr);

/*PRUEBA /*

$tip=1;
$tr=5;
*/
try {


require_once('bd_conexion.php'); 
//require_once('includes/funciones/bd_conexion.php'); 

$mysqli = new mysqli("localhost", "root", "", "iet");
$conn=$mysqli;

date_default_timezone_set("America/Argentina/Buenos_Aires");


//$sql= "SELECT 'tramites'.'nm_tramite', 'categoria_tramite'.'tipo_tramite' from tramites inner join categoria_tramite ON 'tramites'.'id_tipo_tramite' = 'categoria_tramite'.'id_tipo' where 'tramites'.'tramite_id'= $tr AND 'tramites'.'id_tipo_tramite'= $tip";
$sql="SELECT tramites.nm_tramite, categoria_tramite.tipo_tramite from tramites inner join categoria_tramite ON tramites.id_tipo_tramite = categoria_tramite.id_tipo where tramites.tramite_id= $tr AND tramites.id_tipo_tramite= $tip";
$result = mysqli_query($mysqli, $sql);
$fila = mysqli_fetch_assoc($result);
//header("location:selecciona-envia.php?ok");

//doc:		$turno = array(
//	doc:		'id_registrado' => $id_registrado,


$rta = array('nm_tramite' => $fila['nm_tramite'],
			  'tipo_tramite' => $fila['tipo_tramite']
			 );

//echo "'$rta'  TRAMITE: " . $rta['nm_tramite'] . " tipo tram: " . $rta['tipo_tramite'];
	
} catch (Exception $e) {
	
}

/*
SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
FROM Orders
INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID;

*/

//$rta=json_encode($rta,true);
return($rta);
//header ("Location: /iet_web-final00_180522/selecciona_envia.php?rta=$rta");


}

/*

//19052022- UPDATE:
//buscar el nombre del tramite con el id:





if ($tipo >=5 && $tipo <= 8) {
//   echo "id_tipo: ". $id_tipo=1;
  $id_tipo=1;
 }
 elseif ($tipo >=9 && $tipo <= 12 ) {
     $id_tipo=2;
 }elseif ($tipo >=13 && $tipo <= 16) {
     $id_tipo=3;
 }

<div>

switch ($tram) {
	case 'value':
		# code...
		break;
	
	default:
		# code...
		break;
}



  <select name="tramite" selected='' id="tramite" size="10" required>
    <option value="<?php echo $tram='0'; ?>">==Selecciona un Tramite==</option> 
    <option value="">==*Atencian en Caja*==</option> 
    <option value="5" >Pagar Servicios e Impuestos</option>
    <option value="<?php //echo $tram='1'; ?> ">Pagar Servicios e Impuestos</option>
    <option value="<?php //echo $tram='6'; ?>">Transacciones, Cobros, Depósitos</option>
    <option value="<?php //echo $tram='7'; ?>">Transferencias</option>
    <option value="<?php if($tram=='0') {echo $tram='8'; } ?>">Otros</option>
    
    <option value="">==*Atención Personalizada*==</option> 
    <option value="<?php if($tram=='8'){echo $tram='9'; } ?>">Operar Bonos y Acciones</option>
    <option value="<?php if($tram=='9'){ echo $tram='5'; } ?>">Inversiones</option>
    <option value="<?php if($tram==0){ $tram=11; } ?>">Tatulos y Valores</option>
    <option value="12" <?php if($tram==0){ $tram=12; } ?>>Otros</option>

    <option value="">==*Informes Recepción*==</option> 
    <option value="13" <?php if($tram==0){ $tram=13; } ?>>Consultas</option>
    <option value="14" <?php if($tram==0){ $tram=14; } ?>>Blanqueo de Clave</option>
    <option value="15" <?php if($tram==0){ $tram=15; } ?>>Informes para Clientes</option>
    <option value="16" <?php if($tram==0){ $tram=16; } ?>>Otros</option>
  </select>     -->
</div> <!--orden-->



<?php
//19052022-FIN UPDATE  */
?>
