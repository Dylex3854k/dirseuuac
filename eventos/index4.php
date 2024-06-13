<!-- Llama a la cabecera -->
<?php include "../extend/header.php"; 
    $nick = $_SESSION['nick'];
?>
<head>
<styles>
<link rel="stylesheet" href="styles3.css">
</styles>
</head>

    <?php
// Realizar la consulta a la base de datos para obtener los eventos
    $sel = $con->query("SELECT * FROM evento JOIN gestion_reporte ON evento.even_id = gestion_reporte.evento_id
                        JOIN voluntariado ON gestion_reporte.gest_rep_id = voluntariado.gest_rep_id
                        JOIN voluntario ON voluntario.voluntariado_id = voluntariado.voluntariado_id  WHERE idUsuario IN (SELECT idUsuario FROM usuario WHERE nick = '$nick') " );
?>

<nav class="main-navigation3">
    <ul>
        <h1>EVENTOS INSCRITOS</h1>
    </ul>
</nav>

<div class="image-grid">
    <?php
    while ($f = $sel->fetch_assoc()) {
    ?>
    <div class="image-slot">
        <div class="image-container" onclick="toggleDescription(this)">
            <img src="<?php echo $f['imagen']; ?>" alt="<?php echo $f['nombre']; ?>">
            <div class="description">
                <div class="info">
                    <h2><?php echo $f['nombre']; ?></h2>
                    <p>Día: <?php echo date('l, d \d\e F \d\e Y', strtotime($f['fechaIni'])); ?></p>
                    <p>Hora: <?php echo date('H:i', strtotime($f['fechaIni'])); ?> - <?php echo date('H:i', strtotime($f['fechaFin'])); ?></p>
                    <p>Lugar: <?php echo $f['ubicacion']; ?></p>
                </div>
            </div>
        </div>
        <h3><?php echo $f['nombre']; ?></h3>
    </div>
    <?php
    }
    ?>
</div>


<div style="margin: 100px"></div>

<footer>
    <p>© Universidad Andina del Cusco</p>
</footer>

<script>
    function toggleDescription(element) {
        var description = element.querySelector('.description');
        if (description.style.opacity === '1') {
            description.style.opacity = '0';
            setTimeout(function() {
                description.style.visibility = 'hidden';
            }, 300);
        } else {
            description.style.visibility = 'visible';
            description.style.opacity = '1';
        }
    }
</script>
</body>
</html>
