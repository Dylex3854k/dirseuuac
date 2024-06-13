<?php include '../conexion/conexion.php';
$id = $con-> real_escape_string(htmlentities($_GET['id']));

$del = $con->query("DELETE FROM convenio WHERE id='$id' ");

if ($del) {
	header('location:../extend/alerta.php?msj=Evento eliminada&c=con&p=in&t=success');
}else{
	header('location:../extend/alerta.php?msj=El evento no pudo ser eliminada&c=con&p=in&t=error');
}

$con->close();
?>