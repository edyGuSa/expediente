<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<!--Head del template-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <title>Expediente Admin | Clinica 2010</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href=" {{ URL::asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href=" {{ URL::asset('assets/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href=" {{ URL::asset('assets/bower_components/Ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href=" {{ URL::asset('assets/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href=" {{ URL::asset('assets/dist/css/skins/skin-blue.min.css')}}">
  <link rel="stylesheet" href=" {{ URL::asset('assets/plugins/jquery.dataTables.min.css')}}"/>
  <link rel="stylesheet" href=" {{ URL::asset('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href=" {{ URL::asset('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

 
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>ECE</b>A</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Expediente</b>ECE</span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
              <i class="fa fa-fw fa-power-off"></i> Salir
            </a>
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            </li>
            <!-- /.messages-menu -->

            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              
            </li>
            <!-- Tasks Menu -->
            <li class="dropdown tasks-menu">
              
            </li>
            <!-- User Account Menu -->
            
            <!-- Control Sidebar Toggle Button -->
            <li>
              
            </li>
          </ul>
        </div>
      </nav>
    </header>
    
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">Menú</li>
          <!-- Optionally, you can add icons to the links -->
          <li class="active"><a href="{{ url('pacientes') }}"><i class="fa fa-link"></i> <span>Pacientes</span></a></li>
          <li class="active"><a href="{{ url('consultas') }}"><i class="fa fa-link"></i> <span>Expedientes</span></a></li>
          <!--<li class="treeview">
            <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#">Link in level 2</a></li>
              <li><a href="#">Link in level 2</a></li>
            </ul>
          </li>-->
        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        
      </section>

      <!-- Main content -->
      <section class="content container-fluid">
        <div class="row">
          <div class="col-xs-12">

            @yield('homepage')

          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="pull-right hidden-xs">
        Clinica 2010
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2017 <a href="#">Expediente ECE</a>.</strong> Todos los derechos reservados.
    </footer>  
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED JS SCRIPTS -->

  <!-- jQuery 3 -->
  <script src="{{ URL::asset('assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{ URL::asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{ URL::asset('assets/dist/js/adminlte.min.js')}}"></script>
  <!-- Plugins Opcionales-->
  <script src="{{ URL::asset('assets/plugins/jquery.dataTables.min.js')}}"></script>
  <script src="{{ URL::asset('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ URL::asset('assets/bower_components/Chart.js/Chart.js') }}"></script>

  @yield('scripts')
  
</body>
</html>