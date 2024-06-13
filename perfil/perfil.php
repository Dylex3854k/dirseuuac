<?php include '../extend/header.php'; ?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">

	  		<span style='font-size:30px; font-weight:bold; 'class="card-title">EDITAR PERFIL</span>
			</div>
			
			<center>
			<div class="card-tabs">
    <ul class="tabs" >
        <li class="tab"><a href="#datos" class="btn tab-custom-button active">Datos</a></li>
        <li class="tab"><a href="#pass" class="btn tab-reset-button">Contraseña</a></li>
    </ul>
</div>
</center>

			
			<div class="card-content grey lighten-4">
				<div id="datos">
					<form action="up_perfil.php" class="form" method="post" enctype="multipart/form-data" autocomplete="off">
						<div class="input-field">
							<input type="text" name="nombre" title="Nombre del Usuario" id="nombre" onblur="may(this.value, this.id)" 
							required pattern="[A-Z/s ]+" value="<?php echo $_SESSION['nombre'] ?>">
							<label for="nombre">Nombre Completo del Usuario:</label>
						</div>
						<div class="input-field">
							<input type="email" name="correo" title="Correo Electrónico" value="<?php echo $_SESSION['correo'] ?>" id="correo">
							<label for="correo">Correo Electrónico:</label>
						</div>
						<button class="btn black" type="submit">Editar</button>
					</form>
				</div>
				<div id="pass">
					<form action="up_pass.php" class="form" method="post" enctype="multipart/form-data" autocomplete="off">
						<div class="input-field">
							<input type="password" name="pass1" title="CONTRASEÑA CON NUMEROS, LETRAS MAYUSCULAS Y MINUSCULAS ENTRE 8 Y 15 CARACTERES" 
							pattern="[A-Za-z0-9]{8,15}" id="pass1" required>
							<label for="pass1">Contraseña:</label>
						</div>
						<div class="input-field">
							<input type="password" title="CONTRASEÑA CON NUMEROS, LETRAS MAYUSCULAS Y MINUSCULAS ENTRE 8 Y 15 CARACTERES" 
							pattern="[A-Za-z0-9]{8,15}" id="pass2" required>
							<label for="pass2">Verificar Contraseña:</label>
						</div>
						<button class="btn black" type="submit" id="btn_guardar">Editar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include '../extend/scripts.php'; ?>
<script type="text/javascript" src="../js/validacion.js"></script>
</body>
</html>