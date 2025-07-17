<?php 

    //include_once 'funciones/sesiones.php';
    include_once 'funciones/funciones.php';

$sql= "SELECT fecha_registro, COUNT(*) AS resultado FROM registrados WHERE fecha_registro LIKE '2021-08%' GROUP BY DATE(fecha_registro) ORDER BY fecha_registro"; 

$resultado = $conn->query($sql);


$arreglo_registros= array();
while($registro_dia = $resultado->fetch_assoc()){

	$fecha = $registro_dia['fecha_registro'];


$registro['fecha'] = date('Y-m-d', strtotime($fecha));
$registro['cantidad'] = $registro_dia['resultado'];


$arreglo_registros[]= $registro;
}  //fin while
//var_dump($registro);

//var_dump($arreglo_registros);  //devuelve un SOLO ARREGLO CON TODOS LOS RESULTADOS!!!!

//var_dump(json_encode($arreglo_registros));		//CONVIERTE EL SOLO ARREGLO A JSON.

echo json_encode($arreglo_registros);

//var_dump(json_encode($registro_dia));








 ?>