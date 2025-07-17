<?php 
	require 'modelo_grafico.php';

	$mg = new Modelo_Grafico();
	$consulta = $mg->ConsultaDatosGrafico();
	echo json_encode($consulta);



 ?>