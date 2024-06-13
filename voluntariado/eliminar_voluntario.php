<?php
include '../conexion/conexion.php';

$id = $con->real_escape_string(htmlentities($_GET['id']));

// Eliminar el voluntario
$delVoluntario = $con->query("DELETE FROM voluntario WHERE id='$id'");

if ($delVoluntario) {
    header('location:../extend/alerta.php?msj=Voluntario eliminado&c=vol&p=in&t=success');
} else {
    header('location:../extend/alerta.php?msj=El voluntario no pudo ser eliminado&c=vol&p=in&t=error');
}

$con->close();
?>
