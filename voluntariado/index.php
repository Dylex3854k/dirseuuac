<!--llama a la cabecera-->  
<?php 
    include "../extend/header.php";
?>

<head>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
</head>


<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span style='font-size:30px; font-weight:bold; 'class="card-title">VOLUNTARIADOS</span>
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
$sel = $con->query("SELECT *
FROM evento 
JOIN gestion_reporte ON evento.even_id = gestion_reporte.evento_id 
JOIN voluntariado ON gestion_reporte.gest_rep_id = voluntariado.gest_rep_id
JOIN voluntario ON voluntariado.voluntariado_id = voluntario.voluntariado_id;
");
$row = mysqli_num_rows($sel);
?>
<div class="row2">
  <div class="col s13">
    <div class="card2">
      <div class="card-content2">
        <span class="card-title">Voluntariados (<?php echo $row ?>) </span>
        <table>
          <thead>
            <th>Nombre</th>
            <th>Ubicacion</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th> 
            <th>Nombre del Voluntario</th>
            <th>Escuela Profesional</th> 
            <th>Eliminar</th>
          </thead>
          <?php while($f = $sel->fetch_assoc()){ ?>
            <tr>
              <td><?php echo $f['nombre'] ?></td>
              <td><?php echo $f['ubicacion'] ?></td>
              <td><?php echo $f['fechaIni'] ?></td>
              <td><?php echo $f['fechaFin'] ?></td>
              <td><?php echo $f['nombre_completo'] ?></td>
              <td><?php echo $f['escuela_profesional'] ?></td>
              <td>
                <a href="#" class="btn-floating red" onclick="swal({ title: '¿Está seguro que desea eliminar al voluntario?', text: 'Al eliminarlo no podrá recuperarlo!', type: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Sí, eliminarlo!' }).then(function () {  location.href='eliminar_voluntario.php?id=<?php echo $f['id'] ?>'; })"><i class="material-icons">clear</i></a> 
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