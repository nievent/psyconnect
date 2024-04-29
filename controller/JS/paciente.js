//enviar los json al js correspondiente para trabajar.
function editarLogros(logros_json, descripcion) {
    document.getElementById('inputLogrosJson').value = logros_json;
    document.getElementById("descripcionLogros").value = descripcion;
    document.getElementById('formularioEditarLogros').submit();
}

function editarSensaciones(logros_json, descripcion) {
    document.getElementById('inputSensacionesJson').value = logros_json;
    document.getElementById("descripcionSensaciones").value = descripcion;
    document.getElementById('formularioEditarSensaciones').submit();
}

function editarEstadoAnimo(estadoAnimo_json, descripcion) {
    document.getElementById('inputEstadoAnimoJson').value = estadoAnimo_json;
    document.getElementById("descripcionEstadoAnimo").value = descripcion;
    document.getElementById('formularioEditarEstadoAnimo').submit();
}

function editarPensamiento(pensamiento_json, descripcion) {
    document.getElementById('inputPensamientoJson').value = pensamiento_json;
    document.getElementById("descripcionPensamiento").value = descripcion;
    document.getElementById('formularioEditarPensamiento').submit();
}

function editarRelajacion(relajacion_json, descripcion) {
    document.getElementById('inputRelajacionJson').value = relajacion_json;
    document.getElementById("descripcionRelajacion").value = descripcion;
    document.getElementById('formularioEditarRelajacion').submit();
}

//funcion para enviar los datos a la bd. 
document.querySelectorAll('.enviar-datos-btn').forEach(function(button) {
    button.addEventListener('click', function() {
        let tableId = this.getAttribute('data-table');
        let controller = this.getAttribute('data-controller');

        // Obtener todos los divs editables dentro de la tabla
        let editableRows = document.querySelectorAll('#' + tableId + ' .editable-row');
        let data = [];
        
        // Iterar sobre cada fila editable y recopilar los datos
        editableRows.forEach(function(row) {
            let rowData = {};
            let cells = row.querySelectorAll('td[contenteditable="true"]');
            
            // Recopilar los datos de las celdas editables
            cells.forEach(function(cell, index) {
                rowData['cell_' + (index + 1)] = cell.textContent.trim();
            });
            
            // Obtener los atributos data-id-registro y data-id-linea
            let idRegistro = row.dataset.idRegistro;
            let idLinea = row.dataset.idLinea;
            
            // Añadir los datos y los atributos al objeto rowData
            rowData['id_registro'] = idRegistro;
            rowData['id_linea'] = idLinea;
            
            // Añadir el objeto rowData al arreglo de datos
            data.push(rowData);
        });
        
        // Convertir los datos a JSON
        let jsonData = JSON.stringify(data);
        
        // Crear un formulario oculto y enviar los datos
        let form = document.createElement('form');
        form.setAttribute('method', 'post');
        form.setAttribute('action', '../controller/paciente/' + controller);
        
        let input = document.createElement('input');
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', 'editableData');
        input.setAttribute('value', jsonData);
        
        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    });
});

