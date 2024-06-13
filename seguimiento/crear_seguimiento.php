<?php
include '../extend/header.php';
$id = $con->real_escape_string(htmlentities($_GET['id']));
$nombre = $con->real_escape_string(htmlentities($_GET['nombre']));
?>

<styles>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
</styles>


<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
      <span class="card-title">Ingreso de la reserva de: <?php echo $nombre ?></span>
      <span class="card-title">DATOS GENERALES DEL SEGUIMIENTO</span>

        <form class="form" action="ins_seguimiento.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <input type="hidden" name="egresado_id" value="<?php echo $id; ?>">

            <div class="input-field" >
                <input type="text" placeholder="Estado Actual"  name="estadoActual" title="Estado Actual" id="estadoActual" style="margin-bottom: 10px;" required>
                <label for="estadoActual">Estado Actual:</label>
            </div>

            <div class="input-field" >
                <input type="text" placeholder="Lugar de Trabajo" name="lugar_trabajo" title="Lugar de Trabajo" id="lugar_trabajo" style="margin-bottom: 10px;" required>
                <label for="lugar_trabajo">Lugar de Trabajo:</label>
            </div>

            <div class="input-field" >
                <input type="text" placeholder="Puesto Desempeñado" name="puesto_desempeñado" title="Puesto Desempeñado" id="puesto_desempeñado" style="margin-bottom: 10px;" required>
                <label for="puesto_desempeñado">Puesto Desempeñado:</label>
            </div>

            <div class="button-group" style="margin: 0 100px; display: flex;">
          <button type="submit" class="btn custom-button" id="btn_guardar">Guardar</button>
          <button type="reset" class="btn reset-button" id="btn_reset">Reiniciar</button>
      </div>

            <div style='margin-left:20px; margin-bottom: 20px;'>
                <a style='margin-left:20px; margin-bottom: 20px;'></a>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>



<?php include '../extend/scripts.php'; ?>
<script src="../js/estados.js"></script>
</body>
</html>
