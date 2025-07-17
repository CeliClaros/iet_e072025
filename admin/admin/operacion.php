<?php 
session_start();

  //include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';
  include_once 'templates/header.php';

  include_once 'templates/barra.php';
  include_once 'templates/navegacion.php';
 ?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Panel de Control
     
    <strong>   <small>Eventos Reservados</small>  </strong> 
      </h1>

<!--BOTON HOME A LA DERECHA DE LA BARRA > LO SACAMOS!! 

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
-->

    </section>


<!--
    <!-- Main content - ->
    <section class="content">

      <!-- Default box -->
       <div class="box">
  <!--      <div class="box-header with-border">
         <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
BOTON CERRAR Y MINIMIZAR > LO SACAMOS!! - ->

        </div>
        <div class="box-body">
          Start creating your amazing application!
        </div>
        <!-- /.box-body - ->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box - ->

    </section>
    <!-- /.content - ->


    -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

    

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Administra Eventos de Atención Presencial</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
<!--
IDReserva: id_registrado
dniUsuario: dni
Registro: fecha_registro
TipoEvento: tramite_id
CategoriaEvento: id_tipo_tramite
EstadoEvento: status_turno  -->

                 <th>ID_Reserva</th>
                  <th>Usuario_DNI</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
           
                  <th>Registro</th>
               <!--   <th>TipoEvento</th>   //trae dato ID_TRamite en col del reporte Tipo_evento 
                  <th>CategoriaEvento</th>
                  <th>Evento</th>-->
                   <th>Tramite</th>
                  <th>Tipo Atencion</th>
                  <th>EstadoEvento</th>
                  <th>Acciones</th>
<!--              <th>CSS grade</th>    -->
                </tr>
                </thead>
                <tbody>
           

                    <?php 

                      try {

                    //   $sql = "SELECT id_admin, usuario, nombre, password FROM admins";
                      //$sql = "SELECT id_admin, usuario, nombre, password FROM admin_users";
                      //$sql = "SELECT id_registrado, dni, nombre, apellido, fecha_registro, tramite_id, id_tipo_tramite, status_turno FROM registrados";
                      //con join: 
                   //   $sql = "SELECT id_registrado, dni, nombre, apellido, fecha_registro, tramite_id, tipo_tramite, nm_status FROM registrados INNER JOIN categoria_tramite ON registrados.id_tipo_tramite = categoria_tramite.id_tipo INNER JOIN status_turnos ON registrados.status_turno = status_turnos.id_status";


                      //$sql = "SELECT r.id_registrado, r.dni, r.nombre, r.apellido, r.fecha_registro, r.tramite_id, c.tipo_tramite, s.status, t.clave FROM registrados r INNER JOIN categoria_tramite c ON r.id_tipo_tramite=c.id_tipo INNER JOIN status_eventos s ON r.status_turno=s.id_status INNER JOIN tramites t ON r.tramite_id= t.tramite_id WHERE r.fecha_registro like '2021-08-17%' OR  r.fecha_registro like '2021-08-19%' OR  r.fecha_registro like '2021-08-18%'  ";
                      $sql = "SELECT r.id_registrado, r.dni, r.nombre, r.apellido, r.fecha_registro, r.tramite_id, c.tipo_tramite, s.status, t.clave FROM registrados r INNER JOIN categoria_tramite c ON r.id_tipo_tramite=c.id_tipo INNER JOIN status_eventos s ON r.status_turno=s.id_status INNER JOIN tramites t ON r.tramite_id= t.tramite_id WHERE r.fecha_registro like '2024-12-03%' OR  r.fecha_registro like '2024-12-03%' OR  r.fecha_registro like '2024-12-03%'  ";

                   
                        //$sql = "SELECT id_registrado, dni, nombre, apellido, fecha_registro, tramite_id, tipo_tramite, nm_status FROM registrados r INNER JOIN categoria_tramite c ON r.id_tipo_tramite=c.id_tipo INNER JOIN status_turnos ON registrados.status_turno=status_turnos.id_status";
                        $resultado = $conn->query($sql);
/* PARA VER RESULTADO:
                      //  echo "RESULTADO: ";
                        //$ver = $resultado->fetch_assoc();

                      //  var_dump($ver);
   FIN VER RESULTADO--                   */  
                      } catch (Exception $e) {

                        $error = $e->getMessage();
                        echo $error;
                        
                      }
/*
IDReserva: id_registrado
dniUsuario: dni
nombre: nombre
Apellido: apellido
Registro: fecha_registro
TipoEvento: tramite_id
CategoriaEvento: id_tipo_tramite
EstadoEvento: status_turno

*/


                      /*
                            echo "<pre>";

                        var_dump($admin);

                      echo "</pre>";  


                     ?>


                     */




                      while ($reservas = $resultado->fetch_assoc()) {    //AGREGA UN TR POR CADA ADMIN DE LA TABLA PORQUE EL VARDUMP TRAE SÓLO UNO   ?>
<!--     SI SACO EL WHILE LA TABLA APARECE VACIA  -->
                    <tr>
                      
                      <td> <?php echo $reservas['id_registrado']; ?></td>
                       <td> <?php echo $reservas['dni']; ?></td>
                       <td> <?php echo $reservas['nombre']; ?></td>
                      <td> <?php echo $reservas['apellido']; ?></td>

                      <td> <?php echo $reservas['fecha_registro']; ?></td>

                    <!--   <td> <?php //echo $reservas['tramite_id']; ?></td>  -->

                       <td> <?php echo $reservas['clave']; ?></td>
                       <td> <?php  echo $reservas['tipo_tramite']; ?></td>
                      <td> <?php echo $reservas['status']; ?></td>
                    

                       <td>
                         <!--   <a href="inicia-operacion.php?id=<?php echo $reservas['id_registrado']; ?>&fecha=<?php echo $reservas['fecha_registro']; ?>" class="btn bg-green btn-flat margin">  -->


                            <a href="inicia-operacion.php?id=<?php echo $reservas['id_registrado'] ."&fecha=". $reservas['fecha_registro']; ?>" class="btn bg-green btn-flat margin">

                              <i class= "fa fa-play"></i>
                            </a>  

                            <a href="cierra-operacion.php?data-id=<?php echo $reservas['id_registrado']; ?>" data-tipo="admin" class="btn bg-maroon btn-flag margin borrar-registro" >

                              <i class= "fa fa-power-off"></i>

                            </a>

                               <a href="siguiente-transac.php?id=2&data-id=<?php echo $reservas['id_registrado']; ?>" data-tipo="admin" class="btn bg-yellow btn-flag margin borrar-registro" >

                              <i class= "fa fa-forward"></i>   <!-- para Cerrar Evento como AUSENTE, envía fijo el 2!!  -->

                            </a>

                       </td>




                       </tr>
                  

                    <?php   }   //FIN DEL WHILE    ?>


                      ;

                




                </tbody>
                <tfoot>
<!--              <tr>
                  <th>Usuario</th>
                  <th>Nombre</th>
                  <th>Apellido(s)</th>
                  <th>Acciones</th>
                  <th>CSS grade</th>
                </tr>   -->
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->


  </div>
  <!-- /.content-wrapper -->

<?php 
    include_once 'templates/footer.php';
 ?>






 
