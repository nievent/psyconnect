<?php
function tablaLogros($logros, $id) {
    // Crear una tabla para mostrar los datos del JSON
    echo '<div id="div">';
    echo '<table id="registro-logros" class="registro-table">';
    echo '<thead><tr><th>Fecha</th><th>Nombre del Logro</th><th>Acciones Realizadas</th><th>Cómo me Siento (0-10)</th><th>Premio Obtenido</th><th>Operaciones</th></tr></thead>';
    echo '<tbody>';
    $rowCount = 0; // Contador de filas

    foreach($logros as $logro) {
        // Obtener id_registro e id_linea
        $idRegistro = $logro['id_registro'];
        $idLinea = $logro['id_linea'];
        $filaId = 'fila_' . $rowCount; // ID único para cada fila
        
        // Crear una fila de la tabla con atributos data y un ID único
        echo '<tr id="' . $filaId . '" class="editable-row" data-id-registro="' . $idRegistro . '" data-id-linea="' . $idLinea . '">';
        echo '<td contenteditable="true">' . $logro['fecha'] . '</td>';
        echo '<td contenteditable="true">' . $logro['que_he_logrado'] . '</td>';
        echo '<td contenteditable="true">' . $logro['acciones_realizadas'] . '</td>';
        echo '<td contenteditable="true">' . $logro['como_me_siento'] . '</td>';
        echo '<td contenteditable="true">' . $logro['premio_obtenido'] . '</td>';
        echo '<td><button class="borrar-btn" data-row="' . $rowCount . '"><i class="fas fa-trash"></i></button></td>';
        echo '</tr>';
        
        $rowCount++; // Incrementar el contador de filas
    }
    echo '</tbody>';
    echo '</table>';
    echo '<button id="agregarFilaBtn" data-id-registro="' . $idRegistro . '" data-id-linea="' . ($idLinea + 1) . '" data-tds="' . 4 . '" data-table-id="registro-logros">Agregar Fila</button>';
    echo '<button class="enviar-datos-btn" data-controller="editarRegistroLogros.php" data-table="registro-logros" data-id="' . $id . '">Enviar Datos</button>';
    echo '</div>';
}

function tablaSensaciones($sensaciones, $id) {
    // Crear una tabla para mostrar los datos del JSON
    echo '<div id="div">';
    echo '<table id="registro-sensaciones" class="registro-table">';
    echo '<thead><tr><th>Fecha</th><th>Ejercicio provocador</th><th>Número de repetición</th><th>Miedo máximo (0-10)</th><th>Acciones</th></tr></thead>';
    echo '<tbody>';
    $rowCount = 0; // Contador de filas

    // Recorrer los datos de sensaciones y generar las filas de la tabla
    foreach($sensaciones as $sensacion) {
        // Obtener id_registro e id_linea
        $idRegistro = $sensacion['id_registro'];
        $idLinea = $sensacion['id_linea'];
        $filaId = 'fila_' . $rowCount; // ID único para cada fila
        
        // Crear una fila de la tabla con atributos data y un ID único
        echo '<tr id="' . $filaId . '" class="editable-row" data-id-registro="' . $idRegistro . '" data-id-linea="' . $idLinea . '">';
        echo '<td contenteditable="true">' . $sensacion['fecha'] . '</td>';
        echo '<td contenteditable="true">' . $sensacion['ejercicio_provocador'] . '</td>';
        echo '<td contenteditable="true">' . $sensacion['numero_repeticion'] . '</td>';
        echo '<td contenteditable="true">' . $sensacion['miedo_maximo'] . '</td>';
        echo '<td><button class="borrar-btn" data-row="' . $rowCount . '"><i class="fas fa-trash"></i></button></td>';
        echo '</tr>';
        
        $rowCount++; // Incrementar el contador de filas
    }
    echo '</tbody>';
    echo '</table>';
    echo '<button id="agregarFilaBtn" data-id-registro="' . $idRegistro . '" data-id-linea="' . ($idLinea + 1) . '" data-tds="' . 3 . '" data-table-id="registro-sensaciones">Agregar Fila</button>';
    echo '<button class="enviar-datos-btn" data-controller="editarRegistroSensaciones.php" data-table="registro-sensaciones" data-id="' . $id . '">Enviar Datos</button>';
    echo '</div>';
}

