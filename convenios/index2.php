<!-- Llama a la cabecera -->
<?php include "../extend/header.php"; ?>

<styles>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="styles2.css">
</styles>

<html>
<body>

<?php
// Realizar la consulta a la base de datos para obtener los convenios
$sel = $con->query("SELECT * FROM convenio");
?>

<div class="convenios-list">
    <?php
    // Iterar sobre los resultados de la consulta
    while ($f = $sel->fetch_assoc()) {
    ?>
    <div class="convenio-item">
        <h2><?php echo $f['institucion']; ?></h2>
        <div class="info">
            <p>Descripción: <?php echo $f['descripcion']; ?></p>
            <p>Fecha de Firma: <?php echo date('l, d \d\e F \d\e Y', strtotime($f['fechaFirma'])); ?></p>
        </div>
    </div>
    <?php
    }
    ?>
</div>


<footer>
    <p>© Universidad Andina del Cusco</p>
</footer>

</body>
</html>
