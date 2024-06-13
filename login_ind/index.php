<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>DIRSEU</title>
</head>
<body style="background: #003b6f; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">
<main style="width: 80%;">
        <div class="row">
            <div class="input-field col s12 center">
                <img src="dir-logo1.png" width="300">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="card z-depth-5">
                        <div class="card-content">
						<span class="card-title" style="font-size: 32px; text-align: center; color: #003b6f; display: block; margin-bottom: 20px;">Inicio de sesión</span>

                            <form action="../login/index.php" method="post" autocomplete="off">
                                <div class="input-field">
                                    <i class="material-icons prefix">perm_identity</i>
                                    <input type="text" name="usuario" id="usuario" autofocus class="validate">
                                    <label for="usuario">Usuario</label>
                                </div>
                                <div class="input-field">
                                    <i class="material-icons prefix">vpn_key</i>
                                    <input type="password" name="contra" id="contra" class="validate">
                                    <label for="contra">Contraseña</label>
                                </div>
                                <div class="input-field center">
                                    <button type="submit" class="btn waves-effect waves-light" style='background: #00cdff; font-size: 18px;'>Acceder</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {
            M.updateTextFields(); // Esta función actualiza los campos de texto para asegurar que las etiquetas se manejen correctamente
        });
    </script>
</body>
</html>
