<!--llama a la cabecera-->  
<?php include "../extend/header.php";
?>
<html>
<body>
<head>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="styles2.css">

</head>

<!--pagina principal-->  
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span style='font-size:30px; font-weight:bold; ' class="card-title">GESTIONAR EVENTOS</span>
        <form class="form" action="ins_evento.php" method="post" enctype="multipart/form-data" autocomplete="off">
          
        <div class="input-field">
    <input type="text" name="nombre" required id="nombre" onblur="may(this.value, this.id)" placeholder="Nombre">
    <label for="nombre">Nombre:</label>
</div>

          <div class="validacion"></div>
        
          <div class="input-field">
            <input type="text" name="ubicacion"  title="Ubicacion" placeholder="Ubicación"  pattern="[A-Z/s ]+" id="ubicacion" required >
            <label for="ubicacion">Ubicacion:</label>
          </div>
          
          <div class="col s6 input-field" style="margin: 50px 450px 40px; display: flex; justify-content: space-between;">
    <input type="date" class="datepicker date-left" name="fechaInicio" id="fechaInicio" required>
    <label for="fechaInicio">Fecha Inicio:</label>
    <input type="date"  class="datepicker date-right" name="fechaFin" id="fechaFin" required>
    <label style="margin: auto 51%" for="fechaFin">FechaFin:</label>
</div>



          <div class="input-field2">
            <input type="number" name="montoAsig" placeholder="Monto Asignado" title="Monto Asignado"  id="montoAsig" >
            <label style="margin: 360px 480px 38px;" for="montoAsig">Monto Asignado</label>
          </div>
          <div class="input-field2">
            <input type="number" name="montoEjec" placeholder="Monto Ejecutado" title="Monto Ejecutado"  id="montoEjec" >
            <label style="margin: 440px 480px 38px;" for="montoEjec">Monto Ejecutado</label>
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
$sel = $con->query("SELECT * FROM evento 
        JOIN gestion_reporte ON evento.even_id = gestion_reporte.evento_id 
        JOIN presupuesto ON gestion_reporte.gest_rep_id = presupuesto.gest_rep_id;");
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
            <th>Ubicacion</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th> 
            <th>Monto Asignado</th>
            <th>Monto Ejecutado</th> 
            <th>Eliminar</th>
          </thead>
          <?php while($f = $sel->fetch_assoc()){ ?>
            <tr>
              <td><?php echo $f['nombre'] ?></td>
              <td><?php echo $f['ubicacion'] ?></td>
              <td><?php echo $f['fechaIni'] ?></td>
              <td><?php echo $f['fechaFin'] ?></td>
              <td><?php echo $f['montoAsignado'] ?></td>
              <td><?php echo $f['montoEjecutado'] ?></td>
              <td>
                <a href="#" class="btn-floating red" onclick="swal({ title: 'Esta seguro que desea eliminar al evento?', text: 'Al eliminarlo no podra recuperarlo!', type: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, eliminarlo!' }).then(function () {  location.href='eliminar_evento.php?id=<?php echo $f['evento_id'] ?>'; })"><i class="material-icons">clear</i></a> 
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