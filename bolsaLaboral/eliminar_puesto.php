<?php
include '../conexion/conexion.php';
$id = $con->real_escape_string(htmlentities($_GET['id']));

// First, delete from the postulantes table
$delPostulantes = $con->query("DELETE FROM postulante WHERE id_laboral='$id'");

// Then, delete from the puesto_laboral table
$delPuestoLaboral = $con->query("DELETE FROM puesto_laboral WHERE id_laboral='$id'");

if ($delPostulantes && $delPuestoLaboral) {
    header('location:../extend/alerta.php?msj=Puesto laboral eliminado&c=pue&p=in&t=success');
} else {
    header('location:../extend/alerta.php?msj=El puesto laboral no pudo ser eliminado&c=pue&p=in&t=error');
}

$con->close();
?>
