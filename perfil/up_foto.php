<?php include '../conexion/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nick = $_SESSION['nick'];
	$foto = $_SESSION['foto'];
	$extension = '';
	$ruta = 'foto_perfil';
	$archivo = $_FILES['foto']['tmp_name'];
	$nombrearchivo = $_FILES['foto']['name'];
	$info = pathinfo($nombrearchivo);
	if ($archivo != '') {
		$extension = $info['extension'];
		if ($extension == "png" || $extension == "jpg" || $extension == "JPG" || $extension == "PNG") {
			unlink('../usuarios/'.$foto);
			move_uploaded_file($archivo, '../usuarios/foto_perfil/'.$nick.'.'.$extension);
			$ruta = $ruta."/".$nick.'.'.$extension;
			$up = $con->query("UPDATE usuario SET foto = '$ruta' WHERE nick = '$nick' ");
			if ($up) {
				$_SESSION['foto'] = $ruta;
				header('location:../extend/alerta.php?msj=Foto de Perfil Actualizada&c=pe&p=in&t=success');
			}
			else {
				header('location:../extend/alerta.php?msj=La Foto de Perfil no pudo ser Actualizada&c=pe&p=in&t=error');
			}

		}
		else {
			header('location:../extend/alerta.php?msj=El Formato no es valido&c=us&p=in&t=error');
			exit;
		}
	}
	else {
		header('location:../extend/alerta.php?msj=No se detecto ninguna Foto para Actualizar&c=pe&p=in&t=error');
	}
	$con->close();
}
else {
	header('location:../extend/alerta.php?msj=Utiliza el Formulario&c=pe&p=in&t=error');
}
?>