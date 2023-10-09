<?php
include_once 'db/connect_db.php';
session_start();
if ($_SESSION['username'] == "") {
    header('location:index.php');
} else {
    if ($_SESSION['role'] == "ESTUDIANTE") {
        include_once 'inc/header_all.php';
    } else {
        if ($_SESSION['role'] == "DOCENTE") {
            include_once 'inc/header_all_operator.php';
        } else {
            if ($_SESSION['role'] == "administrador") {
                include_once 'inc/header_all_operator.php';
            }
        }
    }
}

date_default_timezone_set('America/Mexico_City');
if (isset($_POST['add_client'])) {

    $pcedula = $_POST['cedula'];
    $pusuario = $_POST['nombre'];
    $pcontraseña = $_POST['contraseña'];
    $ptipousu = sacar_rol();
    $psede = sacar_sede();
    $pestado = sacar_estado();
    $pnombre = $_POST['nombre'];
    $papellido = $_POST['apellido'];
    $ptelefono = $_POST['telefono'];


    if (isset($_POST['cedula'])) {
        $select = $pdo->prepare("SELECT doc_usu FROM usuario WHERE doc_usu='$pcedula'");
        $select->execute();

        if ($select->rowCount() > 0) {
            echo '<script type="text/javascript">
                    jQuery(function validation(){
                    swal("Warning", "empleado ya registrado", "warning", {
                    button: "Continuar",
                        });
                    });
                    </script>';
        } else {

            $insert = $pdo->prepare("INSERT INTO usuario(doc_usu,usu,con_usu,tip_usu,sed_emp,est_usu,nom_usu,ape_usu,tel_usu)
                            values(:cedula,:usuario,:contrasena,:rol,:sede,:estado,:nombre,:apellido,:telefono)");

            $insert->bindParam(':cedula', $pcedula);
            $insert->bindParam(':usuario', $pusuario);
            $insert->bindParam(':contrasena', $pcontraseña);
            $insert->bindParam(':rol', $ptipousu);
            $insert->bindParam(':sede', $psede);
            $insert->bindParam(':estado', $pestado);
            $insert->bindParam(':nombre', $pnombre);
            $insert->bindParam(':apellido', $papellido);
            $insert->bindParam(':telefono', $ptelefono);

            if ($insert->execute()) {
                echo '<script type="text/javascript">
                                        jQuery(function validation(){
                                        swal("Correcto", "empleado guardado con éxito", "success", {
                                        button: "Continuar",
                                            });
                                        });
                                        </script>';
            } else {
                echo '<script type="text/javascript">
                                        jQuery(function validation(){
                                        swal("Error", "Ocurrió un error", "error", {
                                        button: "Continuar",
                                            });
                                        });
                                        </script>';
            }
        }
    }
}
function sacar_rol()
{
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=soporte_tecnico_oklahoma', 'root', '');
    } catch (PDOException $error) {
        echo $error->getmessage();
    }
    $estado = $_POST['rol'];
    $select = $pdo->prepare("SELECT id FROM rol WHERE rol='$estado'");
    $select->execute();
    $row = $select->fetchColumn();
    return $row;
}
function sacar_sede()
{
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=soporte_tecnico_oklahoma', 'root', '');
    } catch (PDOException $error) {
        echo $error->getmessage();
    }
    $estado = $_POST['sede'];
    $select = $pdo->prepare("SELECT id_emp FROM sedes_empresa WHERE ciu_emp='$estado'");
    $select->execute();
    $row = $select->fetchColumn();
    return $row;
}
function sacar_estado()
{
    $estado = 0;
    $estadog = $_POST['estado'];
    if ($estadog == 1) {
        $estado = 1;
    } else {
        $estado = 0;
    }
    return $estado;
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ALUMNO
        </h1>
        <br>
        <ol class="breadcrumb">
            <li><a href="cliente.php"><i class="fa fa-dashboard"></i>LISTADO ALUMNOS</a></li>
            <li class="active">AGREGAR ALUMNO</li>
        </ol>
        <br>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">INGRESE UN NUEVO ALUMNO</h3>
            </div>
            <form action="" method="POST" name="form_product" enctype="multipart/form-data" autocomplete="off">
                <div class="box-body">
                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="">CEDULA</label><br>
                            <input type="text" class="form-control" name="cedula">
                        </div>
                        <div class="form-group">
                            <label for="">NOMBRE</label><br>
                            <input type="text" class="form-control" name="nombre">
                        </div>
                        <div class="form-group">
                            <label for="">APELLIDO</label><br>
                            <input type="password" class="form-control" name="apellido">
                        </div>
                        <div class="form-group">
                            <label for="">CORREO</label><br>
                            <input type="text" class="form-control" name="nombre">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">GRADO</label><br>
                            <select class="form-control" name="sede" required>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">ESTADO</label><br>
                            <select class="form-control" name="estado" required>
                                <option value="1">
                                    ACTIVO
                                </option>
                                <option value="0">
                                    INACTIVO
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        
                        <div class="form-group">
                            <label for="">TELEFONO</label><br>
                            <input type="text" class="form-control" name="apellido">
                        </div>
                        <div class="form-group">
                            <label for="">TELEFONO</label><br>
                            <input type="text" class="form-control" name="telefono">
                        </div>
                    </div>
                </div>

                <center>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" name="add_client">AGREGAR EMPLEADO</button>
                        <a href="empleados.php" class="btn btn-warning">VOLVER</a>
                    </div>
                </center>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#img_preview').attr('src', e.target.result)
                    .width(250)
                    .height(200);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<?php
include_once 'inc/footer_all.php';
?>