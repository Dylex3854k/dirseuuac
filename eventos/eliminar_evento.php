<?php
include '../conexion/conexion.php';
$id = $con->real_escape_string(htmlentities($_GET['id']));

// First, delete from the presupuesto table
$delPresupuesto = $con->query("DELETE FROM presupuesto WHERE gest_rep_id IN (SELECT gest_rep_id FROM gestion_reporte WHERE evento_id='$id')");

// Then, delete from the voluntariado table
$delVoluntariado = $con->query("DELETE FROM voluntariado WHERE gest_rep_id IN (SELECT gest_rep_id FROM gestion_reporte WHERE evento_id='$id')");

// Then, delete from the gestion_reporte table
$delGestionReporte = $con->query("DELETE FROM gestion_reporte WHERE evento_id='$id'");

// Finally, delete from the evento table
$delEvento = $con->query("DELETE FROM evento WHERE even_id='$id'");

if ($delPresupuesto && $delVoluntariado && $delGestionReporte && $delEvento) {
    header('location:../extend/alerta.php?msj=Evento eliminado&c=eve&p=in&t=success');
} else {
    header('location:../extend/alerta.php?msj=El evento no pudo ser eliminado&c=eve&p=in&t=error');
}

$con->close();
?>
