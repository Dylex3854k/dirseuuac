<?php
include '../conexion/conexion.php';
$nick = $_SESSION['nick'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $con->real_escape_string(htmlentities($_POST['nombrePuesto']));
    $descripcion = $con->real_escape_string(htmlentities($_POST['descripcionPuesto']));
    $requisitos = $con->real_escape_string(htmlentities($_POST['requisitos']));
    $descripcionEmpresa = $con->real_escape_string(htmlentities($_POST['descripcionEmpresa']));
    
	$extension = '';
    $ruta = '../img/';
    $archivo = $_FILES['imagen']['tmp_name'];
    $nombrearchivo = $_FILES['imagen']['name'];
    $info = pathinfo($nombrearchivo);
    if ($archivo !=''){
        $extension = strtolower($info['extension']); // Convertir a minúsculas para simplificar la comparación
        if (in_array($extension, ['png', 'jpg', 'jpeg'])) { 
            move_uploaded_file($archivo, '../img/'.$nick.'.'.$extension);
            $ruta = $ruta.$nick.'.'.$extension;    
        } else {
            header('location:../extend/alerta.php?msj=El formato no es válido&c=pue&p=in&t=error');
            exit;
        }
    } else {
        $ruta = "../img/default.png";
    }

    $result = $con->query("SELECT perDIR_id FROM usuario WHERE nick = '$nick'");
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$perDIR_id = $row['perDIR_id'];
    	$insPuestoLaboral = $con->query("INSERT INTO puesto_laboral (nombre_puesto,	descripcion_puesto,	requisitos,	descripcion_Empresa, imagen, perDIR_id) VALUES ('$nombre', '$descripcion', '$requisitos', '$descripcionEmpresa', '$ruta', $perDIR_id)");
	}
    if ($insPuestoLaboral) {
        header('location:../extend/alerta.php?msj=El puesto laboral ha sido registrado&c=pue&p=in&t=success');
    } else {
        header('location:../extend/alerta.php?msj=El puesto laboral no pudo ser registrado&c=pue&p=in&t=error');
    }

    $con->close();

} else {
    header('location:../extend/alerta.php?msj=Utiliza el formulario&c=pue&p=in&t=error');
}
?>
