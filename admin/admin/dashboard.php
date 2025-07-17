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
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
    include_once 'templates/footer.php';
 ?>






 
