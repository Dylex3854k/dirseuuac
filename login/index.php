<?php include '../conexion/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$user = $con->real_escape_string(htmlentities($_POST['usuario']));
	$pass = $con->real_escape_string(htmlentities($_POST['contra']));
	$candado = ' ';
	$str_u = strpos($user, $candado);
	$str_p = strpos($pass, $candado);
	if (is_int($str_u)) {
		$user = '';
	}
	else {
		$usuario = $user;
	}
	if (is_int($str_p)) {
		$pass = '';
	}
	else {
		$pass2 = sha1($pass);
	}
	if ($user == null && $pass == null) {
		header('location:../extend/alerta.php?msj=El Formato no es Correcto&c=salir&p=salir&t=error');
	}
	else {
		$sel = $con ->query("SELECT nick, nombre, pass,correo,nivel FROM usuario WHERE nick = '$usuario' AND pass = '$pass2' ");
		$row = mysqli_num_rows($sel);
		if ($row == 1) {
			if ($var = $sel->fetch_assoc()) {
				$nick = $var['nick'];
				$contra = $var['pass'];
				$nivel = $var['nivel'];
				$correo = $var['correo'];
				$foto = $var['foto'];
				$nombre = $var['nombre'];
			}
			if ($nick == $usuario && $contra == $pass2 && $nivel == 'ADMINISTRADOR') {
				$_SESSION['nick'] = $nick;
				$_SESSION['nombre'] = $nombre;
				$_SESSION['nivel'] = $nivel;
				$_SESSION['correo'] = $correo;
				$_SESSION['foto'] = $foto;
				header('location:../extend/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
			}
			elseif ($nick == $usuario && $contra == $pass2 && $nivel == 'PERSONAL') {
				$_SESSION['nick'] = $nick;
				$_SESSION['nombre'] = $nombre;
				$_SESSION['nivel'] = $nivel;
				$_SESSION['correo'] = $correo;
				$_SESSION['foto'] = $foto;
				header('location:../extend/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
			}
			elseif ($nick == $usuario && $contra == $pass2 && $nivel == 'COORDINADOR') {
				$_SESSION['nick'] = $nick;
				$_SESSION['nombre'] = $nombre;
				$_SESSION['nivel'] = $nivel;
				$_SESSION['correo'] = $correo;
				$_SESSION['foto'] = $foto;
				header('location:../extend/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
			}
			elseif ($nick == $usuario && $contra == $pass2 && $nivel == 'REGULAR') {
				$_SESSION['nick'] = $nick;
				$_SESSION['nombre'] = $nombre;
				$_SESSION['nivel'] = $nivel;
				$_SESSION['correo'] = $correo;
				$_SESSION['foto'] = $foto;
				header('location:../extend/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
			}
			elseif ($nick == $usuario && $contra == $pass2 && $nivel == 'EGRESADO') {
				$_SESSION['nick'] = $nick;
				$_SESSION['nombre'] = $nombre;
				$_SESSION['nivel'] = $nivel;
				$_SESSION['correo'] = $correo;
				$_SESSION['foto'] = $foto;
				header('location:../extend/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
			}
			else {
				header('location:../extend/alerta.php?msj=No tiene Permiso&c=salir&p=salir&t=error');
			}
		}
		else {
			header('location:../extend/alerta.php?msj=Usuario o Contrasenia Incorrectos&c=salir&p=salir&t=error');
		}
	}

}
else {
	header('location:../extend/alerta.php?msj=Utilizar el Formulario&c=salir&p=salir&t=error');
}
?>