<!-- Llama a la cabecera -->
<?php include "../extend/headerPrincipal.php"; ?>

<?php
// Realizar la consulta a la base de datos para obtener los eventos
$sel = $con->query("SELECT * FROM puesto_laboral;" );
?>

<div class="image-grid">
    <?php
    while ($f = $sel->fetch_assoc()) {
    ?>
    <div class="image-slot">
        <div class="image-container" onclick="toggleDescription(this)">
            <img src="<?php echo $f['imagen']; ?>" alt="<?php echo $f['nombre_puesto']; ?>">
            <div class="description">
                <div class="info">
                    <h2><?php echo $f['descripcion_Empresa']; ?></h2>
                    <p>Requisitos:<?php echo $f['requisitos']; ?></p>
                    <p>Descripcion:<?php echo $f['descripcion_puesto']; ?></p>
                </div>
            </div>
        </div>
        <h3><?php echo $f['nombre_puesto']; ?></h3>
        <button onclick="location.href='../login_ind/index.php'">Postula aquí</button>
    </div>
</div>
    <?php
    }
    ?>
</div>

</div>

<div style="margin: 180px"></div>
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
