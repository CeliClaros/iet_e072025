
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        <!-- IMAGEN DE PERFIL, RETIRAMOS:
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          
                <img src="img/usuario-160x160.jpg" class="img-circle" alt="User Image">  --> 
             <!--  
                <i class="fas fa-user-circle"></i>
                   
                <i class="far fa-user"></i>

                
                <i class="fas fa-user"></i>
            <i class="fa fa-minus"></i>
               </button>

               -->
        </div>
        <div class="pull-left info">
          <p>User Name Celina</p> 
          <!--     <p><?php echo $_SESSION['usuario']; ?></p> -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menú de Administración</li>
        <li class="treeview">
          <a href="#">






          <!-- DASHBOARD | para USUARIO ADMINISTRADOR: -->
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          
          <ul class="treeview-menu">-->
            <li><a href="dashboard.php"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
           <!-- <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>  -->
          </ul>
           
           <ul class="treeview-menu">-->
            <li><a href="dashboard-grafico.php"><i class="fa fa-circle-o"></i> Reporte Reservas</a></li>
           <!-- <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>  -->
          </ul>
 
        </li>
    <!-- FIN DASHBOARD | para USUARIO ADMINISTRADOR -->


<!-- Operacion Diaria | sòlo USUARIO Operador y admin: -->

<li class="treeview">
          <a href="#">
            <!-- <i class="fa fa-files-o"></i> -->
            <i class="fa fa-address-card"></i> 
            <span>Operacion Diaria</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>   <!-- si se puede traer el total de eventos!! si no ELIMINAR! -->
            </span>
          </a>
          <ul class="treeview-menu">
          <!--  <li><a href="../layout/top-nav.html"></i><i class="fa fa-circle-o"></i> Ver Todos</a></li>  
            <li><a href="../layout/top-nav.html"><i class="fas fa-plus-square"></i> Ver Todos</a></li> -->

            <li><a href="operacion.php"><i class="fa fa-list-ul"></i></i> Atencion Presencial</a></li>

            <!--<li><a href="#"><i class="fa fa-plus-circle"></i> Agregar</a></li>  -->


            
            <!--
            <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
            -->
          </ul>
        </li>

<!--FIN Operacion Diaria | sòlo USUARIO Operador y admin -->


<!-- Lista Eventos Reservados | para USUARIO ADMINISTRADOR: -->
        <li class="treeview">
          <a href="#">
            <!-- <i class="fa fa-files-o"></i> -->
            <i class="fa fa-calendar"></i> 
            <span>Eventos Reservados</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>   <!-- si se puede traer el total de eventos!! si no ELIMINAR! -->
            </span>
          </a>
          <ul class="treeview-menu">
          <!--  <li><a href="../layout/top-nav.html"></i><i class="fa fa-circle-o"></i> Ver Todos</a></li>  
            <li><a href="../layout/top-nav.html"><i class="fas fa-plus-square"></i> Ver Todos</a></li> -->

            <li><a href="lista-evento.php"><i class="fa fa-list-ul"></i></i> Ver Todos</a></li>



          <!--      <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Agregar</a></li> 

                    <i class="fas fa-plus-circle"></i>
           -->
            <li><a href="editar-evento.php"><i class="fa fa-plus-circle"></i> Agregar</a></li>


            
            <!--
            <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
            -->
          </ul>
        </li>
<!-- FIN Lista Eventos Reservados | para USUARIO ADMINISTRADOR -->










<!--CATEGORIA DE EVENTOS: AGREGAR ELIMINAR, CRUD -->


