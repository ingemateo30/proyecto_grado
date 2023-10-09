<?php
include_once 'db/connect_db.php';
session_start();
if ($_SESSION['username'] == "") {
  header('location:index.php');
} else {
  if ($_SESSION['role'] == "111100") {
    include_once 'inc/header_all.php';
  } else {
    include_once 'inc/header_all_operator.php';
  }
}


//if button updated clicked
if (isset($_POST['btn_update'])) {

  $oldpass = $_POST['oldpass'];
  $newpass = $_POST['newpass'];
  $confpass = $_POST['confpass'];

  $email = $_SESSION['username'];

  $select = $pdo->prepare("SELECT * FROM usuario where usu='$email'");

  $select->execute();

  $row = $select->fetch(PDO::FETCH_ASSOC);

  $useremail_db = $row['usu'];
  $password_db = $row['con_usu'];

  //compare user input with data from database
  if ($oldpass == $password_db) {

    if ($newpass == $confpass) {

      //if values match update the password
      $update = $pdo->prepare("UPDATE usuario SET con_usu=:pass WHERE usu=:email");

      $update->bindParam(':pass', $confpass);
      $update->bindParam(':email', $email);

      //check if update executed
      if ($update->execute()) {
        echo '<script type="text/javascript">
              jQuery(function validation(){
                swal("Correcto", "contraseña actualizada", "success", {
                  button: "Continue",
                });
              });
              </script>';
      } else {
        echo '<script type="text/javascript">
              jQuery(function validation(){
                swal("Oops", "contraseña no editada", "error", {
                  button: "Continue",
                });
              });
              </script>';
      }
    } else {
      echo '<script type="text/javascript">
            jQuery(function validation(){
              swal("Warning", "Confirma tu contraseña está mal ingresada", "warning", {
                button: "Continue",
              });
            });
            </script>';
    }
  } else {
    echo '<script type="text/javascript">
          jQuery(function validation(){
            swal("Warning", "Tu contraseña está mal ingresada", "warning", {
              button: "Continue",
            });
          });
          </script>';
  }
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
   
  </section>

  <!-- Main content -->
  <section class="content container-fluid">
    <div class="col-md-4">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">CAMBIAR CONTRASEÑA</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="" method="POST">
          <div class="box-body">
            <div class="form-group">
              <label for="oldpassword">CONTRASEÑA ANTERIOR</label>
              <input type="text" class="form-control" id="oldpassword" name="oldpass" required>
            </div>
            <div class="form-group">
              <label for="newpassword">NUEVA CONTRASEÑA</label>
              <input type="password" class="form-control" id="newpassword" name="newpass" required>
            </div>
            <div class="form-group">
              <label for="confirmpassword">CONFIRMAR CONTRASEÑA</label>
              <input type="password" class="form-control" id="confirmpassword" name="confpass" required>
            </div>
          </div>
          <!-- /.box-body -->
          <center>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" name="btn_update">ACTUALIZAR CONTRASEÑA</button>
            </div>
          </center>
          <br>
        </form>
      </div>
    </div>
    <!-- /.box -->
    <div class="col-md-8">
      <div class="box box-success">
        
        <!-- /.box-header -->
        <?php
        $id = $_SESSION['user_id'];
        $select = $pdo->prepare("SELECT * FROM usuario WHERE doc_usu='$id'");
        $select->execute();
        $row = $select->fetch(PDO::FETCH_OBJ) ?>
        
        <div class="box box-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-black" style="background: url('img/background.jpg') center center;">
            <h3 class="widget-user-username"><?php echo $row->nom_usu, $row->ape_usu ?></h3>
            <h5 class="widget-user-desc">mantenimiento</h5>
          </div>
          <div class="widget-user-image">
            <img class="img-circle" src="img/logof.png" alt="User Avatar">
          </div>
          <div class="box-footer">
            <div class="row">
              <div class="box-header with-border">
                <center>
                  <h3 class="box-title">PERFIL DEL USUARIO</h3>
                </center>
              </div>
              <!-- /.col -->

              <!-- /.col -->

              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
        <div class="box-body">
          <div class='detail-text'>
            <label for="name"><strong>DOCUMENTO:</strong></label>
            <span class='text-data'>
              <?php echo $row->doc_usu; ?>
            </span><br><br>
            <label for="name"><strong>NOMBRE DE USUARIO:</strong></label>
            <span class='text-data'>
              <?php echo $row->nom_usu, $row->ape_usu; ?>
            </span><br><br>
            <label for="name"><strong>USUARIO:</strong></label>
            <span class='text-data'>
              <?php echo $row->usu; ?>
            </span><br><br>
            <label for="name"><strong>CONTRASEÑA:</strong></label>
            <span class='text-data'>
              <?php echo $row->con_usu; ?>
            </span><br><br>
            <label for="name"><strong>RANGO:</strong></label>
            <span class='text-data'>
              <?php echo $row->tip_usu; ?>
            </span><br><br>
            <label for="name"><strong>SEDE:</strong></label>
            <span class='text-data'>
              <?php echo $row->sed_emp; ?>
            </span><br><br>
            <label for="name"><strong>TELEFONO:</strong></label>
            <span class='text-data'>
              <?php echo $row->tel_usu; ?>
            </span><br>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once 'inc/footer_all.php';
?>