<?php 
//include_once 'funciones/sesiones.php';
include_once 'templates/header.php';

include_once 'funciones/funciones.php';
include_once 'templates/barra.php';
include_once 'templates/navegacion.php';

 ?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Crear Administrador
        <small>Complete el Formulario para crear Operario Administrador</small>
      </h1>

<!--BOTON HOME A LA DERECHA DE LA BARRA > LO SACAMOS!! 

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
-->
    </section>

      <div class="row">
          <div class="col-ms-4">
            
        </div>
      </div>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Crear Administrador</h3>
       
            </div>

             

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
         <form role="form" name="guardar-registro" id="guardar-registro" method="POST" action="modelo-admin.php">   <!--  action="insert-admin.php">    action="insertar-admin.php">  
                
            <!--    <input type="hidden" name="agregar-admin" value="0">  -->

        <!--   <form role="form" name="crear-admin" id="crear-admin"  action="insertar-admin.php">  -->
              <div class="box-body">
                <div class="form-group">
                  <label for="usuario">Usuario:</label>
                  <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
                </div>
                
                <div class="form-group">
                  <label for="nombre">Nombre:</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre Usuario">
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password para Iniciar Sesión">
                </div>


                <!--  PARA AGREGAR UN ARCHIVO:
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block">Example block-level help text here.</p>
                </div>

                PARA CHECK:
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>   -->
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
              <input type="hidden" name="registro" value="nuevo"> 
 <!--   
              <input type="hidden" name="agregar-admin" value="1"> 
                <input type="hidden" name="agregar-admin" value="0">-->
                <button id="boton" type="submit" class="btn btn-primary">Añadir</button>
              </div>
            </form>
        </div>


<!--
        <!-- /.box-body - ->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer- ->

-->

      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script src="js/admin-ajax.js"></script>

<?php 
    include_once 'templates/footer.php';
 ?>






 
