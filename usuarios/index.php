<!--llama a la cabecera-->  
<?php include "../extend/header.php";
include '../extend/permiso.php'
?>
<head>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
</head>



<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span style='font-size:30px; font-weight:bold; 'class="card-title">GESTION USUARIOS</span>
        <form class="form" action="ins_usuarios.php" method="post" enctype="multipart/form-data" autocomplete="off">
         
        <div class="input-field">
            <input type="text" name="nick" id="nick" required autofocus title="DEBE DE CONTENER ENTRE 6 Y 15 CARACTERES, SOLO LETRAS" pattern="^[A-Za-z]{6,15}" placeholder="Apodo">
            <label for="nick">Apodo:</label>
        </div>

        <div class="input-field">
            <input type="password" name="pass1" id="pass1" required title="CONTRASEÑA CON NÚMEROS, LETRAS MAYÚSCULAS Y MINÚSCULAS ENTRE 8 Y 15 CARACTERES" pattern="[A-Za-z0-9]{8,15}" placeholder="Contraseña">
            <label for="pass1">Contraseña:</label>
        </div>

        <div class="input-field">
            <input type="password" name="pass2" id="pass2" required title="CONTRASEÑA CON NÚMEROS, LETRAS MAYÚSCULAS Y MINÚSCULAS ENTRE 8 Y 15 CARACTERES" pattern="[A-Za-z0-9]{8,15}" placeholder="Verificar contraseña">
            <label for="pass2">Verificar contraseña:</label>
        </div>

        <div class="input-field">
            <input type="text" name="nombre" id="nombre" required title="NOMBRE DEL USUARIO" pattern="[A-Z/s ]+" placeholder="Nombre completo del usuario">
            <label for="nombre">Nombre completo del usuario:</label>
        </div>

        

        <div class="input-field">
            <input type="email" name="correo" id="correo" required placeholder="Correo electrónico">
            <label for="correo">Correo electrónico:</label>
        </div>

        <div class="input-field">
            <input type="text" name="cargo" id="cargo" required placeholder="Cargo laboral en DIRSEU">
            <label for="cargo">Cargo laboral en DIRSEU:</label>
        </div>

        <div class="input-field">
            <select class='browser-default' name="nivel" required>
                <option value="" disabled selected>Selecciona un nivel</option>
                <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                <option value="PERSONAL">PERSONAL</option>
                <option value="COORDINADOR">COORDINADOR</option>
                <option value="REGULAR">REGULAR</option>
                <option value="EGRESADO">EGRESADO</option>
            </select>
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
$sel = $con->query("SELECT * FROM usuario LEFT JOIN personaldir ON usuario.perDIR_id = personaldir.perDIR_id");
$row = mysqli_num_rows($sel);
?>
<div class="row2">
  <div class="col s13">
    <div class="card2">
      <div class="card-content2">
        <span class="card-title">Usuarios (<?php echo $row ?>)</span>
        <table>
          <thead>
            <th>Apodo</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Cargo</th>
            <th>Nivel</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
          </thead>
          <?php while($f = $sel->fetch_assoc()){ ?>
            <tr>
              <td><?php echo $f['nick'] ?></td>
              <td><?php echo $f['nombre'] ?></td>
              <td><?php echo $f['correo'] ?></td>
              <td><?php echo $f['cargo'] ?></td>
              <td>
                <form action="up_nivel.php" method="post">
                  <input name="id" type="hidden" value="<?php echo $f['idUsuario'] ?>">
                  <select name="nivel" class="browser-default1" required>
                    <option value="<?php echo $f['nivel'] ?>"><?php echo $f['nivel'] ?></option>
                    <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                    <option value="PERSONAL">PERSONAL</option>
                    <option value="COORDINADOR">COORDINADOR</option>
                    <option value="REGULAR">REGULAR</option>
                    <option value="EGRESADO">EGRESADO</option>
                  </select>
              </td>
              <td>
                <button type="submit" class="btn-floating">Guardar</button>
                </form>
              </td>
              <td>
                <a href="#" class="btn-floating red" onclick="swal({ title: 'Esta seguro que desea eliminar al usuario?', text: 'Al eliminarlo no podra recuperarlo!', type: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, eliminarlo!' }).then(function () { location.href='eliminar_usuario.php?id=<?php echo $f['idUsuario'] ?>'; })">
                  <i class="material-icons">clear</i>
                </a>
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