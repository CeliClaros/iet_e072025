<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../admin_area.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>I</b>ET</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b> IET</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

<!-- MENSAJES RECIBIDOS DE OTRO USUARIO:

          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data - ->
                <ul class="menu">
                  <li><!-- start message - ->
                    <a href="#">
                      <div class="pull-left">
                        <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message  ->
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>

MENSAJES ENTRE USUARIOS -->


<!--NOTIFICACIONES DE LA BARRA: 

          <!-- Notifications: style can be found in dropdown.less - ->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data - ->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>


FIN NOTIFICACIONES -->


<!-- FLAG TAREAS: 

          <!-- Tasks: style can be found in dropdown.less - ->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data - ->
                <ul class="menu">
                  <li><!-- Task item - ->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item - ->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>


FIN TAREAS -->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

<!-- IMAGEN DEL USUARIO LOGEADO:            
              <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">

  imagen user -->
              <span class="hidden-xs">  <?php //echo $_SESSION['nombre'];  ?> Usuario: Admin</span>
            </a>
            <ul class="dropdown-menu">


<!-- USUARIO LOGEADO, DESCRIPCION: 

              <!-- User image - ->
              <li class="user-header">

<!-- IMAGEN DEL USUARIO LOGEADO:
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
IMAGEN DEL USUARIO LOGEADO - ->


                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body - ->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row - ->
              </li>

DESCRIPCION DE USUARIO -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                <!-- Para poner más visibles los botones (en color verde):
                  <a href="#" class="btn btn-success btn-flat">Ajustes</a>
                  -->
                  <a href="editar-admin.php?id=<?php // vs758 m7.03 echo $_SESSION['id'];  ?> " class="btn btn-default btn-flat">Ajustes</a>
                </div>
                <div class="pull-right">
                 <!--<a href="login.php?cerrar_sesion=true" class="btn btn-default btn-flat">Cerrar Sesión</a> -->
                  <a href="cerrar_sesion.php?cerrar_sesion=true" class="btn btn-default btn-flat">Cerrar Sesión</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>

          <!-- icono/img config
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            -->

          </li>
        </ul>
      </div>
    </nav>
  </header>