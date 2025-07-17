<?php 

 //include_once 'funciones/sesiones.php';
  include_once 'templates/header.php';

  include_once 'templates/barra.php';
  include_once 'templates/navegacion.php';
    include_once 'funciones/funciones.php';
 ?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Informacion sobre los Eventos</small>
      </h1>

<!--BOTON HOME A LA DERECHA DE LA BARRA > LO SACAMOS!! 

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
-->

    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">

      <!-- Default box -->
  <!--    <div class="box">  //linea gris de separacion con el header 
          <div class="box-header with-border">  //REcuadro Blanco
        <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
BOTON CERRAR Y MINIMIZAR > LO SACAMOS!! -->


<!-- INICIA WIDGET DE EVENTOS REGISTRADOS!!-->
    <div class="col-lg-4 col-xs-6">

        <?php 
            $sql= "SELECT COUNT(id_registrado) AS registros FROM registrados WHERE status_turno=1";
            $resultado= $conn->query($sql);
            $registrados= $resultado->fetch_assoc();

         ?>



          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <!--  <h3>150</h3> -->
              <h3><?php echo $registrados['registros']; ?></h3>


              <p>Eventos en Espera</p>
            </div>
            <div class="icon">
           <!--  <i class="ion ion-person-add"></i> -->
             <i class="fa fa-clock-o"></i>
              <!--     <i class="fa fa-user"></i>
         <i class="fas fa-user-clock"></i>  -->
              <!--<i class="fa fa-shopping-cart"></i> -->
            </div>
            <a href="lista-evento.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
<!-- FIN EVENTOS REGISTRADOS-->

<!-- INICIA WIDGET DE EVENTOS IN PROGRESS!!-->
 <div class="col-lg-4 col-xs-6">

        <?php 
            $sql= "SELECT COUNT(id_registrado) AS registros FROM registrados WHERE status_turno=2";
            $resultado= $conn->query($sql);
            $registrados= $resultado->fetch_assoc();

         ?>



          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
            <!--  <h3>150</h3> -->
              <h3><?php echo $registrados['registros']; ?></h3>


              <p>Eventos In Progress</p>
            </div>
            <div class="icon">
           <!--  <i class="ion ion-person-add"></i> -->
      
              <i class="fa fa-user"></i>
           <!--   <i class="fas fa-user-clock"></i>  -->
              <!--<i class="fa fa-shopping-cart"></i> -->
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

<!-- FIN EVENTOS IN PROGRESS-->


<!-- INICIA WIDGET DE EVENTOS DONE!!-->
 <div class="col-lg-4 col-xs-6">

        <?php 
            $sql= "SELECT COUNT(id_registrado) AS registros FROM registrados WHERE status_turno=3";
            $resultado= $conn->query($sql);
            $registrados= $resultado->fetch_assoc();

         ?>


             <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <!--  <h3>150</h3> -->
              <h3><?php echo $registrados['registros']; ?></h3>


              <p>Eventos Atendidos</p>
            </div>
            <div class="icon">
           <!--  <i class="ion ion-person-add"></i> -->

             <i class="fa fa-users"></i>
      
              <i class="fa fa-bookmark-o"></i>
           <!--   <i class="fas fa-user-clock"></i>  -->
              <!--<i class="fa fa-shopping-cart"></i> -->
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>


<!-- FIN EVENTOS DONE-->


<!-- INICIA WIDGET DE EVENTOS AUSENTES!!-->
 <div class="col-lg-4 col-xs-6">

        <?php 
            $sql= "SELECT COUNT(id_registrado) AS registros FROM registrados WHERE status_turno=4";
            $resultado= $conn->query($sql);
            $registrados= $resultado->fetch_assoc();

         ?>


             <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <!--  <h3>150</h3> -->
              <h3><?php echo $registrados['registros']; ?></h3>


              <p>Usuario Ausente</p>
            </div>
            <div class="icon">
           <!--  <i class="ion ion-person-add"></i> -->
      
              <!--<i class="fa fa-flag-o"></i>  -->
              <i class="fa fa-user-times"></i>
           <!--   <i class="fas fa-user-clock"></i>  -->
              <!--<i class="fa fa-shopping-cart"></i> -->
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

<!-- FIN EVENTOS AUSENTES-->


<!-- INICIA WIDGET DE EVENTOS CANCELADOS!!-->
 <div class="col-lg-4 col-xs-6">

        <?php 
            $sql= "SELECT COUNT(id_registrado) AS registros FROM registrados WHERE status_turno=6";
            $resultado= $conn->query($sql);
            $registrados= $resultado->fetch_assoc();

         ?>


             <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <!--  <h3>150</h3> -->
              <h3><?php echo $registrados['registros']; ?></h3>


              <p>Eventos Cancelados</p>
            </div>
            <div class="icon">
           <!--  <i class="ion ion-person-add"></i> -->
      
              <i class="fa fa-flag-o"></i>
           <!--   <i class="fas fa-user-clock"></i>  -->
              <!--<i class="fa fa-shopping-cart"></i> -->
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

