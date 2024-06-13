<?php
include "../extend/header.php";
?>
<head>

<link rel="stylesheet" href="styles.css">
</head>


    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content white-text">
                    <center>
                        <div class="user-circle">
                            <img src="perfil.png" alt="User Photo">
                        </div>
                        <div>
                            <span class="card-title">Bienvenid@!</span>
                        </div>
                        <div style = "margin: auto 600px;">
                            <a href="../perfil/perfil.php" class="blue-text"><?php echo $_SESSION['nombre']; ?></a>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <footer style="margin-top: 6%;">
        <p>© Universidad Andina del Cusco</p>
    </footer>

    <?php include "../extend/scripts.php"; ?>
</body>