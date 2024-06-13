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
$id_laboral = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id_laboral > 0) {
    // Realizar la consulta a la base de datos para obtener la información del seguimiento del egresado
    $sel = $con->query("SELECT *
                        FROM postulante
                        WHERE postulante.id_laboral = $id_laboral");

    if ($sel->num_rows > 0) {
?>

<div class="image-grid">
    <?php while ($f = $sel->fetch_assoc()) { ?>
    <div class="image-slot">
        <div class="image-container">
            <div class="description">
                <div class="info">
                    <h2><?php echo $f['nombre'] . ' ' . $f['apellido']; ?></h2>
                    <p>Email: <?php echo $f['email']; ?></p>
                    <p>Telefono: <?php echo $f['telefono']; ?></p>
                </div>
            </div>
        </div>
        <h3>Información de Postulante</h3>
    </div>
    <?php } ?>
</div>

<?php
    } else {
        echo "<p class='centered-message'>No se encontraron postulantes para este puesto laboral.</p>";
    }
} else {
    echo "<p class='centered-message'>ID de puesto laboral no válido.</p>";
}
?>

</body>
</html>