<!-- FIN EVENTOS AUSENTES-->

  <!--           </div>
        <div class="box-body">
          Start creating your amazing application!  
        </div>


    /.box-body -->
       <!--    <div class="box-footer">
          Footer
        </div>
      /.box-footer
      </div>-->
      <!-- /.box -->



<!-- ////////////////////////////////////////////////  -->

<!-- ESPACIO PARA GRAFICO PERFORMANCE (TIPO: DONUT) -->


 <div class="col-lg-12 col-xs-12">

        <?php 

        ////TRAE ARREGLO ASOCIATIVO DE UN ELEMENTO:
/*
$sql= "select distinct(id_empleado) as empleado, AVG(TIMESTAMPDIFF(MINUTE,fecha_inicio,fecha_cierre)) as performance_en_minutos from operacion_diaria group by id_empleado";
     //       $sql= "SELECT COUNT(id_registrado) AS registros FROM registrados WHERE status_turno=6";
            $resultado= $conn->query($sql);
            $performance= $resultado->fetch_assoc();
/*
$row = $result -> fetch_array(MYSQLI_NUM);
printf ("%s (%s)\n", $row[0], $row[1]);

echo "<br>" . "ROW_0: " . $row[0] . "ROW_1:" . $row[1];  * /


echo "empleado" . $empleado_perf=$performance['empleado'];
echo "<br> performance" . $perf= $performance['performance_en_minutos'];
         //$prom= $performance = array('' => , );
         $promedio_emp = json_encode($performance);
         echo "<br>JSON encode: " . $promedio_emp;
         //echo "<br>JSON decode: " . decode($promedio_emp);
         //echo "QUE SALE??: " . $promedio_emp;
        // print_r($promedio_emp);

         //DOC: JSON ENCODE: https://www.youtube.com/watch?v=xdzn8pUt7C4
         //echo "VER: " . $promedio_emp -> performance_en_minutos;
           /*foreach ($variable as $key => $value) {
           # code...

         }
* /    
         ARREGLO ASOCIATIVO  */

/////////////CONSULTA SQL  ////////////////////
/*
$sql= mysqli_execute/mysql_query("select distinct(id_empleado) as empleado, AVG(TIMESTAMPDIFF(MINUTE,fecha_inicio,fecha_cierre)) as performance_en_minutos from operacion_diaria group by id_empleado");
while ($rta= mysql_fetch_array($sql) )
  {   print_r($rta); }
*/
  echo "<br>";

$sql= "select distinct(id_empleado) as empleado, AVG(TIMESTAMPDIFF(MINUTE,fecha_inicio,fecha_cierre)) as performance_en_minutos from operacion_diaria group by id_empleado";

 $resultado= $conn->query($sql);
 $performance= $resultado->fetch_array();
// print_r($performance); 

     //$i=0;
