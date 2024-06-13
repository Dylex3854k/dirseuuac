<?php
include '../conexion/conexion.php';

$id = $con->real_escape_string(htmlentities($_GET['id']));

$del_egresado = $con->query("DELETE FROM egresado WHERE egresado_id='$id'");

if ($del_egresado) {
    header('location:../extend/alerta.php?msj=Egresado eliminado&c=seg&p=in&t=success');
} else {
    header('location:../extend/alerta.php?msj=El egresado no pudo ser eliminado&c=seg&p=in&t=error');
}

$con->close();
?>
