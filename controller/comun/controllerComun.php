<?php
require '../model/psicologo.php';
require '../model/paciente.php';
require '../model/registro.php';
require '../model/pensamientos.php';
require '../model/relajacion_muscular.php';
require '../model/estado_animo.php';
require '../model/logros.php';
require '../model/sensaciones_corporales.php';

function registrosAsignados($bdd, $id) {
    $paciente = Paciente::verRegistrosAsignados($bdd->link, $id);
    while($fila = $paciente->fetch(PDO::FETCH_ASSOC)){
        echo '<article class="fila">
        <div class=pacientes">' .  $fila["titulo"] . ' </div>';
        switch ($fila["id_tipo_reg"]) {
            case 1:
                $relajacion = Relajacion_muscular::getAllById($bdd->link, $fila["id"])->fetchAll(PDO::FETCH_ASSOC);
                $relajacion_json = json_encode($relajacion);
                echo '<div>
                <div class="tooltip">  
                    <a href="#" onclick="detallesRegistroTipo(\'' . htmlspecialchars($relajacion_json) . '\' , 1, \''.$fila["descripcion"] . '\')">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                <span class="tooltiptext">Detalles</span></div>
                <div class="tooltip">  <a href="#" onclick="confirmarBajaRegistro(\''.$fila['id']. '\',1)"><i class="fa-solid fa-trash"></i></a>
                <span class="tooltiptext">Borrar registro</span> </div>';
                break;
            case 2:
                $pensamientos = Pensamientos::getAllById($bdd->link, $fila["id"])->fetchAll(PDO::FETCH_ASSOC);
                $pensamientos_json = json_encode($pensamientos);
                echo '<div>
                    <div class="tooltip">  
                        <a href="#" onclick="detallesRegistroTipo(\'' . htmlspecialchars($pensamientos_json) . '\' , 2, \''.$fila["descripcion"] . '\')">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <span class="tooltiptext">Detalles</span>
                    </div>
                    <div class="tooltip">  <a href="#" onclick="confirmarBajaRegistro(\''.$fila['id']. '\',2)"><i class="fa-solid fa-trash"></i></a>
                    <span class="tooltiptext">Borrar registro</span> </div>';
                break;
            case 3:
                $estado_animo = Estado_animo::getAllById($bdd->link, $fila["id"])->fetchAll(PDO::FETCH_ASSOC);
                $estado_animo_json = json_encode($estado_animo);
                echo '<div>
                <div class="tooltip">  
                    <a href="#" onclick="detallesRegistroTipo(\'' . htmlspecialchars($estado_animo_json) . '\' , 3, \''.$fila["descripcion"] . '\')">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                <span class="tooltiptext">Detalles</span></div>
                <div class="tooltip">  <a href="#" onclick="confirmarBajaRegistro(\''.$fila['id']. '\', 3)"><i class="fa-solid fa-trash"></i></a>
                <span class="tooltiptext">Borrar registro</span> </div>';
                break;
            case 4:
                $logros = Logros::getAllById($bdd->link, $fila["id"])->fetchAll(PDO::FETCH_ASSOC); 
                $logros_json = json_encode($logros);
                echo '<div>
                <div class="tooltip">  
                    <a href="#" onclick="detallesRegistroTipo(\'' . htmlspecialchars($logros_json) . '\' , 4, \''.$fila["descripcion"] . '\')">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                <span class="tooltiptext">Detalles</span></div>
                <div class="tooltip">  <a href="#" onclick="confirmarBajaRegistro(\''.$fila['id']. '\', 4)"><i class="fa-solid fa-trash"></i></a>
                <span class="tooltiptext">Borrar registro</span> </div>';
                break;
            case 5:
                $sensaciones_corporales = Sensaciones_corporales::getAllById($bdd->link, $fila["id"])->fetchAll(PDO::FETCH_ASSOC);
                $sensaciones_corporales_json = json_encode($sensaciones_corporales);
                echo '<div>
                <div class="tooltip"> 
                    <a href="#" onclick="detallesRegistroTipo(\'' . htmlspecialchars($sensaciones_corporales_json) . '\' , 5, \''.$fila["descripcion"] . '\')">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                <span class="tooltiptext">Detalles</span> </div>
                <div class="tooltip">  <a href="#" onclick="confirmarBajaRegistro(\''.$fila['id']. '\', 5)"><i class="fa-solid fa-trash"></i></a>
                <span class="tooltiptext">Borrar registro</span> </div>';
                
                break;
            default: 
                echo '<div>
                    <div class="tooltip">  <a><i class="fa-solid fa-eye"></i></a>
                    <span class="tooltiptext">Detalles</span> </div>
                    <div class="tooltip">  <a href="#" onclick="confirmarBajaRegistro(\''.$fila['id']. '\')"><i class="fa-solid fa-trash"></i></a>
                    <span class="tooltiptext">Borrar registro</span> </div>';
        }

        echo '</article>';
    } 
}