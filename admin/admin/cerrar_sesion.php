<?php 

session_start();
$cerrar_sesion=$_GET['cerrar_sesion'];
if($cerrar_sesion){
  session_destroy();
}



include_once 'templates/header.php';
 ?>

</head>
<body class="hold-transition login-page">


<div class="login-box">
  <div class="login-logo">
    <a href="../iet_app/index.php"><b>Admin</b>IET</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Inicia Sesión aquí</p>

        <!--  
            session_start();
            echo "<pre>";
            var_dump($_SESSION);
            echo "</pre>";
-->

    <form role="form" name="login-admin-form" id="login-admin" method="POST" action="consulta-login.php">   <!--  action="insertar-admin.php">  -->

      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="usuario" placeholder="Usuario">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
      <!--    <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>  -->
        </div>
        <!-- /.col -->
        <div class="col-xs-12"> <!-- text-center"-->
          <input  type="hidden" name="login-admin" value="1">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar Sesión</button>

        </div>
        <!-- /.col -->
      </div>
    </form>
<!--
    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->




<?php 
    include_once 'templates/footer.php';
 ?>






 
