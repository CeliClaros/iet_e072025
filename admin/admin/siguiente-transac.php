<?php 

//session_start();

$opera=$_GET['id'];
echo $opera;
//echo $op_id=$_SESSION['last_operation'];

$evento_id = $_GET['data-id'];		//id de tb registrado ( id del turno)


if (isset($opera)==2) {		// si es 2 cierra como Ausente y si no cierra como Exitoso, PERO està fijo en 2>> ENTONCES SIEMPRE CIERRA COMO AUSENTE!!
include_once 'funciones/funciones.php';

try {
//$opera_transac= "INSERT INTO operacion (id_registrado, fecha_registro, fecha_inicio) VALUES ('$evento_id', '$evento_fecha', NOW()); "; 				//, fecha_cierre, status_cierre"

$opera_siguiente= "INSERT INTO operacion (id_registrado, fecha_registro, fecha_inicio, fecha_cierre, status_cierre) VALUES ('$evento_id', '$evento_fecha', NOW(), NOW(), 4); "; 				//, fecha_cierre, status_cierre"

$ejecuta=$conn->query($opera_siguiente);


/*

$cierra_operac= "UPDATE operacion SET fecha_cierre= NOW(), status_cierre=4 WHERE id_operacion = $op_id"; 


//status_turno=3 where id_registrado = '$evento_id'";
 //"INSERT INTO operacion (id_registrado, fecha_registro, fecha_inicio) VALUES ('$evento_id', '$evento_fecha', NOW()); "; 		

$ejecuta_cierre=$conn->query($cierra_operac);  */

//$sql="UPDATE registrados SET status_turno=3 where id_registrado = '$evento_id'";
$sql="UPDATE registrados SET status_turno=4 where id_registrado = $evento_id";
$resultado = $conn->query($sql);   

 header("Location: operacion.php"); 


} catch (Exception $e) {
	
        $error = $e->getMessage();
        echo $error;
}
} else{

include_once 'funciones/funciones.php';

try {
//$opera_transac= "INSERT INTO operacion (id_registrado, fecha_registro, fecha_inicio) VALUES ('$evento_id', '$evento_fecha', NOW()); "; 				//, fecha_cierre, status_cierre"

$cierra_operac= "UPDATE operacion SET fecha_cierre= NOW(), status_cierre=3 WHERE id_operacion = $op_id"; 


//status_turno=3 where id_registrado = '$evento_id'";
 //"INSERT INTO operacion (id_registrado, fecha_registro, fecha_inicio) VALUES ('$evento_id', '$evento_fecha', NOW()); "; 		

$ejecuta_cierre=$conn->query($cierra_operac);

//$sql="UPDATE registrados SET status_turno=3 where id_registrado = '$evento_id'";
$sql="UPDATE registrados SET status_turno=3 where id_registrado = $evento_id";
$resultado = $conn->query($sql);   

 header("Location: operacion.php"); 

    //$last_id = mysqli_insert_id($conn);
	//echo 
	
	//$_SESSION['last_operation']=$last_id;

/*
$rs = mysql_query("SELECT MAX(id_operacion) AS id_op FROM operacion");
if ($row = mysql_fetch_row($rs)) {
$id = trim($row[0]);
}

$rs = mysql_query("SELECT MAX(id_tabla) AS id FROM tabla");
if ($row = mysql_fetch_row($rs)) {
$id = trim($row[0]);
}

*//*
$sql="UPDATE registrados SET status_turno=3 where id_registrado = '$evento_id'";
$resultado = $conn->query($sql);   
 header("Location: operacion.php"); 
*/
 /*
 ?id_op="<?php echo . $evento_id; ?>);

 //header("Location: operacion.php?id_op=<?php echo  $evento_id];?>");
 //header("Location: operacion.php?id_op=<?php echo $_POST['last_operation']; ?>);
	*/
} catch (Exception $e) {
	
        $error = $e->getMessage();
        echo $error;
}

 } // end else para cerrar Op con exito
 ?>



 ?>