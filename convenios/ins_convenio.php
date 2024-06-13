<?php
include '../conexion/conexion.php';
$nick = $_SESSION['nick'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $institucion = $con->real_escape_string(htmlentities($_POST['institucion']));
    $descripcion = $con->real_escape_string(htmlentities($_POST['descripcion']));
    $fechaFirma = $con->real_escape_string(htmlentities($_POST['fechaFirma']));

    $extension = '';
    $ruta = '../img/';
    $archivo = $_FILES['imagen']['tmp_name'];
    $nombrearchivo = $_FILES['imagen']['name'];
    $info = pathinfo($nombrearchivo);

    if ($archivo != '') {
        $extension = $info['extension'];
        if ($extension == "png" || $extension == "PNG" || $extension == "jpg" || $extension == "JPG") {
            move_uploaded_file($archivo, '../img/' . $nick . '.' . $extension);
            $ruta = $ruta . "" . $nick . '.' . $extension;
        } else {
            header('location:../extend/alerta.php?msj=El formato no es valido&c=con&p=in&t=error');
            exit;
        }
    } else {
        $ruta = "../img/perfil.png";
    }
	$insConvenio = $con->query("INSERT INTO convenio VALUES ('', '$institucion', '$descripcion', '$fechaFirma')");

	if ($insConvenio) {
		header('location:../extend/alerta.php?msj=El evento ha sido registrado&c=con&p=in&t=success');
	} else {
		header('location:../extend/alerta.php?msj=El evento no pudo ser registrado&c=con&p=in&t=error');
	}

    $con->close();

} else {
    header('location:../extend/alerta.php?msj=Utiliza el formulario&c=con&p=in&t=error');
}
?>