document.querySelectorAll('.enviar-datos-btn').forEach(function(button) {
    button.addEventListener('click', function() {
        let tableId = this.getAttribute('data-table');
        let controller = this.getAttribute('data-controller');
        let id = this.getAttribute('data-id'); // Obtener la id

        // Obtener todos los tr dentro de la tabla
        let rows = document.querySelectorAll('#' + tableId + ' tbody tr');
        let data = [];
        
        // Iterar sobre cada fila y recopilar los datos
        rows.forEach(function(row) {
            let rowData = {};
            let cells = row.querySelectorAll('td');
            
            cells.forEach(function(cell, index) {
                // Escapar etiquetas HTML, comillas simples y dobles en el contenido de las celdas
                let escapedContent = cell.textContent.trim()
                    .replace(/&/g, '&amp;') // Escapar el carácter '&'
                    .replace(/</g, '&lt;')   // Escapar el carácter '<'
                    .replace(/>/g, '&gt;')   // Escapar el carácter '>'
                    .replace(/"/g, '&quot;') // Escapar comillas dobles
                    .replace(/'/g, '&#39;'); // Escapar comillas simples
                
                rowData['cell_' + (index + 1)] = escapedContent;
            });
            // Obtener los atributos data-id-registro y data-id-linea
            let idRegistro = row.dataset.idRegistro;
            let idLinea = row.dataset.idLinea;
            
            // Añadir los datos y los atributos al objeto rowData
            rowData['id_registro'] = idRegistro;
            rowData['id_linea'] = idLinea;
            
            // Añadir el objeto rowData al arreglo de datos
            data.push(rowData);
        });
        
        // Convertir los datos a JSON
        let jsonData = JSON.stringify(data);
        
        // Crear un formulario oculto y enviar los datos
        let form = document.createElement('form');
        form.setAttribute('method', 'post');
        form.setAttribute('action', '../controller/paciente/' + controller);
        
        let input = document.createElement('input');
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', 'editableData');
        input.setAttribute('value', jsonData);

        // Agregar la ID como un input oculto al formulario
        let idInput = document.createElement('input');
        idInput.setAttribute('type', 'hidden');
        idInput.setAttribute('name', 'id');
        idInput.setAttribute('value', id);
        
        form.appendChild(input);
        form.appendChild(idInput); // Agregar el input con la ID al formulario
        document.body.appendChild(form);
        form.submit();
    });
});


// Función para agregar una nueva fila a la tabla
function agregarFila(btn, event = null) {
    // Obtener la fecha actual
    let fechaActual = new Date().toISOString().slice(0, 10);

    // Obtener el id_registro y el id_linea del botón "Agregar Fila"
    let idRegistro = btn.getAttribute('data-id-registro');
    let idLinea = btn.getAttribute('data-id-linea');
    let numTds = btn.getAttribute('data-tds');

    // Crear una cadena para las celdas de la nueva fila
    let tdContent = '';
    for (let i = 0; i < numTds; i++) {
        tdContent += '<td contenteditable="true"></td>';
    }

    // Crear una nueva fila con los valores predeterminados y los datos obtenidos
    let nuevaFila = '<tr class="editable-row editando" data-id-registro="' + idRegistro + '" data-id-linea="' + idLinea + '">' +
        '<td contenteditable="true">' + fechaActual + '</td>' +
        tdContent + // Añadir las celdas generadas dinámicamente
        '<td><button class="borrar-btn" data-row="' + idLinea + '"><i class="fas fa-trash"></i></button></i></button></td>' +
        '</tr>';

    // Agregar la nueva fila al final de la tabla correspondiente
    let tablaId = btn.getAttribute('data-table-id');
    let tabla = document.getElementById(tablaId);
    if (tabla) {
        tabla.insertAdjacentHTML('beforeend', nuevaFila);
    } else {
        console.error("No se encontró la tabla con ID:", tablaId);
    }
}

// Función para manejar el clic en el botón de borrar fila
function borrarFila(event) {
    const fila = event.target.closest('tr'); // Obtener la fila que contiene el botón de borrar
    if (confirm('¿Estás seguro de que quieres borrar esta fila?')) {
        fila.remove(); // Borrar la fila
    }
}

// Asignar evento clic al botón de agregar fila
document.getElementById('agregarFilaBtn').addEventListener('click', function() {
    // Incrementar el valor de data-id-linea para que la próxima fila tenga un ID único
    let nuevoIdLinea = parseInt(this.getAttribute('data-id-linea')) + 1;
    this.setAttribute('data-id-linea', nuevoIdLinea);
    agregarFila(this);
});

// Agregar evento de clic al contenedor de la tabla para manejar los clics en los botones de borrar fila
document.getElementById('div').addEventListener('click', function(event) {
    if (event.target && (event.target.classList.contains('borrar-btn') || event.target.parentNode.classList.contains('borrar-btn'))) {
        borrarFila(event);
    }
});

//funcionalidad boton editar
document.addEventListener("DOMContentLoaded", function() {
    const editarButtons = document.querySelectorAll(".editar-btn");

    editarButtons.forEach(button => {
        button.addEventListener("click", function() {
            const rowId = this.dataset.row;
            const row = document.querySelector("#fila_" + rowId);

            if (row) {
                row.classList.toggle("editando");
                const cells = row.querySelectorAll("td");

                cells.forEach(cell => {
                    cell.contentEditable = row.classList.contains("editando") ? "true" : "false";
                });
            }
        });
    });
});

