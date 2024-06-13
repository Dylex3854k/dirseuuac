<?php
include "../conexion/conexion.php";
    if (!isset($_SESSION['nick'])) {
        header('location:../');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dirección General de Responsabilidad Social Universitaria</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <header>
        <img src="../img/dir-logo1.png" alt="Logo 2" class="header-logo2">
        <h1>Dirección de Responsabilidad Social y Extensión Universitaria</h1>
        <a href="../perfil/perfil.php"><img src="../img/perfil1.png" alt="Logo 2" class="perfil-logo"></a>
        
    </header>
<?php
    if ($_SESSION['nivel'] == 'ADMINISTRADOR') {
        include 'menu_admin.php';
    }
    elseif  ($_SESSION['nivel'] == 'PERSONAL'){
        include 'menu_personal.php';
    }
    elseif  ($_SESSION['nivel'] == 'COORDINADOR'){
        include 'menu_coordinador.php';
    }
    elseif  ($_SESSION['nivel'] == 'REGULAR'){
        include 'menu_regular.php';
    }
    elseif  ($_SESSION['nivel'] == 'EGRESADO'){
        include 'menu_egresado.php';
    }
?>
