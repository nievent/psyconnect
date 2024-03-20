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

function mostrarDetallesRegistro(descripcion, id) {
    document.getElementById('backdrop').style.display = 'block';
    document.getElementById('detallesRegistros').style.display = 'block';
    document.getElementById('descripcionRegistro').textContent = descripcion;
    let tabla = document.getElementById('camposRegistro')
    let tbody = document.getElementById('tbodyRegistro');
    console.log(id);
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