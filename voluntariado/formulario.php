<!--llama a la cabecera-->  
<?php 
    include "../extend/header.php";
?>

<head>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="styles2.css">
</head>

<!--pagina principal-->  
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span style='font-size:30px; font-weight:bold;' class="card-title">ÚNETE AL VOLUNTARIADO</span>
        <form class="form" action="ins_voluntariado.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <?php
            if (isset($_POST['voluntariado_id'])) {
                $voluntariado_id = $_POST['voluntariado_id'];
                echo '<input type="hidden" name="voluntariado_id" value="' . $voluntariado_id . '">';
            } else {
                echo '<input type="hidden" name="voluntariado_id" value="0">'; // Default value or handle error
            }
            ?>
            <div class="input-field" >
              <input type="text" name="nombre_completo" placeholder="Nombre Completo" title="Nombre completo" id="nombre_completo" style="margin-bottom: 10px;" required>
              <label for="nombre_completo">Nombre Completo:</label>
            </div>
            <div class="input-field">
              <input type="text" name="dni" placeholder="DNI" title="DNI del usuario" id="dni" required>
              <label for="dni">DNI:</label>
            </div>
          
          
            <div class="col s6">
                <div>
                    <label for="sexo">Sexo:</label>
                    <select class='browser-default' name="sexo" id="sexo" required>
                        <option value="MASCULINO">MASCULINO</option>
                        <option value="FEMENINO">FEMENINO</option>
                    </select>
                </div>
                <div>
                    <label for="estado_actual">Condición:</label>
                    <select class='browser-default' name="estado_actual" id="estado_actual" required>
                        <option value="EGRESADO">EGRESADO</option>
                        <option value="REGULAR">ESTUDIANTE REGULAR</option>
                    </select>
                </div>
            </div>





            <div class="input-field">
              <input type="text" name="codigo_estudiante" placeholder="Código de estudiante" title="Código del usuario" id="codigo_estudiante" onblur="may(this.value, this.id)" required>
              <label for="codigo_estudiante">Código de estudiante:</label>
            </div>
            <div class="input-field" >
              <input type="email" name="correo" placeholder="Correo institucional" title="Correo institucional" id="correo" style="margin-bottom: 10px;">
              <label for="correo">Correo institucional:</label>
            </div>
            <div class="input-field">
              <input type="text" name="numero_celular" placeholder="Número de celular" title="Número de celular" id="numero_celular" onblur="may(this.value, this.id)" required>
              <label for="numero_celular">Número de celular:</label>
            </div>
            
            <div class="input-field" >
              <input type="text" name="facultad" placeholder="Facultad" title="Facultad" id="facultad" style="margin-bottom: 10px;">
              <label for="facultad">Facultad:</label>
            </div>
            <div class="input-field" >
              <input type="text" name="escuela" placeholder="Escuela profesional" title="Escuela profesional" id="escuela" style="margin-bottom: 10px;">
              <label for="escuela">Escuela profesional:</label>
            </div>


           <div class="button-group" style="margin: 0 100px; display: flex;">
          <button type="submit" class="btn custom-button" id="btn_guardar">Guardar</button>
          <button type="reset" class="btn reset-button" id="btn_reset">Reiniciar</button>
      </div>


        </form>
      </div>
    </div>
  </div>
</div>

<?php include '../extend/scripts.php'; ?>
<script src="../js/validacion.js"></script>
</body>
</html>
