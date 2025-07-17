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
       IET - Administracion
        <small>Panel de Control IET</small>
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

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          
          <h3 class="box-title">
<strong>
          Panel de Control
          </strong></h3>
<!--
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
BOTON CERRAR Y MINIMIZAR > LO SACAMOS!! -->

        </div>
        <div class="box-body">
      <strong>     Selecciona la Operacion desde el Menu:</strong>
     <ul>
          
        <li>Dashboard</li>
        <li>Operacion Diaria</li>
        <li>Lista de Eventos Reservados</li>
        <li>Configuracion de Eventos por Categoria</li>
        <li>Usuarios Administrador</li>
        <li>Usuarios Operadores de IET</li>
        <li>Asignacion de Tareas Diarias</li>



        </ul>

        </div>
        <!-- /.box-body -->


    <!--    CAJA FOOTER:
    <div class="box-footer">
          Footer
        </div>   FIN CAJA FOOTER -->
        <!-- /.box-footer-->


      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
    include_once 'templates/footer.php';
 ?>






 
