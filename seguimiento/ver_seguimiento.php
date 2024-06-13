<!-- Llama a la cabecera -->
<?php include "../extend/header.php"; ?>

<html>
<styles>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="styles1.css">
<style>
    /* Estilo adicional para centrar el h3 */
    .image-slot h3 {
        text-align: center;
        margin-top: 10px;
        color: #003b6f;
    }

    /* Estilo para centrar el mensaje */
    .centered-message {
        text-align: center;
        font-size: 18px;
        color: #003b6f;
        margin-top: 20px;
    }
</style>
</styles>
<body>

<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span style='font-size:30px; font-weight:bold;' class="card-title">INFORMACIÓN</span>
      </div>
    </div>
  </div>
</div>

<?php
// Obtener el ID del egresado desde la URL
$egresado_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($egresado_id > 0) {
    // Realizar la consulta a la base de datos para obtener la información del seguimiento del egresado
    $sel = $con->query("SELECT *
                        FROM egresado
                        JOIN seguimientoegresado ON seguimientoegresado.egresado_id = egresado.egresado_id
                        JOIN personaldir ON seguimientoegresado.perDIR_id = personaldir.perDIR_id
                        WHERE egresado.egresado_id = $egresado_id");

    if ($sel->num_rows > 0) {
?>

<div class="image-grid">
    <?php while ($f = $sel->fetch_assoc()) { ?>
    <div class="image-slot">
        <div class="image-container">
            <div class="description">
                <div class="info">
                    <h2><?php echo $f['nombre'] . ' ' . $f['apellidos']; ?></h2>
                    <p>Carrera: <?php echo $f['carrera']; ?></p>
                    <p>Estado Actual: <?php echo $f['estadoActual']; ?></p>
                    <p>Lugar de Trabajo: <?php echo $f['lugar_trabajo']; ?></p>
                    <p>Puesto Desempeñado: <?php echo $f['puesto_desempeñado']; ?></p>
                    <p>Fecha del Seguimiento: <?php echo $f['fechaActualizacion']; ?></p>
                    <p>Seguimiento por: <?php echo $f['nombreCom']; ?></p>
                </div>
            </div>
        </div>
        <h3>Información de Estudiante Egresado</h3>
    </div>
    <?php } ?>
</div>

<?php
    } else {
        echo "<p class='centered-message'>No se encontraron seguimientos para este egresado.</p>";
    }
} else {
    echo "<p class='centered-message'>ID de egresado no válido.</p>";
}
?>

</body>
</html>
