<?php include '../extend/header.php'; ?>

<styles>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
</styles>


<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span style='font-size:30px; font-weight:bold;' class="card-title">CREAR EGRESADO</span>
        <form class="form" action="ins_egresado.php" method="post" enctype="multipart/form-data" autocomplete="off">

            <div class="input-field" >
                <input type="text" name="nombre" placeholder="Nombre" title="Nombre" id="nombre" style="margin-bottom: 10px;" required>
                <label for="nombre">Nombre:</label>
            </div>

            <div class="input-field" >
                <input type="text" name="apellidos" placeholder="Apellidos" title="Apellidos" id="apellidos" style="margin-bottom: 10px;" required>
                <label for="apellidos">Apellidos:</label>
            </div>
            <div class="col s6 input-field">
              <input type="date" class="datepicker" name="añoGraduacion" id="añoGraduacion" required >
              <label for="añoGraduacion">Año de Graduación:</label>
          </div>
            <div class="input-field" >
                <input type="text" name="facultad" placeholder="Facultad" title="Facultad" id="facultad" style="margin-bottom: 10px;" required>
                <label for="facultad">Facultad:</label>
            </div>
            <div class="input-field">
                <input type="text" name="carrera" placeholder="Carrera" title="Carrera" id="carrera" style="margin-bottom: 10px;" required>
                <label for="carrera">Carrera:</label>
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
  $sel = $con->prepare("SELECT * FROM egresado");
  $sel->execute();
  $res = $sel->get_result();
  $row = mysqli_num_rows($res);
 ?>

<div class="row2">
  <div class="col s13">
    <div class="card2">
      <div class="card-content2">
        <span class="card-title">Clientes (<?php echo $row ?>)</span>
        <table>
          <thead>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Año Graduacion</th>
            <th>Facultad</th> 
            <th>Carrera</th>
            <th>Hacer seguimiento</th>
            <th>Ver seguimiento</th>    
            <th>Eliminar</th>
          </thead>
          <?php while ($f = $res->fetch_assoc()) { ?>
            <tr>
              <td><?php echo $f['nombre'] ?></td>
              <td><?php echo $f['apellidos'] ?></td>
              <td><?php echo $f['añoGraduacion'] ?></td>
              <td><?php echo $f['facultad'] ?></td>
              <td><?php echo $f['carrera'] ?></td>

              <td> <a href="crear_seguimiento.php?id=<?php echo $f['egresado_id'] ?>&nombre=<?php echo urlencode($f['nombre'] . ' ' . $f['apellidos']) ?>" class="btn-floating">
                  <i class="material-icons">add</i>
                </a></td>
              <td>
              <a href="ver_seguimiento.php?id=<?php echo $f['egresado_id'] ?>" class="btn-floating green"><i class="material-icons">visibility</i></a>
              </td>
              <td>
                <a href="#" class="btn-floating red" onclick="swal({ title: 'Esta seguro que desea eliminar al egresado?', text: 'Al eliminarlo no podra recuperarlo!', type: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, eliminarlo!' }).then(function () {  location.href='eliminar_egresado.php?id=<?php echo $f['egresado_id'] ?>'; })"><i class="material-icons">clear</i></a>
              </td>
            </tr>
            <?php
          }
          $sel->close();
          $con->close();
             ?>
        </table>
      </div>
    </div>
  </div>
</div>



<?php include '../extend/scripts.php'; ?>
</body>
</html>