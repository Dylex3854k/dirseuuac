<!-- Llama a la cabecera -->
<?php 
    include "../extend/header.php";
?>

<styles>
<link rel="stylesheet" href="styles.css">
<styles>

<!-- Página principal -->
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span style='font-size:30px; font-weight:bold;' class="card-title">Formulario de Registro</span>
        <form class="form" action="ins_postulante.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <?php
            if (isset($_POST['id_laboral'])) {
                $id_laboral = $_POST['id_laboral'];
                echo '<input type="hidden" name="id_laboral" value="' . $id_laboral . '">';
            } else {
                echo '<input type="hidden" name="id_laboral" value="0">'; // Valor por defecto o manejo de error
            }
            ?>
            <div class="input-field">
              <input type="text" placeholder="Nombre" name="nombre" title="Nombre" id="nombre" style="margin-bottom: 10px;" required>
              <label for="nombre">Nombre:</label>
            </div>
            <div class="input-field" >
              <input type="text" placeholder="Apellido"  name="apellido" title="Apellido" id="apellido" style="margin-bottom: 10px;" required>
              <label for="apellido">Apellido:</label>
            </div>
            <div class="input-field">
              <input type="text" placeholder="DNI" name="dni" title="DNI del usuario" id="dni" required>
              <label for="dni">DNI:</label>
            </div>
            <div class="input-field" >
              <input type="email" placeholder="Correo electrónico" name="email" title="Correo electrónico" id="email" style="margin-bottom: 10px;" required>
              <label for="email">Correo electrónico:</label>
            </div>
            <div class="input-field">
              <input type="text" placeholder="Número de teléfono" name="telefono" title="Número de teléfono" id="telefono" required>
              <label for="telefono">Número de teléfono:</label>
            </div>
            <div class="button-group" style="margin: 0 100px; display: flex;">
          <button type="submit" class="btn custom-button" id="btn_guardar">Guardar</button>
          <button type="reset" class="btn reset-button" id="btn_reset">Reiniciar</button>
      </div>

            </div>
        </form>
      </div>
    </div>
  </div>
</div>
          </div>
<div style="margin: 50px"></div>
<footer>
    <p>© Universidad Andina del Cusco</p>
</footer>

<?php include '../extend/scripts.php'; ?>
<script src="../js/validacion.js"></script>
</body>
</html>
