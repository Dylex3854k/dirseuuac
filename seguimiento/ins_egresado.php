<?php
include '../conexion/conexion.php';
$nick = $_SESSION['nick'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $con->real_escape_string(htmlentities($_POST['nombre']));
    $apellidos = $con->real_escape_string(htmlentities($_POST['apellidos']));
    $añoGraduacion = $con->real_escape_string(htmlentities($_POST['añoGraduacion']));
    $facultad = $con->real_escape_string(htmlentities($_POST['facultad']));
    $carrera = $con->real_escape_string(htmlentities($_POST['carrera']));

    if (empty($nombre) || empty($apellidos) || empty($añoGraduacion) || empty($facultad) || empty($carrera)) {
        header('location:../extend/alerta.php?msj=Uno o más campos están vacíos&c=seg&p=in&t=error');
        exit;
    }

    if (!ctype_alpha(str_replace(' ', '', $nombre))) {
        header('location:../extend/alerta.php?msj=El nombre no contiene solo letras&c=seg&p=in&t=error');
        exit;
    }

    if (!ctype_alpha(str_replace(' ', '', $apellidos))) {
        header('location:../extend/alerta.php?msj=Los apellidos no contienen solo letras&c=seg&p=in&t=error');
        exit;
    }

    // Inserción en la tabla egresado
    $insEgresado = $con->query("INSERT INTO egresado (nombre, apellidos, añoGraduacion, facultad, carrera) VALUES ( '$nombre', '$apellidos', '$añoGraduacion', '$facultad', '$carrera')");

    if ($insEgresado) {
        header('location:../extend/alerta.php?msj=Registro exitoso&c=seg&p=in&t=success');
    } else {
        header('location:../extend/alerta.php?msj=El registro no pudo ser completado&c=seg&p=in&t=error');
    }
}
$con->close();
?>
