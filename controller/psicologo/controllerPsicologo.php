<?php 
require '../model/psicologo.php';
require '../model/paciente.php';
require '../model/registro.php';
require '../model/pensamientos.php';

function listarPacientes($bdd, $id) {
    $pacientes = Paciente::getAllById($bdd->link, $id);
    while ($fila = $pacientes->fetch(PDO::FETCH_ASSOC)) {
        echo '<article class="fila">';
        echo '<div class="pacientes">'. $fila['nombre']. " " . $fila['apellidos'] .'</div>';
        echo '<div>
        <div class="tooltip">  <a onclick="mostrarDetalles(\''. $fila['nombre'] .'\', \''. $fila['apellidos'] .'\', \''. $fila['email'] .'\', \''. $fila['dni'] .'\')"><i class="fa-solid fa-eye"></i></a>
        <span class="tooltiptext">Detalles</span> </div>
        <div class="tooltip"><a href="?main=4&id='. $fila['id']. '"><i class="fas fa-file-alt"></i></a>
        <span class="tooltiptext">Ver registros</span> </div>
        <div class="tooltip"><a onclick="mostrarAsignarRegistro(\''.$fila['id']. '\')"><i class="fas fa-file"></i><i class="fas fa-plus"></i></a>
        <span class="tooltiptext">Asignar registro</span> </div>
        <div class="tooltip"><a href="#" onclick="confirmarBajaUsuario(\''.$fila['id']. '\')"><i class="fas fa-user-times"></i></a>
        <span class="tooltiptext">Dar de baja</span> </div>
        </div>';
        echo '<td></td>';
        echo '</article>';
    }
}

function listarRegistros($bdd) {
    $registros = Registro::getAllTipos($bdd->link);
    while($fila = $registros->fetch(PDO::FETCH_ASSOC)) {
        echo '<article class="fila">
                <div class=pacientes">' .  $fila["titulo"] . ' </div>
                <div>
                <div class="tooltip">  <a onclick="mostrarDetallesRegistro(\''.$fila["descripcion"] . '\', \''.$fila["id"] . '\')"><i class="fa-solid fa-eye"></i></a>
                <span class="tooltiptext">Detalles</span> </div>
                </div>
            </article>';
    }
}

function selectTiposRegistros($bdd) {
    $registros = Registro::getAllTipos($bdd->link);
    while($fila = $registros->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value='" . $fila["id"] . "'> ". $fila["titulo"] ."</option>";
    }
}

function introPaciente($bdd, $id_paciente) {
    $paciente = Paciente::getPacienteByID($bdd->link, $id_paciente);
    $datosPaciente = $paciente->fetch(PDO::FETCH_ASSOC);
    echo "<h1>Registros de " . $datosPaciente["nombre"]."</h1>";
}

function registrosAsignados($bdd, $id) {
    $paciente = Paciente::verRegistrosAsignados($bdd->link, $id);
    while($fila = $paciente->fetch(PDO::FETCH_ASSOC)){
        echo '<article class="fila">
        <div class=pacientes">' .  $fila["titulo"] . ' </div>';
        switch ($fila["id_tipo_reg"]) {
            case 1:
                echo '<div>
                <div class="tooltip">  <a><i class="fa-solid fa-eye"></i></a>
                <span class="tooltiptext">Detalles</span></div>';
                break;
            case 2:
                $pensamientos = Pensamientos::getAllById($bdd->link, $fila["id"])->fetchAll(PDO::FETCH_ASSOC);
                $pensamientos_json = json_encode($pensamientos);
                echo '<div>
                    <div class="tooltip">  
                        <a href="#" onclick="detallesRegistroTipo(\'' . htmlspecialchars($pensamientos_json) . '\' , \''.$fila["descripcion"] . '\')">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <span class="tooltiptext">Detalles</span>
                    </div>';
                break;
            case 3:
                echo '<div>
                <div class="tooltip">  <a ><i class="fa-solid fa-eye"></i></a>
                <span class="tooltiptext">Detalles</span></div>';
                break;
            case 4: 
                echo '<div>
                <div class="tooltip">  <a><i class="fa-solid fa-eye"></i></a>
                <span class="tooltiptext">Detalles</span></div>';;
                break;
            case 5:
                echo '<div>
                <div class="tooltip">  <a><i class="fa-solid fa-eye"></i></a>
                <span class="tooltiptext">Detalles</span> </div>';
                break;
            default: 
                echo '<div>
                    <div class="tooltip">  <a><i class="fa-solid fa-eye"></i></a>
                    <span class="tooltiptext">Detalles</span> </div>';
        }

        echo '<div class="tooltip">  <a href="#" onclick="confirmarBajaRegistro(\''.$fila['id']. '\')"><i class="fa-solid fa-trash"></i></a>
        <span class="tooltiptext">Borrar registro</span> </div>
    </article>';
    } 
}

?>