<?php 
session_start();

$evento_id = $_GET['id'];
$evento_fecha = $_GET['fecha'];
//$evento_fecha = $_GET['clave'];
//echo "EVENTO: " . $evento_id;
//echo "fecha: " . $evento_fecha;



include_once 'funciones/funciones.php';

try {
$opera_transac= "INSERT INTO operacion (id_registrado, fecha_registro, fecha_inicio) VALUES ('$evento_id', '$evento_fecha', NOW()); "; 				//, fecha_cierre, status_cierre"

$ejecuta=$conn->query($opera_transac);

    $last_id = mysqli_insert_id($conn);
	//echo 
	
	$_SESSION['last_operation']=$last_id;

/*
$rs = mysql_query("SELECT MAX(id_operacion) AS id_op FROM operacion");
if ($row = mysql_fetch_row($rs)) {
$id = trim($row[0]);
}

$rs = mysql_query("SELECT MAX(id_tabla) AS id FROM tabla");
if ($row = mysql_fetch_row($rs)) {
$id = trim($row[0]);
}

*/
$sql="UPDATE registrados SET status_turno=2 where id_registrado = '$evento_id'";
$resultado = $conn->query($sql); 
 header("Location: operacion.php"); 

mysqli_close();
 /*
 ?id_op="<?php echo . $evento_id; ?>);

 //header("Location: operacion.php?id_op=<?php echo  $evento_id];?>");
 //header("Location: operacion.php?id_op=<?php echo $_POST['last_operation']; ?>);
	*/
} catch (Exception $e) {
	
        $error = $e->getMessage();
        echo $error;
}


 ?>