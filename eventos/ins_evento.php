<?php
include '../conexion/conexion.php';
$nick = $_SESSION['nick'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nombre = $con->real_escape_string(htmlentities($_POST['nombre']));
	$fechaInicio = $con->real_escape_string(htmlentities($_POST['fechaInicio']));
	$fechaFin = $con->real_escape_string(htmlentities($_POST['fechaFin']));
	$ubicacion = $con->real_escape_string(htmlentities($_POST['ubicacion']));
	$montoAsig = $con->real_escape_string(htmlentities($_POST['montoAsig']));
	$montoEjec = $con->real_escape_string(htmlentities($_POST['montoEjec']));

	$extension = '';
	$ruta = '../img/';
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombrearchivo = $_FILES['imagen']['name'];
	$info = pathinfo($nombrearchivo);
	if ($archivo !=''){
		$extension = $info['extension'];
		if ($extension == "png" || $extension == "PNG" || $extension == "jpg" || $extension == "JPG") { move_uploaded_file($archivo, '../img/'.$nick.'.'.$extension);
			$ruta = $ruta."".$nick.'.'.$extension;	
		}else {
			header('location:../extend/alerta.php?msj=El formato no es valido&c=habi&p=in&t=error');
			exit;
		}
	}else {
		$ruta = "../img/perfil.png";
	}
	$result = $con->query("SELECT perDIR_id FROM usuario WHERE nick = '$nick'");
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$perDIR_id = $row['perDIR_id'];
		$insEvento = $con->query("INSERT INTO evento VALUES ('','$nombre', '$fechaInicio', '$fechaFin', '$ubicacion', '$ruta')");
		$eventoId = $con->insert_id;

		$insGestion = $con->query("INSERT INTO gestion_reporte VALUES ('','$nombre', '$fechaInicio', '$fechaFin', '$perDIR_id', $eventoId)");
		$gest_rep_id = $con->insert_id;
		$insPresupuesto = $con->query("INSERT INTO presupuesto VALUES ('', '$montoAsig', '$montoEjec', '$gest_rep_id')");
		$insVoluntariado = $con->query("INSERT INTO voluntariado VALUES ('','$nombre', '$fechaInicio', '$fechaFin', '$gest_rep_id')");

	}
	if ($insEvento) {
		header('location:../extend/alerta.php?msj=El evento ha sido registrado&c=eve&p=in&t=success');
	}else {
		header('location:../extend/alerta.php?msj=El evento no pudo ser registrado&c=eve&p=in&t=error');
	}

	$con->close();

}else {
	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=eve&p=in&t=error');
}
?>