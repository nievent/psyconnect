
function confirmarBajaUsuario(id) {
    var confirmacion = confirm("¿Estás seguro de que deseas eliminar este paciente? Esta acción no se puede eliminar");
    if (confirmacion) {
        window.location.href = "../controller/psicologo/eliminarPaciente.php?id=" + id;
    } 
}

function confirmarBajaRegistro(id, id_tipo_reg) {
    var confirmacion = confirm("¿Estás seguro de que deseas eliminar este paciente? Esta acción no se puede eliminar");
    if (confirmacion) {
        window.location.href = "../controller/psicologo/eliminarRegistro.php?id=" + id + "&id_tipo_reg=" + id_tipo_reg;
    } 
}

document.addEventListener("DOMContentLoaded", function() {
    const input1 = document.querySelector("#buscador1 input");
    const rows = document.querySelectorAll(".principal_table tbody tr");

    if (input1 && rows.length > 0) {
        input1.addEventListener("input", function() {
            const searchTerm = this.value.trim().toLowerCase();
            console.log(searchTerm);

            rows.forEach(row => {
                const nombre = row.cells[0].textContent.trim().toLowerCase();
                const apellidos = row.cells[1].textContent.trim().toLowerCase();
                const email = row.cells[2].textContent.trim().toLowerCase();

                if (nombre.includes(searchTerm) || apellidos.includes(searchTerm) || email.includes(searchTerm)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    }

    const input2 = document.querySelector("#buscador2 input");
    const comentarios = document.querySelectorAll("#comentarios .fila");

    if (input2 && comentarios.length > 0) {
        input2.addEventListener("input", function() {
            const searchTerm2 = this.value.trim().toLowerCase();
            console.log(searchTerm2);
            comentarios.forEach(comentario => {
                const contenido = comentario.querySelector('.pacientes').textContent.trim().toLowerCase();

                if (contenido.includes(searchTerm2)) {
                    comentario.style.display = "";
                } else {
                    comentario.style.display = "none";
                }
            });
        });
    }
});
