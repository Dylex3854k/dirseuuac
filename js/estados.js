document.addEventListener('DOMContentLoaded', () => {
    const precioElement = document.getElementById('Precio');
    const cantidadElement = document.getElementById('cantidad');
    const totalElement = document.getElementById('total');

    precioElement.addEventListener('change', actualizarTotal);
    cantidadElement.addEventListener('input', actualizarTotal);

    function actualizarTotal() {
        const precio = parseFloat(precioElement.value) || 0;
        const cantidad = parseFloat(cantidadElement.value) || 0;

        if (Number.isFinite(precio) && Number.isFinite(cantidad)) {
            const total = precio * cantidad;
            totalElement.value = total.toFixed(2);
        }
    }
});
