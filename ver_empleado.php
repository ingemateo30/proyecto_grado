<?php
    include_once'db/connect_db.php';
    session_start();
    if($_SESSION['username']==""){
      header('location:index.php');
    }else{
      if($_SESSION['role']=="111100"){
        include_once'inc/header_all.php';
      }else{
          include_once'inc/header_all_operator.php';
      }
    }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        EMPLEADOS
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-success">
            <div class="box-body">
              <?php
                $id = $_GET["id"];

                $select = $pdo->prepare("SELECT * FROM usuario WHERE doc_usu='$id'");
                $select->execute();
                while($row = $select->fetch(PDO::FETCH_OBJ)){ ?>

                <div class="col-md-6">
                  <ul class="list-group">

                    <center><p class="list-group-item list-group-item-success">EMPLEADO</p></center>
                    <li class="list-group-item"> <b>CEDULA</b>     :<span class="label badge pull-right"><?php echo $row->doc_usu; ?></span></li>
                    <li class="list-group-item"><b>NOMBRES</b>    :<span class="label label-info pull-right"><?php echo $row->nom_usu; ?></span></li>
                    <li class="list-group-item"><b>APELLIDOS</b>        :<span class="label label-primary pull-right"><?php echo $row->ape_usu; ?></span></li>
                    <li class="list-group-item"><b>TELEFONO</b>  :<span class="label label-warning pull-right"><?php echo $row->tel_usu; ?></span></li>
                    <li class="list-group-item"><b>SEDE</b>     :<span class="label label-warning pull-right"><?php echo $row->sed_emp; ?></span></li>
                    <li class="list-group-item"><b>ESTADO</b>           :<span class="label label-success pull-right"><?php echo $row->est_usu; ?></span></li>
                  </ul>
                </div>
              <?php
                }
              ?>
            </div>
            <div class="box-footer">
                <a href="empleados.php" class="btn btn-warning">VOLVER</a>
            </div>

        </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php
    include_once'inc/footer_all.php';
 ?>