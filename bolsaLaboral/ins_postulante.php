<?php
include '../conexion/conexion.php';
$nick = $_SESSION['nick'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $con->real_escape_string(htmlentities($_POST['nombre']));
    $apellido = $con->real_escape_string(htmlentities($_POST['apellido']));
    $dni = $con->real_escape_string(htmlentities($_POST['dni']));
    $email = $con->real_escape_string(htmlentities($_POST['email']));
    $telefono = $con->real_escape_string(htmlentities($_POST['telefono']));
    $id_laboral = $con->real_escape_string(htmlentities($_POST['id_laboral']));

    if (empty($nombre) || empty($apellido) || empty($dni) || empty($email) || empty($telefono)) {
        $campo_vacio = '';

        if (empty($nombre)) {
            $campo_vacio = "Nombre";
        } elseif (empty($apellido)) {
            $campo_vacio = "Apellido";
        } elseif (empty($dni)) {
            $campo_vacio = "DNI";
        } elseif (empty($email)) {
            $campo_vacio = "Email";
        } elseif (empty($telefono)) {
            $campo_vacio = "Teléfono";
        }

        header("location:../extend/alerta.php?msj=El campo $campo_vacio está vacío&c=eve&p=in2&t=error");
        exit;
    }

    if (!ctype_alpha(str_replace(' ', '', $nombre)) || !ctype_alpha(str_replace(' ', '', $apellido))) {
        header('location:../extend/alerta.php?msj=El nombre y apellido deben contener solo letras&c=eve&p=in2&t=error');
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('location:../extend/alerta.php?msj=El email no es válido&c=eve&p=in2&t=error');
        exit;
    }

    $result = $con->query("SELECT idUsuario FROM usuario WHERE nick = '$nick'");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $idUsuario = $row['idUsuario'];

        $ins = $con->query("INSERT INTO postulante (nombre, apellido, dni, email, telefono, id_laboral, idUsuario) VALUES ('$nombre', '$apellido', '$dni', '$email', '$telefono', '$id_laboral', '$idUsuario')");

        if ($ins) {
            header('location:../extend/alerta.php?msj=El usuario ha sido registrado&c=pue&p=in2&t=success');
        } else {
            header('location:../extend/alerta.php?msj=El usuario no pudo ser registrado&c=pue&p=in2&t=error');
        }
    } else {
        header('location:../extend/alerta.php?msj=Usuario no encontrado&c=pue&p=in2&t=error');
    }

    $con->close();
} else {
    header('location:../extend/alerta.php?msj=Utiliza el formulario&c=pue&p=in2&t=error');
}
?>
