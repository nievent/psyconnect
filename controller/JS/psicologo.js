
function confirmarBajaUsuario(id) {
    var confirmacion = confirm("¿Estás seguro de que deseas eliminar este paciente? Esta acción no se puede eliminar");
    if (confirmacion) {
        window.location.href = "../controller/psicologo/eliminarPaciente.php?id=" + id;
    } else {
        // El usuario ha cancelado la eliminación, no hacemos nada
    }
}

function confirmarBajaRegistro(id, id_tipo_reg) {
    var confirmacion = confirm("¿Estás seguro de que deseas eliminar este paciente? Esta acción no se puede eliminar");
    if (confirmacion) {
        window.location.href = "../controller/psicologo/eliminarRegistro.php?id=" + id + "&id_tipo_reg=" + id_tipo_reg;
    } else {
        // El usuario ha cancelado la eliminación, no hacemos nada
    }
}