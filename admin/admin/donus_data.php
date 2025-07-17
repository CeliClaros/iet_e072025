
<!DOCTYPE html>
<html>
<head>
	<title>Donus Graph</title>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

<!--	DOC: https://www.youtube.com/watch?v=P-S4U4oE0DA-->

</head>
<body>

<?php   include_once 'funciones/funciones.php';
 ?>

<div id="graph" style="height: 250px;"></div>


<?php

  echo "<br>";

$sql= "select distinct(id_empleado) as empleado, AVG(TIMESTAMPDIFF(MINUTE,fecha_inicio,fecha_cierre)) as performance_en_minutos from operacion_diaria group by id_empleado";

 $resultado= $conn->query($sql);
 $performance= $resultado->fetch_array();
 print_r($performance); 

 echo "RTA DE LA QUERY: " . $performance;



///////////////////////

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script src="https://www.chartjs.org/docs/latest/charts/doughnut.html#doughnut
//https://morrisjs.github.io/morris.js/"></script>

<script>

new Morris.Donut({
  element: 'graph',
  data: [
    {value: 70, label: 'foo'},
    {value: 15, label: 'bar'},
    {value: 10, label: 'baz'},
    {value: 5, label: 'A really really long label'}
  ],
  formatter: function (x) { return x + "%"}
}).on('click', function(i, row){
  console.log(i, row);
});

</script>


<script>

<?php

  echo "<br>";

$sql= "select distinct(id_empleado) as empleado, AVG(TIMESTAMPDIFF(MINUTE,fecha_inicio,fecha_cierre)) as performance_en_minutos from operacion_diaria group by id_empleado";

 $resultado= $conn->query($sql);
 $performance= $resultado->fetch_array();
 print_r($performance); 

echo  "<br>" . "var_dump: " . var_dump($performance);

 echo "<br>" . "RTA DE LA QUERY: " . $performance;

   //$i=0;
while ($performance= $resultado->fetch_array())
//while ($rta= mysql_fetch_array($sql) )

  { 
  	 echo "<br>" . "RESULTADO while: "; 
    print_r($performance); 

          echo "<br>JSON encode: " . $perf= json_encode($performance);
           var_dump( json_decode($perf));
}
?>


new Morris.Donut({
  element: 'graph',
  data: [
    {value: 70, label: 'foo'},
    {value: 15, label: 'bar'},
    {value: 10, label: 'baz'},
    {value: 5, label: 'A really really long label'}
  ],
  formatter: function (x) { return x + "%"}
}).on('click', function(i, row){
  console.log(i, row);
});

</script>


