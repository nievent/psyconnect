document.getElementById('limpiarParametro').addEventListener('click', function(event) {
    event.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
    limpiarParametro();
});

function limpiarParametro() {
    let url = window.location.href; // Obtener la URL actual
    let cleanUrl = url.split('?')[0]; // Eliminar cualquier parámetro de la URL
    window.location.href = cleanUrl; // Redirigir a la URL limpia
}
