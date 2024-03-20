document.getElementById('limpiarParametro').addEventListener('click', function(event) {
    event.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
    limpiarParametro();
});

function limpiarParametro() {
    let url = window.location.href; // Obtener la URL actual
    let cleanUrl = url.split('?')[0]; // Eliminar cualquier parámetro de la URL
    window.location.href = cleanUrl; // Redirigir a la URL limpia
}

function confirmarBajaUsuario(id) {
    var confirmacion = confirm("¿Estás seguro de que deseas eliminar este paciente? Esta acción no se puede eliminar");
    if (confirmacion) {
        window.location.href = "../controller/psicologo/eliminarPaciente.php?id=" + id;
    } else {
        // El usuario ha cancelado la eliminación, no hacemos nada
    }
}

function confirmarBajaRegistro(id) {
    var confirmacion = confirm("¿Estás seguro de que deseas eliminar este paciente? Esta acción no se puede eliminar");
    if (confirmacion) {
        window.location.href = "../controller/psicologo/eliminarRegistro.php?id=" + id;
    } else {
        // El usuario ha cancelado la eliminación, no hacemos nada
    }
}