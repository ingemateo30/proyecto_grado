<?php
include_once 'misc/plugin.php';
include_once 'db/connect_db.php';
session_start();
ob_start();
if ($_SESSION['username'] == "") {
    header('location:index.php');
} else {
    if ($_SESSION['role'] == "111100") {
        include_once 'inc/header_all.php';
    } else {
        include_once 'inc/header_all_operator.php';
    }
}

if ($id = $_GET['id']) {
    $select = $pdo->prepare("SELECT * FROM usuario WHERE doc_usu=$id");
    $select->execute();
    $row = $select->fetch(PDO::FETCH_ASSOC);

    $cedula = $row['doc_usu'];
    $usuario = $row['usu'];
    $contraseña = $row['con_usu'];
    $tipousu = $row['tip_usu'];
    $sede = $row['sed_emp'];
    $estado = $row['est_usu'];
    $nombre = $row['nom_usu'];
    $apellido = $row['ape_usu'];
    $telefono = $row['tel_usu'];
}
if (isset($_POST['update_empleado'])) {

    $pcedula = $_POST['documento'];
    $pusuario = $_POST['usuario'];
    $pcontraseña = $_POST['contraseña'];
    $ptipousu = sacar_mantenimiento();
    $psede = $_POST['sede'];
    $pestado = $_POST['estado'];
    $pnombre = $_POST['nombre'];
    $papellido = $_POST['apellido'];
    $ptelefono = $_POST['telefono'];

    $update = $pdo->prepare("UPDATE usuario SET doc_usu=:edoc,usu=:eusu,
                con_usu=:econ, tip_usu=:etipo, sed_emp=:esede,
                est_usu=:estado,nom_usu=:enom,ape_usu=:eape,
                tel_usu=:etel WHERE doc_usu=$id");

    $update->bindParam('edoc', $pcedula);
    $update->bindParam('eusu', $pusuario);
    $update->bindParam('econ', $pcontraseña);
    $update->bindParam('etipo', $ptipousu);
    $update->bindParam('esede', $psede);
    $update->bindParam('estado', $pestado);
    $update->bindParam('enom', $pnombre);
    $update->bindParam('eape', $papellido);
    $update->bindParam('etel', $ptelefono);

    if ($update->execute()) {
        header('location:ver_empleado.php?id=' . urlencode($id));
            ob_end_flush();
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
function sacar_mantenimiento()
{
    try {
        $pdo = new PDO('mysql:host=68.178.221.224;dbname=soporte_tecnico_oklahoma2','admin_soporte','M1005450340s@');
    } catch (PDOException $error) {
        echo $error->getmessage();
    }
    $estado = $_POST['tipo'];
    $select = $pdo->prepare("SELECT id FROM rol WHERE id='$estado'");
    $select->execute();
    $row = $select->fetchColumn();
    return $row;
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">EDITAR EMPLEADO</h3>
            </div>
            <form action="" method="POST" name="form_product" enctype="multipart/form-data" autocomplete="off">
                <div class="box-body">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">DOCUMENTO</label>
                            <input type="number" class="form-control" name="documento" value="<?php echo $cedula; ?>" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="">USUARIO</label>
                            <input type="text" class="form-control" name="usuario" value="<?php echo $usuario; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">CONTRASEÑA</label>
                            <input type="text" class="form-control" name="contraseña" value="<?php echo $contraseña; ?>" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">TIPO</label>
                            <input type="number" class="form-control" name="tipo" value="<?php echo $tipousu; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">SEDE</label>
                            <input type="number" class="form-control" name="sede" value="<?php echo $sede; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">ESTADO</label>
                            <input type="number" class="form-control" name="estado" value="<?php echo $estado; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">NOMBRE</label>
                            <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">APELLIDO</label>
                            <input type="text" class="form-control" name="apellido" value="<?php echo $apellido; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">TELEFONO</label>
                            <input type="text" class="form-control" name="telefono" value="<?php echo $telefono; ?>" required>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name="update_empleado">ACTUALIZAR</button>
                    <a href="empleados.php" class="btn btn-warning">VOLVER</a>
                </div>
            </form>

        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once 'inc/footer_all.php';
?>