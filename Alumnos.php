<?php
include_once 'db/connect_db.php';
session_start();
if ($_SESSION['username'] == "") {
    header('location:index.php');
} else {
    if ($_SESSION['role'] == "ESTUDIANTE") {
        include_once 'inc/header_all.php';
    } else {
    if ($_SESSION['role'] == "DOCENTE"){
        include_once 'inc/header_all_operator.php';
    }else{
      if ($_SESSION['role'] == "administrador"){
        include_once 'inc/header_all_operator.php';
    }
}
}
}

/*
$id = $_GET['id'];
$delete = $pdo->prepare("DELETE FROM personas WHERE doc_per='.$id'");
if($delete->execute()){
echo'<script type="text/javascript">
jQuery(function validation(){
swal("Info", "El producto ha sido eliminado satisfactoriamente", "info", {
button: "Continuar",
});
});
</script>';
}
*/
?>
<html>

<head>
    <meta http-equiv="refresh" content="60">
</head>

</html>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="text-center" id="spinner">
        <i class="fa fa-spinner fa-spin fa-3x"></i>
    </div>
    <style>
        #spinner {
            display: none;
        }
    </style>
    <section class="content container-fluid">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">LISTA DE ALUMNOD</h3>
                <a href="agregar_empleado.php" class="btn btn-primary btn-sm pull-right"><i class="fa fa-bars"></i> AGREGAR ALUMNO</a>
            </div>
            <div class="box-body">

                <div style="overflow-x:auto;">
                    <table class="table table-striped" id="myProduct">
                        <thead>
                            <tr>
                                <th>CEDULA</th>
                                <th>NOMBRES</th>
                                <th>APELLIDOS</th>
                                <th>GRADO</th>
                                <th>CORREO</th>
                                <th>TELEFONO</th>
                                <th>OPCION</th>
                            </tr>

                        </thead>
                        <tbody>
                            
                            <?php
                            /*
                            $no = 1;
                            $select = $pdo->prepare("SELECT A.doc_usu AS DOC,A.usu AS USUARIO,A.nom_usu AS NOMBRE,A.ape_usu AS APELLIDO,A.tel_usu 
                            AS TELEFONO,B.ciu_emp AS SEDE,A.est_usu AS ESTADO
                            FROM usuario A
                            JOIN sedes_empresa B
                            ON A.sed_emp = B.id_emp");
                            $select->execute();
                            while ($row = $select->fetch(PDO::FETCH_OBJ)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row->DOC; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->USUARIO; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->NOMBRE . ' ' . $row->APELLIDO; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->TELEFONO; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->SEDE; ?>
                                    </td>
                                    <td>
                                        <?php 
                                        if ($row->ESTADO == 0) {
                                            echo 'INACTIVO';
                                        }else {
                                            echo 'ACTIVO';
                                        }
                                        
                                        ?>
                                    </td>
                                    <td>
                                        <?php if ($_SESSION['role'] == "111100") { ?>
                                            <a href="eliminar_empleado.php?id=<?php echo $row->DOC; ?>"
                                    class="btn btn-danger btn-sm" title="INACTIVAR EMPLEADO"><i class="fa fa-trash" ></i></a>
                                            
                                            <a href="editar_empleado.php?id=<?php echo $row->DOC; ?>"
                                                class="btn btn-info btn-sm"  title="EDITAR EMPLEADO"><i class="fa fa-pencil"></i></a>
                                                
                                                <a href="ver_empleado.php?id=<?php echo $row->DOC; ?>"
                                            class="btn btn-default btn-sm"  title="VER EMPLEADO"><i class="fa fa-eye"></i></a>
                                            <?php
                                        }
                                        ?>
                                        
                                    </td>

                                </tr>
                                <?php
                            }*/
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    $(document).ready(function () {
        $('#myProduct').DataTable();
    });
</script>
<script>
    $.ajax({
        url: "cliente.php",
        method: "GET",
        beforeSend: function () {
            $("#spinner").show();
        },
        success: function (data) {

            // do something with the data
        },
        complete: function () {
            $("#spinner").hide();
        }
    });
</script>
<?php
include_once 'inc/footer_all.php';
?>