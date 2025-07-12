<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IET| Registro</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <!-- iCheck 
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">-->

  <link rel="stylesheet" href="blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <!--<a href="../../index2.html"><b>Admin</b>LTE</a>   -->
    <a href="seccion-registro.php"><b>IET</b> - Registro</a>

  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Registra tus datos aquí</p>

<?php 
/*
  session_start();
  echo "<pre>";
//  var_dump($_SESSION['login']=true);
    var_dump($_SESSION);

  echo "</pre>";
//RETIRAMOS LAS SESIONES DEL LOGIN, SÒLO LO DEJAMOS PARA LAS OTRAS SECCIONES DE LA WEB, PORQUE SIEMPRE SE VA A ESTAR REDIRECCIONANDO AQUI AL LOGIN
*/

 ?>


<!--
    <form action="../../index2.html" method="post">  -->
  <!--  <form role="form" name="login-user-form" id"login-user" method="post" action="insertar-user.php" >  -->

    <form role="form" name="login-user-form" id"login-user" method="post" action="insertar_user.php">    <!--//action="index.php" -->

  <!--  <form role="form" name="login-user-form" id"login-user" method="post" action="test_code.php">    <!--//action="index.php" -->


        <div class="form-group has-feedback">
        <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

          <div class="form-group has-feedback">
        <input type="text" class="form-control" name="apellido" placeholder="Apellido" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

            <div class="form-group has-feedback">
        <input type="text" class="form-control" name="dni" placeholder="DNI" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

        <div class="form-group has-feedback">
        <input type="text" class="form-control" name="celular" placeholder="Celular" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>


      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
        

      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
        



      <div class="row">
     <!--   <div class="col-xs-8"> CHECK IN REMEMBER ME:
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>  
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-12" > <!--text-center"-->
         <input  type="hidden" name="agregar-user" value="1" > <!-- para enviar por POST-->
          <button type="submit" class="btn btn-primary btn-block btn-flat">Registrarse</button>
        </div>
        <!-- /.col      btn-block en bootstrap hace que un boton crezca-->
      </div> 
<!--    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links 
    <a href="#">Olvidé mi password</a><br>
    <a href="register.html" class="text-center">Registrate</a>
-->
    <br>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
   </form>




<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
