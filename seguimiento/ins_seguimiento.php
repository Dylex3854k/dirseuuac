<?php
include '../conexion/conexion.php';
$nick = $_SESSION['nick'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $estadoActual = $con->real_escape_string(htmlentities($_POST['estadoActual']));
    $lugar_trabajo = $con->real_escape_string(htmlentities($_POST['lugar_trabajo']));
    $puesto_desempeñado = $con->real_escape_string(htmlentities($_POST['puesto_desempeñado']));
    $egresado_id = $con->real_escape_string(htmlentities($_POST['egresado_id']));
    $fechaActualizacion = date('Y-m-d'); // Obtiene la fecha actual en el formato Y-m-d

    if (empty($estadoActual) || empty($lugar_trabajo) || empty($puesto_desempeñado) || empty($egresado_id)) {
        header('location:../extend/alerta.php?msj=Uno o más campos están vacíos&c=seg&p=in&t=error');
        exit;
    }

    $result = $con->query("SELECT perDIR_id FROM usuario WHERE nick = '$nick'");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $perDIR_id = $row['perDIR_id'];
        $insSeguimiento = $con->query("INSERT INTO seguimientoegresado (estadoActual, lugar_trabajo, puesto_desempeñado, fechaActualizacion, perDIR_id, egresado_id) VALUES ('$estadoActual', '$lugar_trabajo', '$puesto_desempeñado', '$fechaActualizacion', '$perDIR_id', '$egresado_id')");
    }

    if (isset($insSeguimiento) && $insSeguimiento) {
        header('location:../extend/alerta.php?msj=Registro exitoso&c=seg&p=in&t=success');
    } else {
        header('location:../extend/alerta.php?msj=El registro de seguimiento no pudo ser completado&c=seg&p=in&t=error');
    }
}
$con->close();
?>