function tablaEstadoAnimo($estadoAnimo, $id) {
    // Crear una tabla para mostrar los datos del JSON
    echo '<div id="div">';
    echo '<table id="registro-estadoAnimo" class="registro-table">';
    echo '<thead><tr><th>Fecha</th><th>Emociones</th><th>Grado de intensidad (0-10) </th><th>Sensaciones corporales</th><th>Operaciones</th></tr></thead>';
    echo '<tbody>';
    $rowCount = 0; // Contador de filas

    foreach($estadoAnimo as $estado) {
        // Obtener id_registro e id_linea
        $idRegistro = $estado['id_registro'];
        $idLinea = $estado['id_linea'];
        $filaId = 'fila_' . $rowCount; // ID único para cada fila
        
        // Crear una fila de la tabla con atributos data y un ID único
        echo '<tr id="' . $filaId . '" class="editable-row" data-id-registro="' . $idRegistro . '" data-id-linea="' . $idLinea . '">';
        echo '<td contenteditable="true">' . $estado['fecha'] . '</td>';
        echo '<td contenteditable="true">' . $estado['emociones'] . '</td>';
        echo '<td contenteditable="true">' . $estado['grado_intensidad'] . '</td>';
        echo '<td contenteditable="true">' . $estado['sensaciones_corporales'] . '</td>';
        echo '<td><button class="borrar-btn" data-row="' . $rowCount . '"><i class="fas fa-trash"></i></button></td>';
        echo '</tr>';
        
        $rowCount++; // Incrementar el contador de filas
    }
    echo '</tbody>';
    echo '</table>';
    echo '<button id="agregarFilaBtn" data-id-registro="' . $idRegistro . '" data-id-linea="' . ($idLinea + 1) . '" data-tds="' . 3 . '" data-table-id="registro-estadoAnimo">Agregar Fila</button>';
    echo '<button class="enviar-datos-btn" data-controller="editarRegistroEstadoAnimo.php" data-table="registro-estadoAnimo" data-id="' . $id . '">Enviar Datos</button>';
    echo '</div>';
}

function tablaPensamientos($pensamientos, $id) {
    // Crear una tabla para mostrar los datos del JSON
    echo '<div id="div">';
    echo '<table id="registro-pensamientos" class="registro-table">';
    echo '<thead><tr><th>Fecha</th><th>¿Qué ha sucedido?</th><th>¿Qué he pensado?</th><th>¿Cómo me he sentido?</th><th>¿Qué he hecho?</th><th>Operaciones</th></tr></thead>';
    echo '<tbody>';
    $rowCount = 0; // Contador de filas

    foreach($pensamientos as $pensamiento) {
        // Obtener id_registro e id_linea
        $idRegistro = $pensamiento['id_registro'];
        $idLinea = $pensamiento['id_linea'];
        $filaId = 'fila_' . $rowCount; // ID único para cada fila
        
        // Crear una fila de la tabla con atributos data y un ID único
        echo '<tr id="' . $filaId . '" class="editable-row" data-id-registro="' . $idRegistro . '" data-id-linea="' . $idLinea . '">';
        echo '<td contenteditable="true">' . $pensamiento['fecha'] . '</td>';
        echo '<td contenteditable="true">' . $pensamiento['que_ha_sucedido'] . '</td>';
        echo '<td contenteditable="true">' . $pensamiento['que_he_pensado'] . '</td>';
        echo '<td contenteditable="true">' . $pensamiento['como_me_he_sentido'] . '</td>';
        echo '<td contenteditable="true">' . $pensamiento['que_he_hecho'] . '</td>';
        echo '<td><button class="borrar-btn" data-row="' . $rowCount . '"><i class="fas fa-trash"></i></button></td>';
        echo '</tr>';
        
        $rowCount++; // Incrementar el contador de filas
    }
    echo '</tbody>';
    echo '</table>';
    echo '<button id="agregarFilaBtn" data-id-registro="' . $idRegistro . '" data-id-linea="' . ($idLinea + 1) . '" data-tds="' . 4 . '" data-table-id="registro-pensamientos">Agregar Fila</button>';
    echo '<button class="enviar-datos-btn" data-controller="editarRegistroPensamientos.php" data-table="registro-pensamientos" data-id="' . $id . '">Enviar Datos</button>';
    echo '</div>';
}


function tablaRelajacion($relajacion, $id) {
    // Crear una tabla para mostrar los datos del JSON
    echo '<div id="div">';
    echo '<table id="registro-relajacion" class="registro-table">';
    echo '<thead><tr><th>Fecha</th><th>Momento del día</th><th>Relajación conseguida (0-10) </th><th>Concentración conseguida (0-10)</th><th>Operaciones</th></tr></thead>';
    echo '<tbody>';
    $rowCount = 0; // Contador de filas

    foreach($relajacion as $relax) {
        // Obtener id_registro e id_linea
        $idRegistro = $relax['id_registro'];
        $idLinea = $relax['id_linea'];
        $filaId = 'fila_' . $rowCount; // ID único para cada fila
        
        // Crear una fila de la tabla con atributos data y un ID único
        echo '<tr id="' . $filaId . '" class="editable-row" data-id-registro="' . $idRegistro . '" data-id-linea="' . $idLinea . '">';
        echo '<td contenteditable="true">' . $relax['fecha'] . '</td>';
        echo '<td contenteditable="true">' . $relax['momento_dia'] . '</td>';
        echo '<td contenteditable="true">' . $relax['relajacion_conseguida'] . '</td>';
        echo '<td contenteditable="true">' . $relax['concentracion_conseguida'] . '</td>';
        echo '<td><button class="borrar-btn" data-row="' . $rowCount . '"><i class="fas fa-trash"></i></button></td>';
        echo '</tr>';
        
        $rowCount++; // Incrementar el contador de filas
    }
    echo '</tbody>';
    echo '</table>';
    echo '<button id="agregarFilaBtn" data-id-registro="' . $idRegistro . '" data-id-linea="' . ($idLinea + 1) . '" data-tds="' . 3 . '" data-table-id="registro-relajacion">Agregar Fila</button>';
    echo '<button class="enviar-datos-btn" data-controller="editarRegistroRelajacion.php" data-table="registro-relajacion" data-id="' . $id . '">Enviar Datos</button>';
    echo '</div>';
}
