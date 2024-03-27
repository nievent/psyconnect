function ocultarOverlay() {
    document.getElementById('backdrop').style.display = 'none';
    document.getElementById('detalles').style.display = 'none';
    document.getElementById('detallesRegistros').style.display = 'none';
    document.getElementById('asignarRegistro').style.display = 'none';
}

function mostrarDetalles(nombre, apellidos, email, dni) {
    document.getElementById('backdrop').style.display = 'block';
    document.getElementById('detalles').style.display = 'block';
    document.getElementById('detallesNombre').textContent = nombre;
    document.getElementById('detallesApellidos').textContent = apellidos;
    document.getElementById('detallesEmail').textContent = email;
    document.getElementById('detallesDni').textContent = dni;
}

function mostrarDetallesRegistro(descripcion, id, registro = null) {
    document.getElementById('backdrop').style.display = 'block';
    document.getElementById('detallesRegistros').style.display = 'block';
    document.getElementById('descripcionRegistro').textContent = descripcion;
    let tabla = document.getElementById('camposRegistro')
    let tbody = document.getElementById('tbodyRegistro');
    id = id.toString();
    tabla.innerHTML = '';
    tbody.innerHTML = '';
    switch(id) {
        case "1":
            console.log("Caso 1 ejecutado");
            let campo1 = document.createElement('th');
            campo1.textContent = 'Fecha';
            tabla.appendChild(campo1);
        
            let campo2 = document.createElement('th');
            campo2.textContent = 'Momento del día';
            tabla.appendChild(campo2);
        
            let campo3 = document.createElement('th');
            campo3.textContent = 'Relajación conseguida';
            tabla.appendChild(campo3);
        
            let campo4 = document.createElement('th');
            campo4.textContent = 'Concentración conseguida';
            tabla.appendChild(campo4);
        
            if(registro == null) {
            for (let i = 0; i < 2; i++) {
                let fila = document.createElement('tr');
                for (let j = 0; j < 4; j++) {
                    let celda = document.createElement('td');
                    celda.textContent = ''; // Contenido de la celda vacía
                    fila.appendChild(celda);
                }
                tbody.appendChild(fila);
            }
        } else {
            registro = registro.trim();
            let data = JSON.parse(registro);
            console.log(data.length);
            for (let i = 0; i < data.length; i++) {
                let fila = document.createElement('tr');
                let campos = ['fecha', 'momento_dia', 'relajacion_conseguida', 'concentracion_conseguida'];
                for (let j = 0; j < campos.length; j++) {
                    let celda = document.createElement('td');
                    celda.textContent = data[i][campos[j]]; // Asignar el valor de la propiedad al texto de la celda
                    fila.appendChild(celda);
                }
                tbody.appendChild(fila); // Agregar la fila al cuerpo de la tabla
            }
        }

        break;
        case "2":
            console.log("Caso 2 ejecutado");
            let campo1_2 = document.createElement('th');
            campo1_2.textContent = 'Fecha';
            tabla.appendChild(campo1_2);
        
            let campo2_2 = document.createElement('th');
            campo2_2.textContent = '¿Qué ha sucedido?';
            tabla.appendChild(campo2_2);
        
            let campo3_2 = document.createElement('th');
            campo3_2.textContent = '¿Qué he pensado?';
            tabla.appendChild(campo3_2);
        
            let campo4_2 = document.createElement('th');
            campo4_2.textContent = '¿Cómo me he sentido?';
            tabla.appendChild(campo4_2);

            let campo5_2 = document.createElement('th');
            campo5_2.textContent = 'Qué he hecho?';
            tabla.appendChild(campo5_2);
        
            if (registro == null) {
                console.log("registro es null");
                // Añadir dos filas vacías con cinco celdas cada una
                for (let i = 0; i < 2; i++) {
                    let fila = document.createElement('tr');
                    for (let j = 0; j < 5; j++) {
                        let celda = document.createElement('td');
                        celda.textContent = ''; // Contenido de la celda vacía
                        fila.appendChild(celda);
                    }
                    tbody.appendChild(fila); // Agregar la fila al cuerpo de la tabla
                }
            } else {
                registro = registro.trim();
                let data = JSON.parse(registro);
                console.log(data.length);

                for (let i = 0; i < data.length; i++) {
                    let fila = document.createElement('tr');
                    let campos = ['fecha', 'que_ha_sucedido', 'que_he_pensado', 'como_me_he_sentido', 'que_he_hecho'];
                    for (let j = 0; j < campos.length; j++) {
                        let celda = document.createElement('td');
                        celda.textContent = data[i][campos[j]]; // Asignar el valor de la propiedad al texto de la celda
                        fila.appendChild(celda);
                    }
                    tbody.appendChild(fila); // Agregar la fila al cuerpo de la tabla
                }
            }
            
            
            break;
        case "3":
            console.log("Caso 3 ejecutado");
            let campo1_3 = document.createElement('th');
            campo1_3.textContent = 'Fecha';
            tabla.appendChild(campo1_3);
        
            let campo2_3 = document.createElement('th');
            campo2_3.textContent = 'Emociones';
            tabla.appendChild(campo2_3);
        
            let campo3_3 = document.createElement('th');
            campo3_3.textContent = 'Grado de intensidad';
            tabla.appendChild(campo3_3);
        
            let campo4_3 = document.createElement('th');
            campo4_3.textContent = 'Sensaciones corporales';
            tabla.appendChild(campo4_3);

        
            if (registro == null) {
            for (let i = 0; i < 2; i++) {
                let fila = document.createElement('tr');
                for (let j = 0; j < 4; j++) {
                    let celda = document.createElement('td');
                    celda.textContent = ''; // Contenido de la celda vacía
                    fila.appendChild(celda);
                }
                tbody.appendChild(fila);
            }
        } else {
            registro = registro.trim();
            let data = JSON.parse(registro);
            console.log(data.length);

            for (let i = 0; i < data.length; i++) {
                let fila = document.createElement('tr');
                let campos = ['fecha', 'emociones', 'grado_intensidad', 'sensaciones_corporales'];
                for (let j = 0; j < campos.length; j++) {
                    let celda = document.createElement('td');
                    celda.textContent = data[i][campos[j]]; // Asignar el valor de la propiedad al texto de la celda
                    fila.appendChild(celda);
                }
                tbody.appendChild(fila); // Agregar la fila al cuerpo de la tabla
            }
        }
            break;
        case "4":
            console.log("Caso 4 ejecutado");
            let campo1_4 = document.createElement('th');
            campo1_4.textContent = 'Fecha';
            tabla.appendChild(campo1_4);
        
            let campo2_4 = document.createElement('th');
            campo2_4.textContent = '¿Qué he logrado?';
            tabla.appendChild(campo2_4);
        
            let campo3_4 = document.createElement('th');
            campo3_4.textContent = 'Acciones realizadas';
            tabla.appendChild(campo3_4);
        
            let campo4_4 = document.createElement('th');
            campo4_4.textContent = '¿Cómo me siento?';
            tabla.appendChild(campo4_4);

            let campo5_4 = document.createElement('th');
            campo5_4.textContent = 'Premio obtenido';
            tabla.appendChild(campo5_4);
        
            if (registro == null) {
            // Añadir filas vacías con cuatro celdas cada una
            for (let i = 0; i < 2; i++) {
                let fila = document.createElement('tr');
                for (let j = 0; j < 5; j++) {
                    let celda = document.createElement('td');
                    celda.textContent = ''; // Contenido de la celda vacía
                    fila.appendChild(celda);
                }
                tbody.appendChild(fila);
            }
        }else {
            registro = registro.trim();
            let data = JSON.parse(registro);
            
            for (let i = 0; i < data.length; i++) {
                let fila = document.createElement('tr');
                let campos = ['fecha', 'que_he_logrado', 'acciones_realizadas', 'como_me_siento', 'premio_obtenido'];
                for (let j = 0; j < campos.length; j++) {
                    let celda = document.createElement('td');
                    celda.textContent = data[i][campos[j]]; // Asignar el valor de la propiedad al texto de la celda
                    fila.appendChild(celda);
                }
                tbody.appendChild(fila); // Agregar la fila al cuerpo de la tabla
            }
        }

            break;
        case "5":
            console.log("Caso  ejecutado");
            let campo1_5 = document.createElement('th');
            campo1_5.textContent = 'Fecha';
            tabla.appendChild(campo1_5);
        
            let campo2_5 = document.createElement('th');
            campo2_5.textContent = 'Ejercicio provocador';
            tabla.appendChild(campo2_5);
        
            let campo3_5 = document.createElement('th');
            campo3_5.textContent = 'Numero de repetición';
            tabla.appendChild(campo3_5);

            let campo4_5 = document.createElement('th');
            campo4_5.textContent = 'Miedo máximo';
            tabla.appendChild(campo4_5);

        
            if(registro == null) {
            // Añadir filas vacías con cuatro celdas cada una
            for (let i = 0; i < 2; i++) {
                let fila = document.createElement('tr');
                for (let j = 0; j < 4; j++) {
                    let celda = document.createElement('td');
                    celda.textContent = ''; // Contenido de la celda vacía
                    fila.appendChild(celda);
                }
                tbody.appendChild(fila);
            }
        } else {
            registro = registro.trim();
            let data = JSON.parse(registro);

            for (let i = 0; i < data.length; i++) {
                let fila = document.createElement('tr');
                let campos = ['fecha', 'ejercicio_provocador', 'numero_repeticion', 'miedo_maximo'];
                for (let j = 0; j < campos.length; j++) {
                    let celda = document.createElement('td');
                    celda.textContent = data[i][campos[j]]; // Asignar el valor de la propiedad al texto de la celda
                    fila.appendChild(celda);
                }
                tbody.appendChild(fila); // Agregar la fila al cuerpo de la tabla
            }
        }
            break;
        default:
            // Manejar el caso en que id no coincida con ningún caso específico
            break;
    }
}


function mostrarAsignarRegistro(id) {
    document.getElementById('backdrop').style.display = 'block';
    document.getElementById('asignarRegistro').style.display = 'block';
    document.getElementById('idPacienteAR').value = id;
}

function detallesRegistroTipo(registro, id_tipo, descripcion){
    console.log(registro);
    mostrarDetallesRegistro(descripcion, id_tipo, registro);
}