while ($performance= $resultado->fetch_array())
//while ($rta= mysql_fetch_array($sql) )
  {   print_r($performance); 

          echo "<br>JSON encode: " . $perf= json_encode($performance);
           var_dump( json_decode($perf));
          //echo "<br>JSON decode: " .  json_decode($promedio_emp);
         //echo "QUE SALE??: " . $promedio_emp;

   //print_r($performance); 
  /*
  echo "<br>" . "LEGAJO: " . $num_empleado= $performance[$i];
//echo "es???: ".
  echo "<br>" . "TIEMPO: " . $tiempo_empleado = $performance[$i]; 
  
  $i= $i+1;

    echo "<br> SE VE????:  ". $performance['0'] . ", label: ".  $performance['1']; 
 
//ASIGNA LOS VALORES A VARIABLES:
 $num_empleado= $performance['0'];

 $tiempo_empleado = $performance['1'];

echo "<br>" . "num_empleado???: ". $num_empleado . "tiempo_empleado: " . $tiempo_empleado;
 echo "<br>" .  "TRAE DATOS??????: "  ; 

*/


/*

$large=

for ($i=0; $i < long($performance); $i++) { 
  # code...
  echo "<br>" . "{value: ".   $performance['$i'] . ", label: ".  $performance['$i +1']; 
}
  

echo "<br>" . "{value: ".   $performance['0'] . ", label: ".  $performance['1']; 
*/
            ///////////////////

/*
 $perf= json_encode($performance);
 $ver_json= json_decode($perf);
echo "<br>" . "MUESTRA JSON PERFORMANCE: ";
var_dump($ver_json);


*/
/*

////
// Numeric array
$row = $result -> fetch_array(MYSQLI_NUM);
printf ("%s (%s)\n", $row[0], $row[1]);

// Associative array
$row = $result -> fetch_array(MYSQLI_ASSOC);
printf ("%s (%s)\n", $row["Lastname"], $row["Age"]);

// Free result set
$result -> free_result();


/////


           */

         ?>


<?php  /*
             <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <!--  <h3>150</h3> -->
              <h3><?php echo $registrados['registros']; ?></h3>


              <p>Eventos Cancelados</p>
            </div>
            <div class="icon">
           <!--  <i class="ion ion-person-add"></i> -->
      
              <i class="fa fa-flag-o"></i>
           <!--   <i class="fas fa-user-clock"></i>  -->
              <!--<i class="fa fa-shopping-cart"></i> -->
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>

////////////////

<div id="graph" style="height: 250px;"></div>



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


/////////////////


          </div>
        </div>ç


*/

?>




<div id="graph" style="height: 250px;"></div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script src="https://www.chartjs.org/docs/latest/charts/doughnut.html#doughnut
//https://morrisjs.github.io/morris.js/"></script>

<script>

new Morris.Donut({      ///verrrr continuar 08122023
  element: 'graph',
  data: [

    //query:
    $sql= "select distinct(id_empleado) as empleado, AVG(TIMESTAMPDIFF(MINUTE,fecha_inicio,fecha_cierre)) as performance_en_minutos from operacion_diaria group by id_empleado";
    $resultado= $conn->query($sql);
<?php
      $i=-1;


while ($performance= $resultado->fetch_array()) {
   //print_r($performance); 
    $i= $i+1;

   $num_empleado= $performance[$i];
//echo "es???: ".
 $tiempo_empleado = $performance[$i]; 

?>

   {value: <?php echo $num_empleado ;  ?> , label: <?php echo  $tiempo_empleado;  ?> }

 ],  
  formatter: function (x) { return x + " min."}
}).on('click', function(i, row){
  console.log(i, row);
});
<?php  /* CONSULTA A LA BASE: VA ACA????????  */
 }
/*

 $sql= "select distinct(id_empleado) as empleado, AVG(TIMESTAMPDIFF(MINUTE,fecha_inicio,fecha_cierre)) as performance_en_minutos from operacion_diaria group by id_empleado";
 $resultado= $conn->query($sql);
// $performance= $resultado->fetch_array();
 //$perf= json_encode($performance);
 //$ver_json= json_decode($perf);
echo "<br>" . "MUESTRA JSON PERFORMANCE: ";
//var_dump($ver_json);
// print_r($performance); 

while ($performance= $resultado->fetch_array()) {
   //print_r($performance); 
//echo
 $num_empleado= $performance['0'];
//echo "es???: ".
 $tiempo_empleado = $performance['1'];    */
?>



// estooo   {value: <?php echo $num_empleado ;  ?> , label: <?php echo  $tiempo_empleado; ?> }

//{value: <?php echo $num_empleado ;  ?> , label:  <?php echo  $tiempo_empleado; ?> }

<?php  //cerrar el while??????
?>

//{value: <?php echo $performance['0'] ;  ?> , label:  <?php echo  $performance['1']; }?> }
 /*     estooo  ],    
  formatter: function (x) { return x + "%"}
}).on('click', function(i, row){
  console.log(i, row);
});
      */

/* &&&


while ($performance= $resultado->fetch_array()){   ?>
//while ($rta= mysql_fetch_array($sql) )
  //{   print_r($performance); }
{value: <?php echo $performance['empleado']; ?> , label:  <?php echo $performance['performance_en_minutos']; ?> },



&&&*/


/*
    {value: <?php echo $empleado_perf; ?>, label: <?php echo $perf; ?>},
    //{value: <?php echo $performance['performance_en_minutos']; ?>, label: <?php echo $performance['empleado']; ?>},
    {value: 70, label:'prueba'},
    {value: 15, label: 'bar'},
    {value: 10, label: 'baz'},
    {value: 5, label: 'A really really long label'}
    //{value:<?php echo $promedio_emp['empleado'] ;?>, label: <?php  echo $promedio_emp['$performance_en_minutos'] ;?>},
  */

  /*
  ],  
  formatter: function (x) { return x + "%"}
}).on('click', function(i, row){
  console.log(i, row);
});

*/
</script>


        <!--/////////FIN GRAFICO PERFORMANCE////////////   -->










      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
    include_once 'templates/footer.php';
 ?>






 
