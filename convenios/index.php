<!-- Llama a la cabecera -->
<?php include "../extend/header.php"; ?>
<html>
<body>
<styles>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
</styles>
<!-- Página principal -->
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span style='font-size:30px; font-weight:bold;' class="card-title">GESTIONAR CONVENIOS</span>
        <form class="form" action="ins_convenio.php" method="post" enctype="multipart/form-data" autocomplete="off">
          <div class="input-field">
            <input type="text" name="institucion" placeholder="Institución" required autofocus title="DEBE DE CONTENER ENTRE 8 Y 15 CARACTERES, SOLO LETRAS" id="institucion" onblur="may(this.value, this.id)">
            <label for="institucion">Institución:</label>
          </div>
          <div class="validacion"></div>
          <div class="input-field">
            <input type="text" name="descripcion" placeholder="Descripción" title="Descripción" id="descripcion" required>
            <label for="descripcion">Descripción:</label>
          </div>
          
          <div class="col s6 input-field" style="margin: 50px 450px; ">  
            <input type="date" class="datepicker" name="fechaFirma" id="fechaFirma" required>
            <label for="fechaFirma">Fecha de Firma</label>
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
$sel = $con->query("SELECT * FROM convenio");
$row = mysqli_num_rows($sel);
?>
<div class="row2">
  <div class="col s13">
    <div class="card2">
      <div class="card-content2">
        <span class="card-title">Convenios (<?php echo $row ?>)</span>
        <table>
          <thead>
            <th>Institución</th>
            <th>Descripción</th>
            <th>Fecha de Firma</th>
            <th>Eliminar</th>
          </thead>
          <?php while($f = $sel->fetch_assoc()){ ?>
            <tr>
              <td><?php echo $f['institucion'] ?></td>
              <td><?php echo $f['descripcion'] ?></td>
              <td><?php echo $f['fechaFirma'] ?></td>
              <td>
                <a href="#" class="btn-floating red" onclick="swal({ title: 'Esta seguro que desea eliminar el convenio?', text: 'Al eliminarlo no podra recuperarlo!', type: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, eliminarlo!' }).then(function () {  location.href='eliminar_convenio.php?id=<?php echo $f['id'] ?>'; })"><i class="material-icons">clear</i></a>
              </td>
            </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include '../extend/scripts.php'; ?>
<script src="../js/validacion.js"></script>
</body>
</html>
