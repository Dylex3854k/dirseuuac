<!--llama a la cabecera-->  
<?php include "../extend/header.php";
?>
<html>
<body>
<head>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
</head>

<!--pagina principal-->  
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span style='font-size:30px; font-weight:bold; ' class="card-title">GESTIONAR BOLSA LABORAL</span>
        <form class="form" action="ins_puestoLaboral.php" method="post" enctype="multipart/form-data" autocomplete="off">
          
        <div class="input-field">
            <input type="text" name="nombrePuesto" required id="nombrePuesto" onblur="may(this.value, this.id)" placeholder="Nombre del Puesto Laboral">
            <label for="nombrePuesto">Nombre del Puesto Laboral:</label>
        </div>

        <div class="input-field">
            <input type="text" name="descripcionPuesto" required id="descripcionPuesto" onblur="may(this.value, this.id)" placeholder="Descripción del puesto">
            <label for="descripcionPuesto">Descripción del puesto:</label>
        </div>

        <div class="input-field">
            <input type="text" name="requisitos" required id="requisitos" onblur="may(this.value, this.id)" placeholder="Requisitos del puesto">
            <label for="requisitos">Requisitos del puesto:</label>
        </div>

        <div class="input-field">
            <input type="text" name="descripcionEmpresa" required id="descripcionEmpresa" onblur="may(this.value, this.id)" placeholder="Descripción de la Empresa">
            <label for="descripcionEmpresa">Descripción de la Empresa:</label>
        </div>
  
          <div class="file-field input-field">
              <div class="btn" style="background-color: #003b6f;">
                  <i class="material-icons left">image</i> <!-- Icono de imagen -->
                  <span>Inserte la imagen</span>
                  <input type="file" name="imagen" id="fileInput">
              </div>
              <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" id="fileName" placeholder="Sin archivos seleccionados" readonly style="color: white;">
              </div>
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

<div class="row1">
  <div class="col s11">
    <nav class="white1" style="margin: 0 120px;">
      <div class="nav-wrapper1">
        <div class="input-field1">
        <i class="material-icons prefix">search</i>
          <input type="search" id="buscar" placeholder="Buscar..." autocomplete="off" style="background-color: #00cdff; color: white;">
        </div>
      </div>
    </nav>
  </div>
</div>


<?php
$sel = $con->query("SELECT * FROM puesto_laboral;");
$row = mysqli_num_rows($sel);
?>
<div class="row2">
  <div class="col s13">
    <div class="card2">
      <div class="card-content2">
        <span class="card-title">Eventos (<?php echo $row ?>) </span>
        <table>
          <thead>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Requisitos</th>
            <th>Descripción de la Empresa</th> 
            <th>Ver</th>
            <th>Eliminar</th>
          </thead>
          <?php while($f = $sel->fetch_assoc()){ ?>
            <tr>
                <td><?php echo $f['nombre_puesto'] ?></td>
                <td><?php echo $f['descripcion_puesto'] ?></td>
                <td><?php echo $f['requisitos'] ?></td>
                <td><?php echo $f['descripcion_Empresa'] ?></td>
                <td>
                    <a href="ver_postulantes.php?id=<?php echo $f['id_laboral'] ?>" class="btn-floating green"><i class="material-icons">visibility</i></a>
                </td>
                <td>
                <a href="#" class="btn-floating red" onclick="swal({ title: 'Esta seguro que desea eliminar al evento?', text: 'Al eliminarlo no podra recuperarlo!', type: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, eliminarlo!' }).then(function () {  location.href='eliminar_puesto.php?id=<?php echo $f['id_laboral'] ?>'; })"><i class="material-icons">clear</i></a> 
                </td>
            </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>
</div>


<?php include '../extend/scripts.php'; ?>
<script src="../js/validacion.js">
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('fileInput').addEventListener('change', function() {
        if (this.files && this.files.length > 0) {
            // Asignar el nombre del primer archivo seleccionado al input de texto
            document.getElementById('fileName').value = this.files[0].name;
        } else {
            document.getElementById('fileName').value = "Sin archivos seleccionados";
        }
    });
});

</script>
</body>
</html>