<li class="treeview">
          <a href="#">
            <!-- <i class="fa fa-files-o"></i> -->
            <i class="fa fa-book"></i> 
            <span>Categoría de Tramites</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>   <!-- si se puede traer el total de eventos!! si no ELIMINAR! -->
            </span>
          </a>
          <ul class="treeview-menu">
          <!--  <li><a href="../layout/top-nav.html"></i><i class="fa fa-circle-o"></i> Ver Todos</a></li>  
            <li><a href="../layout/top-nav.html"><i class="fas fa-plus-square"></i> Ver Todos</a></li> -->

            <li><a href="#"><i class="fa fa-list-ul"></i></i> Ver Todos</a></li>



          <!--      <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Agregar</a></li> 

                    <i class="fas fa-plus-circle"></i>
           -->
            <li><a href="#"><i class="fa fa-plus-circle"></i> Agregar</a></li>


            
            <!--
            <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
            -->
          </ul>
        </li>


        <!-- FIN CATEGORIA DE EVENTOS -->

<!-- USUARIO ADMIN | CRUD USUARIO ADMINISTRADOR: -->

<li class="treeview">
          <a href="#">
            <!-- <i class="fa fa-files-o"></i> -->
            <i class="fa fa-user"></i> 
            <span>Administradores</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>   <!-- si se puede traer el total de eventos!! si no ELIMINAR! -->
            </span>
          </a>
          <ul class="treeview-menu">
          <!--  <li><a href="../layout/top-nav.html"></i><i class="fa fa-circle-o"></i> Ver Todos</a></li>  
            <li><a href="../layout/top-nav.html"><i class="fas fa-plus-square"></i> Ver Todos</a></li> -->

            <li><a href="lista-admin.php"><i class="fa fa-list-ul"></i></i> Ver Todos</a></li>

            <li><a href="crear-admin.php"><i class="fa fa-plus-circle"></i> Agregar</a></li>


            
            <!--
            <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
            -->
          </ul>
        </li>

<!--FIN USUARIO ADMINISTRADOR -->


<!-- USUARIO OPERADOR | EMPLEADOS: -->

<li class="treeview">
          <a href="#">
            <!-- <i class="fa fa-files-o"></i> -->
            <i class="fa fa-user-circle"></i> 
            <span>Operadores</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>   <!-- si se puede traer el total de eventos!! si no ELIMINAR! -->
            </span>
          </a>
          <ul class="treeview-menu">
          <!--  <li><a href="../layout/top-nav.html"></i><i class="fa fa-circle-o"></i> Ver Todos</a></li>  
            <li><a href="../layout/top-nav.html"><i class="fas fa-plus-square"></i> Ver Todos</a></li> -->

            <li><a href="#"><i class="fa fa-list-ul"></i></i> Ver Todos</a></li>

            <li><a href="#"><i class="fa fa-plus-circle"></i> Agregar</a></li>


            
            <!--
            <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
            -->
          </ul>
        </li>

<!--FIN USUARIO OPERADOR -->

<!-- USUARIO OPERADORES | ASIGNADOS A UN EVENTO >> OPERACION DIARIA: -->

<li class="treeview">
          <a href="#">
            <!-- <i class="fa fa-files-o"></i> -->
            <i class="fa fa-address-card"></i> 
            <span>Asignaciones</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>   <!-- si se puede traer el total de eventos!! si no ELIMINAR! -->
            </span>
          </a>
          <ul class="treeview-menu">
          <!--  <li><a href="../layout/top-nav.html"></i><i class="fa fa-circle-o"></i> Ver Todos</a></li>  
            <li><a href="../layout/top-nav.html"><i class="fas fa-plus-square"></i> Ver Todos</a></li> -->

            <li><a href="#"><i class="fa fa-list-ul"></i></i> Ver Todos</a></li>

            <li><a href="#"><i class="fa fa-plus-circle"></i> Agregar</a></li>


            
            <!--
            <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
            -->
          </ul>
        </li>

<!--USUARIO OPERADORES | ASIGNADOS A UN EVENTO >> OPERACION DIARIA -->








<!-- OTRAS FUNCIONALIDADES DE NAVEGACION: 


        <li>
          <a href="../widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">Hot</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="../UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="../UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="../UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="../UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="../UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>
        <li>
          <a href="../calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li>
          <a href="../mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li class="active"><a href="blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>

FIN FUNCIONALIDADES DE NAVEGACION
      -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->