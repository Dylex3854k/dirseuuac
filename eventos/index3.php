<!-- Llama a la cabecera -->
<?php include "../extend/headerPrincipal.php"; ?>

<?php
// Realizar la consulta a la base de datos para obtener los eventos
$sel = $con->query("SELECT * FROM evento " );
?>

<div class="image-grid">
    <?php
    while ($f = $sel->fetch_assoc()) {
    ?>
    <div class="image-slot">
        <div class="image-container" onclick="toggleDescription(this)">
            <img src="<?php echo $f['imagen']; ?>" alt="<?php echo $f['nombre']; ?>">
            <div class="description">
                <div class="info">
                    <h2><?php echo $f['nombre']; ?></h2>
                    <p>Día: <?php echo date('l, d \d\e F \d\e Y', strtotime($f['fechaIni'])); ?></p>
                    <p>Hora: <?php echo date('H:i', strtotime($f['fechaIni'])); ?> - <?php echo date('H:i', strtotime($f['fechaFin'])); ?></p>
                    <p>Lugar: <?php echo $f['ubicacion']; ?></p>
                </div>
            </div>
        </div>
        <h3><?php echo $f['nombre']; ?></h3>
        <button onclick="location.href='../login_ind/index.php'">Postula aquí</button>
    </div>
    <?php
    }
    ?>
</div>

<nav class="main-navigation2">
    <ul>
        <h1>EVENTOS ANTERIORES</h1>
    </ul>
</nav>

<div class="image-grid">

        
        <div class="image-slot">
            <div class="image-container" onclick="toggleDescription(this)">
                <img src="../img/rs3.jpg" alt="Festidanza">
                <div class="description">
                    <div class="info">
                        <h2>Colación y Juramentación de Salud</h2>
                        <p>Día: jueves, 6 de junio de 2024</p>
                        <p>Hora: 10:00 a 12:00 hrs.</p>
                        <p>Lugar: Aula Magna 2 - Campus Qollana</p>
                    </div>
                </div>
            </div>
            <h3>Colación y Juramentación de Salud</h3>
        </div>

        <div class="image-slot">
            <div class="image-container" onclick="toggleDescription(this)">
                <img src="../img/rs9.jpg" alt="Festidanza">
                <div class="description">
                    <div class="info">
                        <h2>Reflexiones sobre conexión de ruta Qhapaq Ñan</h2>
                        <p>Día: miercoles, 05 de junio de 2024</p>
                        <p>Hora: 15:00 - 17:00 hrs.</p>
                        <p>Lugar: Sky Room - Larapa</p>
                    </div>
                </div>
            </div>
            <h3>Reflexiones Sobre Conexión de Ruta Qhapaq Ñan</h3>
        </div>

        <div class="image-slot">
            <div class="image-container" onclick="toggleDescription(this)">
                <img src="../img/rs4.jpg" alt="Festidanza">
                <div class="description">
                    <div class="info">
                        <h2>Primeros Auxilios en Emergencias Odontológicas</h2>
                        <p>Día: martes, 4 de junio de 2024</p>
                        <p>Hora: 09:00 a 13:00 hrs.</p>
                        <p>Lugar: Auditorio de la Facultad de Derecho</p>
                    </div>
                </div>
            </div>
            <h3>Primeros Auxilios en Emergencias Odontológicas</h3>
        </div>

        <div class="image-slot">
            <div class="image-container" onclick="toggleDescription(this)">
                <img src="../img/rs6.jpg" alt="Festidanza">
                <div class="description">
                    <div class="info">
                        <h2>Colación y Juramentación de Derecho</h2>
                        <p>Día: miercoles, 03 de junio de 2024</p>
                        <p>Hora: 11:00 a 13:00 hrs.</p>
                        <p>Lugar: Auditorio de la Facultad de Derecho</p>
                    </div>
                </div>
            </div>
            <h3>Colación y Juramentación de Derecho</h3>
        </div>

        <div class="image-slot">
            <div class="image-container" onclick="toggleDescription(this)">
                <img src="../img/rs10.jpg" alt="Festidanza">
                <div class="description">
                    <div class="info">
                        <h2>Elecciones Generales de Estudiantes</h2>
                        <p>Día: viernes, 31 de mayo de 2024</p>
                        <p>Hora: 08:00 a 15:00 hrs.</p>
                        <p>Lugar: Todas las Filiales</p>
                    </div>
                </div>
            </div>
            <h3>Elecciones Generales de Estudiantes</h3>
        </div>

        <div class="image-slot">
            <div class="image-container" onclick="toggleDescription(this)">
                <img src="../img/rs5.jpg" alt="Festidanza">
                <div class="description">
                    <div class="info">
                        <h2>Uso de Software de Gestión de Referencias</h2>
                        <p>Día: miercoles, 29 de mayo de 2024</p>
                        <p>Hora: 20:00 a 22:00 hrs.</p>
                        <p>Lugar: Reunión Virtual</p>
                    </div>
                </div>
            </div>
            <h3>Uso de Software de Gestión de Referencias</h3>
        </div>
        
        <div class="image-slot">
            <div class="image-container" onclick="toggleDescription(this)">
                <img src="../img/rs11.jpg" alt="Festidanza">
                <div class="description">
                    <div class="info">
                        <h2>Valores en un Mundo Real</h2>
                        <p>Día: martes, 28 de mayo de 2024</p>
                        <p>Hora: 11:00 a 13:00 hrs.</p>
                        <p>Lugar: Administración de Negocios internacionales</p>
                    </div>
                </div>
            </div>
            <h3>Valores en un Mundo Real</h3>
        </div>

        <div class="image-slot">
            <div class="image-container" onclick="toggleDescription(this)">
                <img src="../img/rs12.jpg" alt="Festidanza">
                <div class="description">
                    <div class="info">
                        <h2>Campaña - Reciclactón 2024</h2>
                        <p>Día: martes, 24 de mayo de 2024</p>
                        <p>Hora: 09:00 a 16:00 hrs.</p>
                        <p>Lugar: Vicerrectorado Académico</p>
                    </div>
                </div>
            </div>
            <h3>Campaña - Reciclactón 2024</h3>
        </div>

        <div class="image-slot">
            <div class="image-container" onclick="toggleDescription(this)">
                <img src="../img/rs1.jpg" alt="Festidanza">
                <div class="description">
                    <div class="info">
                        <h2>Programa de R.S. en Derecho Ambiental</h2>
                        <p>Día: jueves 18 y viernes 19, de abril de 2024</p>
                        <p>Hora: 07:00 a 20:00 hrs.</p>
                        <p>Lugar: Pabellón - Facultad de Derecho</p>
                    </div>
                </div>
            </div>
            <h3>Programa de R.S. en Derecho Ambiental</h3>
        </div>
        </div>

  

<footer>
    <p>© Universidad Andina del Cusco</p>
</footer>

<script>
    function toggleDescription(element) {
        var description = element.querySelector('.description');
        if (description.style.opacity === '1') {
            description.style.opacity = '0';
            setTimeout(function() {
                description.style.visibility = 'hidden';
            }, 300);
        } else {
            description.style.visibility = 'visible';
            description.style.opacity = '1';
        }
    }
</script>
</body>
</html>
