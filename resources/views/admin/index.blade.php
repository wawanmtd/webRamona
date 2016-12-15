@include('Session._messages')
@include('Session._islogin')
<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{Session::get('PersonName')}} | Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../bootstrap/adminlte/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../bootstrap/adminlte/css/skins/skin-green-light.min.css">
    <link rel="stylesheet" href="../bootstrap/adminlte/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <script src="../bootstrap/adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="../bootstrap/adminlte/plugins/jQuery/jquery-ui-1.11.4.min.js"></script>
    <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../bootstrap/adminlte/js/app.min.js"></script>
    <script src="../bootstrap/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../bootstrap/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>
    @section('script-dashboard')
    @show
  </head>

  <body class="hold-transition skin-green-light sidebar-mini">
    <div class="wrapper">
      <!-- Main Header -->
      <header class="main-header">
        <!-- Logo -->
        <a href="{{action("adminController\AdminController@index")}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">
            <img src="../resources/assets/img/MONLINK.png" alt="" width="60%"/>
          </span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">
            <img src="../resources/assets/img/MONLINK.png" alt="" width="20%" style="float:left; margin-right:-30px; margin-top:3px"/>
            <b>RAMONA</b>
          </span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">{numberMessage}</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have {numberMessage} messages</li>
                  <li>
                    <!-- inner menu: contains the messages -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <!-- User Image -->
                            <img src="../bootstrap/adminlte/img/avatar.png" class="img-circle" alt="User Image">
                          </div>
                          <!-- Message title and timestamp -->
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <!-- The message -->
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <!-- end message -->
                    </ul>
                    <!-- /.menu -->
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- /.messages-menu -->

              <!-- Notifications Menu -->
              <li class="dropdown notifications-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">{numberNotif}</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have {numberNotif} notifications</li>
                  <li>
                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu">
                      <li><!-- start notification -->
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <!-- end notification -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>

              <!-- Tasks Menu -->
              <li class="dropdown tasks-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">{numberTasks}</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have {numberTasks} tasks</li>
                  <li>
                    <!-- Inner menu: contains the tasks -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <!-- Task title and progress text -->
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <!-- The progress bar -->
                          <div class="progress xs">
                            <!-- Change the css width attribute to simulate progress -->
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li>
                      <!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>

              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="../bootstrap/adminlte/img/avatar.png" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">{{Session::get('PersonName')}}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="../bootstrap/adminlte/img/avatar.png" class="img-circle" alt="User Image">
                    <p>
                      {{Session::get('PersonName')}}
                      <small>{{Session::get('Role')}} - {{Session::get('Station')}}</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
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
                    <!-- /.row -->
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{action("adminController\LoginController@logout")}}" class="btn btn-default btn-flat">Logout</a>
                    </div>
                  </li>
                </ul>
              </li>

              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../bootstrap/adminlte/img/avatar.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{Session::get('PersonName')}}</p>
              {{Session::get('Role')}}
            </div>
          </div>

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
              <li class="header">Main Navigation</li>
              <!-- Optionally, you can add icons to the links -->
              <li class="{{Request::is('dashboard') ? 'active' : ''}}">
                <a href="{{action("adminController\AdminController@index")}}">
                  <i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                  @if (Session::get('Member_ID') == 1)
              <li class="{{Request::is('kelolaAdmin') ? 'active' : ''}}">
                <a href="{{action("adminController\KelolaAdminController@index")}}">
                  <i class="fa fa-users"></i> <span>Kelola Admin</span></a></li>
                  @endif
              <li class="{{Request::is('kelolaArea') ? 'active' : ''}}">
                <a href="{{action("adminController\KelolaAreaController@index")}}">
                  <i class="fa fa-map-o"></i> <span>Kelola Area</span></a></li>
              <li class="{{Request::is('kelolaStation') ? 'active' : ''}}">
                <a href="{{action("adminController\KelolaStationController@index")}}">
                  <i class="fa fa-map-marker"></i> <span>Kelola Station</span></a></li>
              <li class="{{Request::is('kelolaDevice') ? 'active' : ''}}">
                <a href="{{action("adminController\KelolaDeviceController@index")}}">
                  <i class="fa fa-wifi"></i> <span>Kelola Model Device</span></a></li>
              <li class="{{Request::is('kelolaDeviceList') ? 'active' : ''}}">
                <a href="{{action("adminController\KelolaDeviceListController@index")}}">
                  <i class="fa fa-wifi"></i> <span>Kelola Device</span></a></li>
              <li class="{{Request::is('kelolaSensor') ? 'active' : ''}}">
                <a href="{{action("adminController\KelolaSensorController@index")}}">
                  <i class="fa fa-wifi"></i> <span>Kelola Sensor</span></a></li>
              <li class="{{Request::is('kelolaBerita') ? 'active' : ''}}">
                <a href="{{action("adminController\KelolaBeritaController@index")}}">
                  <i class="fa fa-newspaper-o"></i> <span>Kelola Berita</span></a></li>
              <li class="{{Request::is('maintenance') ? 'active' : ''}}">
                <a href="{{action("adminController\MaintenanceController@index")}}">
                  <i class="fa fa-wrench"></i> <span>Maintenance</span></a></li>

              <li class="treeview">
                <a href="#">
                  <i class="fa fa-database"></i> <span>Backup & Restore</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{action('adminController\BackupRestoreController@backupView')}}">Backup</a></li>
                  <li><a href="{{action('adminController\BackupRestoreController@restoreView')}}">Restore</a></li>
                </ul>
              </li>

            </ul>
            <!-- /.sidebar-menu -->
          </section>
          <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              @yield('content-header')
            </h1>

          </section>

          <!-- Main content -->
          <section class="content">
            @yield('konten')
          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
          <!-- To the right -->
          <div class="pull-right hidden-xs">
            Anything you want
          </div>
          <!-- Default to the left -->
          <strong>&copy; 2016 <a href="https://www.batan.go.id">Badan Tenaga Nuklir Nasional</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
          <!-- Create the tabs -->
          <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
              <h3 class="control-sidebar-heading">Recent Activity</h3>
              <ul class="control-sidebar-menu">
                <li>
                  <a href="javascript::;">
                    <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                    <div class="menu-info">
                      <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                      <p>Will be 23 on April 24th</p>
                    </div>
                  </a>
                </li>
              </ul>
              <!-- /.control-sidebar-menu -->

              <h3 class="control-sidebar-heading">Tasks Progress</h3>
              <ul class="control-sidebar-menu">
                <li>
                  <a href="javascript::;">
                    <h4 class="control-sidebar-subheading">
                      Custom Template Design
                      <span class="pull-right-container">
                        <span class="label label-danger pull-right">70%</span>
                      </span>
                    </h4>

                    <div class="progress progress-xxs">
                      <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                    </div>
                  </a>
                </li>
              </ul>
              <!-- /.control-sidebar-menu -->
            </div>
            <!-- /.tab-pane -->

            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
              <form method="post">
                <h3 class="control-sidebar-heading">General Settings</h3>
                <div class="form-group">
                  <label class="control-sidebar-subheading">
                    Report panel usage
                    <input type="checkbox" class="pull-right" checked>
                  </label>
                  <p>
                    Some information about this general settings option
                  </p>
                </div>
                <!-- /.form-group -->
              </form>
            </div>
            <!-- /.tab-pane -->
          </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
       <div class="control-sidebar-bg"></div>
     </div>
     <!-- ./wrapper -->
   </body>
</html>
