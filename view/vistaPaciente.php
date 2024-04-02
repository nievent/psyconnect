<?php
require '../model/conexion.php';
require '../controller/paciente/controllerPaciente.php';
require '../controller/comun/controllerComun.php';

$bdd = new BD();
session_start();
if (!isset($_SESSION['paciente'])) {
    header("Location:../view/login.php");
    exit();
}
$mainValue = isset($_GET['main']) ? $_GET['main'] : 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/login/login.css">
    <link rel="stylesheet" href="./styles/estilos_comunes/comunes.css">
    <link rel="stylesheet" href="./styles/modals/modals.css">
    <link rel="stylesheet" href="./styles/paciente/paciente.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossOrigin="true" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&family=Madimi+One&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <title>Area Paciente</title>
    
</head>

<body>
<div id="backdrop" onclick="ocultarOverlay()"></div>
<div class="modal" id="detallesRegistros">
        <article><strong>Descripcion: </strong><span id="descripcionRegistro"></span></article>
        <article><strong>Campos: </strong></article>
        <article>
            <table>
                <thead>
                    <tr id="camposRegistro"></tr>
                </thead>
                <tbody id="tbodyRegistro">
                    
                </tbody>
            </table>
        </article>
    </div>

    <form class="modal" id="formularioEditar" action="?main=2" method="POST">
        <input type="hidden" id="inputLogrosJson" name="logros_json" value="">
    </form>


    <header>
        <div class="welcome">
            <img src="../view/img/logo-sin-fondo.png" alt="logo PsyConnect">
            <h1>Hola, <?php echo $_SESSION['paciente']->getNombre() ?>.</h1>
        </div>
        
        <div class="tooltip">
            <a href="../controller/logout.php" class="logout-button"><i class="fas fa-sign-out-alt"></i></a>
            <span class="tooltiptext">Cerrar sesión</span>
        </div>
        </div>
    </header>

            
    <nav class="menu">
        <div class="seccion">
            <a id="limpiarParametro" href="#" <?php echo ($mainValue == 0) ? 'class="active"' : ''; ?>>Registros</a>
        </div>
        <div class="seccion">
            <a href="?main=1" <?php echo ($mainValue == 1) ? 'class="active"' : ''; ?>>Notificar al psicólogo</a>
        </div>
    </nav>

    <?php
    if (isset($_GET['main'])) {
        $mainValue = $_GET['main'];
        switch ($mainValue) {
            case 1:
                break;
            case 2:
                if(isset($_POST['logros_json'])) {
                    // Decodificar el JSON recibido
                    $logros = json_decode($_POST['logros_json'], true);
                    
                    // Crear una tabla para mostrar los datos del JSON
                    echo '<div id="div">';
                    echo '<table id="registro">';
                    echo '<thead><tr><th>Fecha</th><th>Nombre del Logro</th><th>Acciones Realizadas</th><th>Cómo me Siento</th><th>Premio Obtenido</th></tr></thead>';
                    echo '<tbody>';
                    $rowCount = 0; // Contador de filas
                    foreach($logros as $logro) {
                        // Obtener id_registro e id_linea
                        $idRegistro = $logro['id_registro'];
                        $idLinea = $logro['id_linea'];
                        
                        // Crear una fila de la tabla con atributos data
                        echo '<tr class="editable-row" data-id-registro="' . $idRegistro . '" data-id-linea="' . $idLinea . '">';
                        echo '<td contenteditable="true">' . $logro['fecha'] . '</td>';
                        echo '<td contenteditable="true">' . $logro['que_he_logrado'] . '</td>';
                        echo '<td contenteditable="true">' . $logro['acciones_realizadas'] . '</td>';
                        echo '<td contenteditable="true">' . $logro['como_me_siento'] . '</td>';
                        echo '<td contenteditable="true">' . $logro['premio_obtenido'] . '</td>';
                        echo '</tr>';
                        
                        // Actualizar las variables con el id de la última fila
                        $idRegistroLast = $idRegistro;
                        $idLineaLast = $idLinea;
                        $rowCount++; // Incrementar el contador de filas
                    }
                    echo '</tbody>';
                    echo '</table>';
                    echo '<button id="agregarFilaBtn" data-id-registro="' . $idRegistroLast . '" data-id-linea="' . ($idLineaLast + 1) . '">Agregar Fila</button>';
                    echo '<button id="enviarDatos">Enviar Datos</button>';
                    echo '</div>';
                } else {
                    // Si no se proporcionó un JSON, mostrar un mensaje de error
                    echo '<div id="div">No se recibieron datos para mostrar.</div>';
                }
                
                
                break;
        }
    } else {
        registrosAsignados($bdd, $_SESSION['paciente']->getId(), false);
    }
    ?>
    <script src="../controller/JS/comunes.js"></script>
    <script src="../controller/JS/modals.js"></script>
    <script src="../controller/JS/paciente.js"></script>
</body>

</html>