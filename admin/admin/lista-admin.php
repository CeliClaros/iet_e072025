<?php 

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
     
    <strong>   <small>Usuarios Admin</small>  </strong> 
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
              <h3 class="box-title">Listado de Administradores</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>ID_usuario</th>
                  <th>Usuario</th>
                  <th>Nombre</th>
                  <th>Password</th>
                  <th>Acciones</th>
<!--              <th>CSS grade</th>    -->
                </tr>
                </thead>
                <tbody>
           

                    <?php 

                      try {

                    //   $sql = "SELECT id_admin, usuario, nombre, password FROM admins";
                      $sql = "SELECT id_admin, usuario, nombre, password FROM admin_users";
                        $resultado = $conn->query($sql);
                        
                      } catch (Exception $e) {

                        $error = $e->getMessage();
                        echo $error;
                        
                      }


                      /*
                            echo "<pre>";

                        var_dump($admin);

                      echo "</pre>";  


                     ?>


                     */




                      while ($admin = $resultado->fetch_assoc()) {    //AGREGA UN TR POR CADA ADMIN DE LA TABLA PORQUE EL VARDUMP TRAE SÓLO UNO   ?>
<!--     SI SACO EL WHILE LA TABLA APARECE VACIA  -->
                    <tr>
                      
                      <td> <?php echo $admin['id_admin']; ?></td>
                       <td> <?php echo $admin['usuario']; ?></td>
                       <td> <?php echo $admin['nombre']; ?></td>
                      <td> <?php echo $admin['password']; ?></td>
                    

                       <td>
                            <a href="editar-admin.php?id=<?php echo $admin['id_admin']; ?>" class="btn bg-orange btn-flat margin">

                              <i class= "fa fa-pencil"></i>
                            </a>  

                            <a href="#" data-id="<?php echo $admin['id_admin'] ?>" data-tipo="admin" class="btn bg-maroon btn-flag margin borrar-registro" >

                              <i class= "fa fa-trash"></i>

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






 
