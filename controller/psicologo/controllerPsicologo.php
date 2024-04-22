<?php 

//funcion para mostrar los pacientes.
function listarPacientes($bdd, $id) {
    $pacientes = Paciente::getAllById($bdd->link, $id);
    echo <<<HTML
    <table class="principal_table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
    HTML;
    while ($fila = $pacientes->fetch(PDO::FETCH_ASSOC)) {
        echo <<<HTML
            <tr>
                <td>$fila[nombre]</td>
                <td>$fila[apellidos]</td>
                <td>$fila[email]</td>
                <td>
                    <div class="tooltip"> 
                        <a onclick="mostrarDetalles('{$fila['nombre']}', '{$fila['apellidos']}', '{$fila['email']}', '{$fila['dni']}')">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <span class="tooltiptext">Detalles</span> </div>
                    </div>
                    <div class="tooltip">
                        <a href="?main=4&id={$fila['id']}"><i class="fas fa-file-alt"></i></a>
                        <span class="tooltiptext">Ver registros</span> 
                    </div>
                    <div class="tooltip">
                        <a onclick="mostrarAsignarRegistro('{$fila['id']}')"><i class="fa-solid fa-file-circle-plus"></i></a>
                        <span class="tooltiptext">Asignar registro</span> 
                    </div>
                    <div class="tooltip">
                        <a href="#" onclick="confirmarBajaUsuario('{$fila['id']}')"><i class="fas fa-user-times"></i></a>
                        <span class="tooltiptext">Dar de baja</span> 
                    </div>
                </td>
            </tr>
        HTML;
    }
    echo <<<HTML
            </tbody>
            </table>
        HTML;
}

//funcion para mostrar los registros
function listarRegistros($bdd) {
    $registros = Registro::getAllTipos($bdd->link);
    echo <<<HTML
    <table class="principal_table">
        <thead>
            <tr>
                <th>Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
    HTML;
    while($fila = $registros->fetch(PDO::FETCH_ASSOC)) {
        echo <<<HTML
            <tr>
                <td> $fila[titulo]</td>
                <td>
                    <div class="tooltip">  <a onclick="mostrarDetallesRegistro('{$fila['descripcion']}', '{$fila['id']}')"><i class="fa-solid fa-eye"></i></a>
                    <span class="tooltiptext">Detalles</span> </div>
                </td>
        HTML;
    }
}

//el select para asignar registros
function selectTiposRegistros($bdd) {
    $registros = Registro::getAllTipos($bdd->link);
    while($fila = $registros->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value='" . $fila["id"] . "'> ". $fila["titulo"] ."</option>";
    }
}

//una funcion para conseguir el nombre del paciente
function introPaciente($bdd, $id_paciente) {
    $paciente = Paciente::getPacienteByID($bdd->link, $id_paciente);
    $datosPaciente = $paciente->fetch(PDO::FETCH_ASSOC);
    echo "<h1 class='introPaciente'>Registros de " . $datosPaciente["nombre"]."</h1>";
}

//funcion para enseñar los comentarios que no estan vistos
function comentariosPendientes($bdd, $id) {
    $comentarios = Comentario::getAllById($bdd->link, $id);
    while ($fila = $comentarios->fetch(PDO::FETCH_ASSOC)) {
        echo "<article class='fila'>";
        echo "<div class='pacientes'><span><strong>" . $fila['nombre'] . " " . $fila['apellidos'] . "</strong>:</span> " . $fila["comentario"] . "</div>";
        echo '<div>
        <div class="tooltip">  <a href="../controller/psicologo/verComentario.php?id=' . $fila['id'] . ' "><i class="fas fa-check-circle"></i></a>
        <span class="tooltiptext">Marcar como leído</span> </div>
        </div> </article>';
    }
}

//para mostrar los que sí estan vistos.
function historialComentarios($bdd, $id) {
    $comentarios = Comentario::getAllDeletedById($bdd->link, $id);
    while ($fila = $comentarios->fetch(PDO::FETCH_ASSOC)) {
        echo "<article class='fila'>";
        echo "<div class='pacientes'><span><strong>" . $fila['nombre'] . " " . $fila['apellidos'] . "</strong>:</span> " . $fila["comentario"] . "</div>";
        echo '</article>';
    }
}



?>