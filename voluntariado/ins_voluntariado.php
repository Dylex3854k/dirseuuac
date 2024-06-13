<?php
include '../conexion/conexion.php';
$nick = $_SESSION['nick'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $con->real_escape_string(htmlentities($_POST['nombre_completo']));
    $dni = $con->real_escape_string(htmlentities($_POST['dni']));
    $sexo = $con->real_escape_string(htmlentities($_POST['sexo']));
    $codigoE = $con->real_escape_string(htmlentities($_POST['codigo_estudiante']));
    $correo = $con->real_escape_string(htmlentities($_POST['correo']));
    $numero_celular = $con->real_escape_string(htmlentities($_POST['numero_celular']));
    $estado_actual = $con->real_escape_string(htmlentities($_POST['estado_actual']));
    $facultad = $con->real_escape_string(htmlentities($_POST['facultad']));
    $escuela = $con->real_escape_string(htmlentities($_POST['escuela']));
    $voluntariado_id = $con->real_escape_string(htmlentities($_POST['voluntariado_id']));

    if (empty($nombre) || empty($dni) || empty($sexo) || empty($codigoE) || empty($numero_celular) || empty($estado_actual) || empty($voluntariado_id)) {
        $campo_vacio = '';

        if (empty($nombre)) {
            $campo_vacio = "Nombre Completo";
        } elseif (empty($dni)) {
            $campo_vacio = "DNI";
        } elseif (empty($sexo)) {
            $campo_vacio = "Sexo";
        } elseif (empty($codigoE)) {
            $campo_vacio = "Código de Estudiante";
        } elseif (empty($numero_celular)) {
            $campo_vacio = "Número de Celular";
        } elseif (empty($estado_actual)) {
            $campo_vacio = "Estado Actual";
        } elseif (empty($voluntariado_id)) {
            $campo_vacio = "Voluntariado ID";
        }

        header("location:../extend/alerta.php?msj=El campo $campo_vacio está vacío&c=eve&p=in2&t=error");
        exit;
    }

    if (!ctype_alpha(str_replace(' ', '', $nombre))) {
        header('location:../extend/alerta.php?msj=El nombre no contiene solo letras&c=eve&p=in2&t=error');
        exit;
    }

    if (!in_array($sexo, ['MASCULINO', 'FEMENINO'])) {
        header('location:../extend/alerta.php?msj=El sexo no es valido&c=eve&p=in2&t=error');
        exit;
    }

    if (!empty($correo) && !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        header('location:../extend/alerta.php?msj=El email no es valido&c=eve&p=in2&t=error');
        exit;
    }

    $result = $con->query("SELECT idUsuario FROM usuario WHERE nick = '$nick'");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $idUsuario = $row['idUsuario'];

        $ins = $con->query("INSERT INTO voluntario (nombre_completo, dni, sexo, codigo_estudiante, correo_institucional, numero_celular, estado_actual, facultad, escuela_profesional, voluntariado_id, idUsuario) VALUES ('$nombre', '$dni', '$sexo', '$codigoE', '$correo', '$numero_celular', '$estado_actual', '$facultad', '$escuela', '$voluntariado_id', '$idUsuario')");

        if ($ins) {
            header('location:../extend/alerta.php?msj=El usuario ha sido registrado&c=eve&p=in2&t=success');
        } else {
            header('location:../extend/alerta.php?msj=El usuario no pudo ser registrado&c=eve&p=in2&t=error');
        }
    } else {
        header('location:../extend/alerta.php?msj=Usuario no encontrado&c=eve&p=in2&t=error');
    }

    $con->close();
} else {
    header('location:../extend/alerta.php?msj=Utiliza el formulario&c=eve&p=in2&t=error');
}
?>
