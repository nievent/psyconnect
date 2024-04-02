function editarConJson(id, logros_json) {
    document.getElementById('inputLogrosJson').value = logros_json;
    document.getElementById('formularioEditar').submit();
}


document.getElementById('enviarDatos').addEventListener('click', function() {
    // Obtener todos los divs editables dentro de la tabla
    var editableRows = document.querySelectorAll('.editable-row');
    var data = [];
    
    // Iterar sobre cada fila editable y recopilar los datos
    editableRows.forEach(function(row) {
        var rowData = {};
        var cells = row.querySelectorAll('td[contenteditable="true"]');
        
        // Recopilar los datos de las celdas editables
        cells.forEach(function(cell, index) {
            rowData['cell_' + (index + 1)] = cell.textContent.trim();
        });
        
        // Obtener los atributos data-id-registro y data-id-linea
        var idRegistro = row.dataset.idRegistro;
        var idLinea = row.dataset.idLinea;
        
        // Añadir los datos y los atributos al objeto rowData
        rowData['id_registro'] = idRegistro;
        rowData['id_linea'] = idLinea;
        
        // Añadir el objeto rowData al arreglo de datos
        data.push(rowData);
    });
    
    // Convertir los datos a JSON
    var jsonData = JSON.stringify(data);
    
    // Crear un formulario oculto y enviar los datos
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '../controller/paciente/editarRegistro.php');
    
    var input = document.createElement('input');
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'editableData');
    input.setAttribute('value', jsonData);
    
    form.appendChild(input);
    document.body.appendChild(form);
    form.submit();
});

// Función para agregar una nueva fila a la tabla
function agregarFila() {
    // Obtener la fecha actual
    var fechaActual = new Date().toISOString().slice(0, 10);

    // Obtener el id_registro y el id_linea del botón "Agregar Fila"
    var idRegistro = this.getAttribute('data-id-registro');
    var idLinea = this.getAttribute('data-id-linea');

    // Crear una nueva fila con los valores predeterminados y los datos obtenidos
    var nuevaFila = '<tr class="editable-row" data-id-registro="' + idRegistro + '" data-id-linea="' + idLinea + '">' +
                        '<td contenteditable="true">' + fechaActual + '</td>' +
                        '<td contenteditable="true"></td>' +
                        '<td contenteditable="true"></td>' +
                        '<td contenteditable="true"></td>' +
                        '<td contenteditable="true"></td>' +
                    '</tr>';

    // Agregar la nueva fila al final de la tabla
    var tabla = document.getElementById("registro")
    tabla.insertAdjacentHTML('beforeend', nuevaFila);
}

// Asignar evento clic al botón de agregar fila
document.getElementById('agregarFilaBtn').addEventListener('click', agregarFila);
