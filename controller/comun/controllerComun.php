<?php
require '../model/psicologo.php';
require '../model/paciente.php';
require '../model/registro.php';
require '../model/pensamientos.php';
require '../model/relajacion_muscular.php';
require '../model/estado_animo.php';
require '../model/logros.php';
require '../model/sensaciones_corporales.php';
require '../model/comentario.php';


//funcion para crear la tabla de registros asignados, tanto a pacientes en especifico como la tabla que ve el psicologo.
function registrosAsignados($bdd, $id, $psicologo) {
    $paciente = Paciente::verRegistrosAsignados($bdd->link, $id);
    //creo la tabla
    echo <<<HTML
            <table class="principal_table">
            <thead>
                <tr>
                    <th>Titulo registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
        HTML;
    while($fila = $paciente->fetch(PDO::FETCH_ASSOC)){
        echo <<<HTML
                <tr>
                    <td>$fila[titulo]</td>
            HTML;
            //pongo los campos segun el tipo de registro
        switch ($fila["id_tipo_reg"]) {
            case 1:
                //convierto a json para poder enviarlo al js y trabajar con el
                $relajacion = Relajacion_muscular::getAllById($bdd->link, $fila["id"])->fetchAll(PDO::FETCH_ASSOC);
                $relajacion_json = json_encode($relajacion);
                echo '<td>
                <div class="tooltip">  
                    <a href="#" onclick="detallesRegistroTipo(\'' . htmlspecialchars($relajacion_json) . '\' , 1, \''.$fila["descripcion"] . '\')">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                <span class="tooltiptext">Detalles</span></div>';
                //pongo los botones del psicologo
                if ($psicologo) {
                    echo '<div class="tooltip">  
                            <a href="#" onclick="confirmarBajaRegistro(\''.$fila['id']. '\',1)">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                            <span class="tooltiptext">Borrar registro</span>
                          </div>';
                } else {
                    //pongo los botones del paciente
                    echo '<div class="tooltip">  
                            <a href="#" onclick="editarRelajacion(\'' . htmlspecialchars($relajacion_json) . '\' , \''.$fila["descripcion"] . '\')">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <span class="tooltiptext">Editar registro</span>
                          </div>';
                }
                break;
                //mismo proceso con todos.
            case 2:
                $pensamientos = Pensamientos::getAllById($bdd->link, $fila["id"])->fetchAll(PDO::FETCH_ASSOC);
                $pensamientos_json = json_encode($pensamientos);
                echo '<td>
                    <div class="tooltip">  
                        <a href="#" onclick="detallesRegistroTipo(\'' . htmlspecialchars($pensamientos_json) . '\' , 2, \''.$fila["descripcion"] . '\')">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <span class="tooltiptext">Detalles</span>
                    </div>';
                    if ($psicologo) {
                        echo '<div class="tooltip">  
                                <a href="#" onclick="confirmarBajaRegistro(\''.$fila['id']. '\',1)">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <span class="tooltiptext">Borrar registro</span>
                              </div>';
                    } else {
                        echo '<div class="tooltip">  
                                <a href="#" onclick="editarPensamiento(\'' . htmlspecialchars($pensamientos_json) . '\' , \''.$fila["descripcion"] . '\')">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <span class="tooltiptext">Editar registro</span>
                              </div>';
                    }
                break;
            case 3:
                $estado_animo = Estado_animo::getAllById($bdd->link, $fila["id"])->fetchAll(PDO::FETCH_ASSOC);
                $estado_animo_json = json_encode($estado_animo);
                echo '<td>
                <div class="tooltip">  
                    <a href="#" onclick="detallesRegistroTipo(\'' . htmlspecialchars($estado_animo_json) . '\' , 3, \''.$fila["descripcion"] . '\')">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                <span class="tooltiptext">Detalles</span></div>';
                if ($psicologo) {
                    echo '<div class="tooltip">  
                            <a href="#" onclick="confirmarBajaRegistro(\''.$fila['id']. '\',1)">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                            <span class="tooltiptext">Borrar registro</span>
                          </div>';
                } else {
                    echo '<div class="tooltip">  
                            <a href="#" onclick="editarEstadoAnimo(\'' . htmlspecialchars($estado_animo_json) . '\' , \''.$fila["descripcion"] . '\')">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <span class="tooltiptext">Editar registro</span>
                          </div>';
                }
                break;
            case 4:
                $logros = Logros::getAllById($bdd->link, $fila["id"])->fetchAll(PDO::FETCH_ASSOC); 
                $logros_json = json_encode($logros);
                echo '<td>
                <div class="tooltip">  
                    <a href="#" onclick="detallesRegistroTipo(\'' . htmlspecialchars($logros_json) . '\' , 4, \''.$fila["descripcion"] . '\')">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                <span class="tooltiptext">Detalles</span></div>';
                if ($psicologo) {
                    echo '<div class="tooltip">  
                            <a href="#" onclick="confirmarBajaRegistro(\''.$fila['id']. '\',1)">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                            <span class="tooltiptext">Borrar registro</span>
                          </div>';
                } else {
                    echo '<div class="tooltip">  
                    <a href="#" onclick="editarLogros(\'' . htmlspecialchars($logros_json) . '\' , \''.$fila["descripcion"] . '\')">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <span class="tooltiptext">Editar registro</span>
                  </div>';            
                }
                break;
            case 5:
                $sensaciones_corporales = Sensaciones_corporales::getAllById($bdd->link, $fila["id"])->fetchAll(PDO::FETCH_ASSOC);
                $sensaciones_corporales_json = json_encode($sensaciones_corporales);
                echo '<td>
                <div class="tooltip"> 
                    <a href="#" onclick="detallesRegistroTipo(\'' . htmlspecialchars($sensaciones_corporales_json) . '\' , 5, \''.$fila["descripcion"] . '\')">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                <span class="tooltiptext">Detalles</span> </div>';
                if ($psicologo) {
                    echo '<div class="tooltip">  
                            <a href="#" onclick="confirmarBajaRegistro(\''.$fila['id']. '\',1)">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                            <span class="tooltiptext">Borrar registro</span>
                          </div>';
                } else {
                    echo '<div class="tooltip">  
                    <a href="#" onclick="editarSensaciones(\'' . htmlspecialchars($sensaciones_corporales_json) . '\' , \''.$fila["descripcion"] . '\')">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <span class="tooltiptext">Editar registro</span>
                          </div>';
                }
                
                break;
            default: 
                echo '<div>
                    <div class="tooltip">  <a><i class="fa-solid fa-eye"></i></a>
                    <span class="tooltiptext">Detalles</span> </div>
                    <div class="tooltip">  <a href="#" onclick="confirmarBajaRegistro(\''.$fila['id']. '\')"><i class="fa-solid fa-trash"></i></a>
                    <span class="tooltiptext">Borrar registro</span> </div>';
        }

        echo '</td>';
    } 
}