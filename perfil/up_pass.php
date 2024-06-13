<?php include '../conexion/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nick = $_SESSION['nick'];
	$pass = $con->real_escape_string(htmlentities($_POST['pass1']));
	$pass = sha1($pass);
	$up = $con->query("UPDATE usuario SET pass = '$pass' WHERE nick = '$nick' ");
	if ($up) {
		header('location:../extend/alerta.php?msj=Password Actualizado&c=pe&p=perfil&t=success');
	}
	else {
		header('location:../extend/alerta.php?msj=El Password no pudo ser Actualizado&c=pe&p=perfil&t=error');
	}
	$con->close();
}
else {
	header('location:../extend/alerta.php?msj=Utiliza el Formulario&c=CARPETA&p=PAGINA&t=TIPO');
}
?>