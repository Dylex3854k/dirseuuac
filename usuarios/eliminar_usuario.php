<?php include '../conexion/conexion.php';
$id = $con-> real_escape_string(htmlentities($_GET['id']));

$result = $con->query("SELECT perDIR_id FROM usuario WHERE idUsuario = '$id'");
$perDIR_id = $del['perDIR_id'];

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $perDIR_id = $row['perDIR_id'];

    // Eliminar el usuario
    $delUsuario = $con->query("DELETE FROM usuario WHERE idUsuario='$id'");
}

if ($delUsuario) {
	header('location:../extend/alerta.php?msj=Usuario eliminado&c=us&p=in&t=success');
}else{
	header('location:../extend/alerta.php?msj=El usuario no pudo ser eliminado&c=us&p=in&t=error');
}

$con->close();
?>

