<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Clases del Alumno</title>
    <!-- Enlaces a Bootstrap y AdminLTE -->
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="img/escudito.png">
    <!--Sweetalert Plugin --->
    <script src="bower_components/sweetalert/sweetalert.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- bootstrap timepicker -->
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- DataTables -->
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- datepicker js -->
    <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/iCheck/all.css">
    <!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>

    <!-- chart Js -->
    <script src="chartjs/dist/Chart.min.js"></script>


    <!-- Agrega estilos personalizados -->
    <style>
        .class-list {
            padding: 20px;
        }

        .class-item {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .class-title {
            font-weight: bold;
            margin-bottom: 5px;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>IEAR</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>INGLES</b></span>
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
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="img/logo1.PNG" class="user-image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo $_SESSION['username']; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="img/logo1.PNG" class="img-circle" alt="User Image">
                  <p>
                    <?php echo $_SESSION['username']; ?> - <?php echo $_SESSION['role']; ?>
                    <small class="text-capitalize"><?php echo $_SESSION['username']; ?></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="profile.php" class="btn btn-default btn-flat">Perfil</a>
                  </div>
                  <div class="pull-right">
                    <a href="misc/logout.php" class="btn btn-default btn-flat" onclick="return confirm('Esta seguro de salir?')" class="btn btn-danger">Cerrar sesion</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
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
            <img src="img/logo1.PNG" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $_SESSION['username']; ?></p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MENU PRINCIPAL</li>

         <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>PAGINA DE INICIO</span></a></li>

          <li class="treeview">
            <a href="#">
              <i class="glyphicon glyphicon-wrench"></i> <span>DOCENTES</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href=agregar_orden.php><i class="fa fa-circle-o"></i> INGRESAR DOCENTE</a></li>
              <li><a href=orden.php><i class="fa fa-circle-o"></i> VER LISTADO DOCENTES</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="glyphicon glyphicon-wrench"></i> <span>ALUMNOS</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href=agregar_alumno.php><i class="fa fa-circle-o"></i> INGRESAR ALUMNO</a></li>
              <li><a href=Alumnos.php><i class="fa fa-circle-o"></i> VER LISTADO ALUMNO</a></li>
            </ul>
          </li>
        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>

      

        <!-- Contenido principal -->
        <div class="content-wrapper">
            <section class="content-header">
                <h1>Clases del Alumno</h1>
            </section>
            <section class="content">
                <div class="class-list">
                    <?php
                    // Reemplaza este código con tu lógica para mostrar las clases del alumno
                    $studentClasses = array(
                        "Clase 1: Matemáticas",
                        "Clase 2: Ciencias",
                        "Clase 3: Historia",
                    );

                    foreach ($studentClasses as $class) {
                        echo '<div class="class-item">';
                        echo '<p class="class-title">' . $class . '</p>';
                        // Puedes agregar más detalles de la clase aquí
                        echo '</div>';
                    }
                    ?>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
<?php
include_once 'inc/footer_all.php';
?>

