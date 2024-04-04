function editarLogros(logros_json) {
    document.getElementById('inputLogrosJson').value = logros_json;
    document.getElementById('formularioEditarLogros').submit();
}

function editarSensaciones(logros_json) {
    document.getElementById('inputSensacionesJson').value = logros_json;
    document.getElementById('formularioEditarSensaciones').submit();
}

function editarEstadoAnimo(estadoAnimo_json) {
    document.getElementById('inputEstadoAnimoJson').value = estadoAnimo_json;
    document.getElementById('formularioEditarEstadoAnimo').submit();
}

function editarPensamiento(pensamiento_json) {
    document.getElementById('inputPensamientoJson').value = pensamiento_json;
    document.getElementById('formularioEditarPensamiento').submit();
}

function editarRelajacion(relajacion_json) {
    document.getElementById('inputRelajacionJson').value = relajacion_json;
    document.getElementById('formularioEditarRelajacion').submit();
}


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
    let nuevaFila = '<tr class="editable-row" data-id-registro="' + idRegistro + '" data-id-linea="' + idLinea + '">' +
        '<td contenteditable="true">' + fechaActual + '</td>' +
        tdContent + // Añadir las celdas generadas dinámicamente
        '<td><button class="borrar-btn" data-row="' + idLinea + '"><i class="far fa-trash-alt"></i></button></td>' +
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

// Asignar evento clic al botón de agregar fila
document.getElementById('agregarFilaBtn').addEventListener('click', function() {
    // Incrementar el valor de data-id-linea para que la próxima fila tenga un ID único
    let nuevoIdLinea = parseInt(this.getAttribute('data-id-linea')) + 1;
    this.setAttribute('data-id-linea', nuevoIdLinea);
    agregarFila(this);
});

// Agregar evento de clic al contenedor de la tabla para manejar los clics en los botones de borrar fila
document.getElementById('div').addEventListener('click', function(event) {
    if (event.target && event.target.classList.contains('borrar-btn')) {
        const fila = event.target.closest('tr'); // Obtener la fila que contiene el botón de borrar
        if (confirm('¿Estás seguro de que quieres borrar esta fila?')) {
            fila.remove(); // Borrar la fila
        }
    }
});
