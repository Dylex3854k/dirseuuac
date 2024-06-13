<?php
include '../conexion/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <title>DIRSEU</title>
</head>
<body>
<?php
$mensaje = htmlentities($_GET['msj']);
$c = htmlentities($_GET['c']);
$p = htmlentities($_GET['p']);
$t = htmlentities($_GET['t']);

switch ($c) {
	case 'us':
		$carpeta = '../usuarios/';
		break;
	
	case 'home':
		$carpeta = '../inicio/';
		break;
	case 'salir':
		$carpeta = '../';
		break;
	case 'pe':
		$carpeta = '../perfil/';
		break;
	case 'eve':
		$carpeta = '../eventos/';
		break;
	case 'seg':
		$carpeta = '../seguimiento/';
		break;
	case 'con':
		$carpeta = '../convenios/';
		break;
	case 'vol':
		$carpeta = '../voluntariado/';
		break;
	case 'pue':
		$carpeta = '../bolsaLaboral/';
		break;
}

switch ($p) {
	case 'in':
		$pagina = 'index.php';
		break;
	
	case 'home':
		$pagina = 'index.php';
		break;
	case 'salir':
		$pagina = '';
		break;
	case 'perfil':
		$pagina = 'perfil.php';
		break;
	case 'img':
		$pagina = 'imagenes.php';
		break;
	case 'can':
		$pagina = 'cancelados.php';
		break;
	case 'sl':
		$pagina = 'slider.php';
		break;
	case 'in2':
		$pagina = 'index2.php';
		break;
	}

if (isset($_GET['id'])) {
	$id = htmlentities($_GET['id']);
	$dir = $carpeta.$pagina.'?id='.$id;
}else 	{	
	$dir = $carpeta.$pagina;
}

if ($t == "error") 	{
	$titulo = "Oppss..";
}else 		{
	$titulo = "Bienvenido!";
}
?>


<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="
sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
swal.fire({
title: '<?php echo $titulo ?>',
text: "<?php echo $mensaje ?>",
type: '<?php echo $t ?>',
confirmButtonColor: '#00cdff',
confirmButtonText: 'Ingresar'
}).then(function () {
	location.href='<?php echo $dir ?>';
});

$(document).click(function() {
	location.href='<?php echo $dir ?>';
});

$(document).click(function(e) {
	if (e.which == 27)	{ 
	location.href='<?php echo $dir ?>';
	}
});
</script>
</body>
</html>