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
    <link rel="stylesheet" href="./styles/modals/modals.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossOrigin="true" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&family=Madimi+One&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./styles/paciente/paciente.css">
    <link rel="stylesheet" href="./styles/estilos_comunes/comunes.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <title>Area Paciente</title>

</head>

<body>
<?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 1) {
            echo "<script>alert('No se puede enviar un registro vacio.');</script>";
        }  else if ($_GET['error'] == 2) {
            echo "<script>alert('La contraseña antigua es incorrecta');</script>";
        } 
    }
?>
    <div id="backdrop" onclick="ocultarOverlay()"></div>
    <div class="modal" id="detallesRegistros">
        <article>
            <p><strong>Descripcion: </strong></p>
            <p><span id="descripcionRegistro"></span></p>
        </article>
        <article>
            <p><strong>Campos:</strong></p>
        </article>
        <article>
            <table>
                <thead>
                    <tr id="camposRegistro">
                        </tr>
                    </thead>
                    <tbody id="tbodyRegistro">
                        
                        </tbody>
                    </table>
                </article>
            </div>

    <form class="modal" id="formularioEditarLogros" action="?main=2" method="POST">
        <input type="hidden" id="inputLogrosJson" name="logros_json" value="">
        <input type="hidden" id="descripcionLogros" name="descripcion_logros" value="">
    </form>

    <form class="modal" id="formularioEditarSensaciones" action="?main=3" method="POST">
        <input type="hidden" id="inputSensacionesJson" name="sensaciones_json" value="">
        <input type="hidden" id="descripcionSensaciones" name="descripcion_sensaciones" value="">
    </form>

    <form class="modal" id="formularioEditarEstadoAnimo" action="?main=4" method="POST">
        <input type="hidden" id="inputEstadoAnimoJson" name="estadoAnimo_json" value="">
        <input type="hidden" id="descripcionEstadoAnimo" name="descripcion_estadoAnimo" value="">
    </form>

    <form class="modal" id="formularioEditarPensamiento" action="?main=5" method="POST">
        <input type="hidden" id="inputPensamientoJson" name="pensamiento_json" value="">
        <input type="hidden" id="descripcionPensamiento" name="descripcion_pensamiento" value="">
    </form>

    <form class="modal" id="formularioEditarRelajacion" action="?main=6" method="POST">
        <input type="hidden" id="inputRelajacionJson" name="relajacion_json" value="">
        <input type="hidden" id="descripcionRelajacion" name="descripcion_relajacion" value="">
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
        <div class="seccion">
            <a href="?main=7" <?php echo ($mainValue == 7) ? 'class="active"' : ''; ?>>Perfil</a>
        </div>
    </nav>

    <main>

    <div class="menu-toggle">
        <i class="fas fa-bars"></i> <!-- Icono de hamburguesa -->
    </div>

    <ul class="mobile-menu">
        <li><a id="limpiarParametro2" href="#" <?php echo ($mainValue == 0) ? 'class="active"' : ''; ?>>Registros</a></li>
        <li><a href="?main=1" <?php echo ($mainValue == 1) ? 'class="active"' : ''; ?>>Notificar al psicólogo</a></li>
        <li><a href="?main=7" <?php echo ($mainValue == 7) ? 'class="active"' : ''; ?>>Perfil</a></li>
    </ul>

    <?php
    if (isset($_GET['main'])) {
        $mainValue = $_GET['main'];
        switch ($mainValue) {
            case 1:
                echo <<<HTML
                <h1 class="titulo">Ponte en contacto con tu terapeuta</h1>
                <form action="../controller/paciente/enviarComentario.php" method="POST" class="comentarios">
                    <input type="number" name="id_paciente" value="{$_SESSION['paciente']->getId()}" hidden>
                    <input type="number" name="id_psicologo" value="{$_SESSION['paciente']->getIdPsicologo()}" hidden>
                    <label for="comentario">Escribe aquí tu notificación</label>
                    <textarea name="comentario" id="comentario" cols="30" rows="10"></textarea>
                    <button type="submit">Enviar comentario</button>
                </form>
                HTML;
                break;
            case 2:
                if (isset($_POST['logros_json'])) {
                    echo <<<HTML
                        <h1 class="titulo">Registro de Logros</h1>
                        <div class="descripcion"> $_POST[descripcion_logros] </div>
                        <div class="descripcion">Pulsa en las celdas de la tabla para añadir o editar información</div>
                    HTML;
                    $logros = json_decode($_POST['logros_json'], true);
                    tablaLogros($logros, $_SESSION['paciente']->getId());
                } else {
                    // Si no se proporcionó un JSON, mostrar un mensaje de error
                    echo '<div id="div">No se recibieron datos para mostrar.</div>';
                }
                break;
            case 3:
                if (isset($_POST['sensaciones_json'])) {
                    echo <<<HTML
                    <h1 class="titulo">Registro del afrontamiento de sensaciones corporales</h1>
                    <div class="descripcion"> $_POST[descripcion_sensaciones] </div>
                    <div class="descripcion">Pulsa en las celdas de la tabla para añadir o editar información</div>
                HTML;
                    $sensaciones = json_decode($_POST['sensaciones_json'], true);
                    tablaSensaciones($sensaciones, $_SESSION['paciente']->getId());
                } else {
                    // Si no se proporcionó un JSON, mostrar un mensaje de error
                    echo '<div id="div">No se recibieron datos para mostrar.</div>';
                }
                break;
            case 4:
                if (isset($_POST['estadoAnimo_json'])) {
                    echo <<<HTML
                    <h1 class="titulo">Registro de estado de ánimo</h1>
                    <div class="descripcion"> $_POST[descripcion_estadoAnimo] </div>
                    <div class="descripcion">Pulsa en las celdas de la tabla para añadir o editar información</div>
                HTML;
                    $estadoAnimo = json_decode($_POST['estadoAnimo_json'], true);
                    tablaEstadoAnimo($estadoAnimo, $_SESSION['paciente']->getId());
                } else {
                    // Si no se proporcionó un JSON, mostrar un mensaje de error
                    echo '<div id="div">No se recibieron datos para mostrar.</div>';
                }
                break;
            case 5:
                if (isset($_POST['pensamiento_json'])) {
                    echo <<<HTML
                    <h1 class="titulo">Registro de logros</h1>
                    <div class="descripcion"> $_POST[descripcion_pensamiento] </div>
                    <div class="descripcion">Pulsa en las celdas de la tabla para añadir o editar información</div>
                HTML;
                    $pensamientos = json_decode($_POST['pensamiento_json'], true);
                    tablaPensamientos($pensamientos, $_SESSION['paciente']->getId());
                } else {
                    // Si no se proporcionó un JSON, mostrar un mensaje de error
                    echo '<div id="div">No se recibieron datos para mostrar.</div>';
                }
                break;
            case 6:
                if (isset($_POST['relajacion_json'])) {
                    echo <<<HTML
                    <h1 class="titulo">Registro para la práctica de la relajación muscular</h1>
                    <div class="descripcion"> $_POST[descripcion_relajacion] </div>
                    <div class="descripcion">Pulsa en las celdas de la tabla para añadir o editar información</div>
                HTML;
                    $relajacion = json_decode($_POST['relajacion_json'], true);
                    tablaRelajacion($relajacion, $_SESSION['paciente']->getId());
                } else {
                    // Si no se proporcionó un JSON, mostrar un mensaje de error
                    echo '<div id="div">No se recibieron datos para mostrar.</div>';
                }
                break;
            case 7:
                echo <<<HTML
                <form id="perfilForm" action="../controller/paciente/editarPaciente.php" method="POST">
                <h1 class='introPaciente'>Tu perfil:</h1>
                <img src="./img/logo-sin-fondo.png" alt="logo psyconnect">
                <input type="hidden" name="id" value="{$_SESSION['paciente']->getId()}">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value="{$_SESSION['paciente']->getNombre()}" disabled>
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" value="{$_SESSION['paciente']->getApellidos()}" disabled>
                <label for="mail">Correo electrónico:</label>
                <input type="email" name="email" value="{$_SESSION['paciente']->getEmail()}" disabled>
                <label for="dni">DNI:</label>
                <input type="text" name="dni" value="{$_SESSION['paciente']->getDni()}" disabled>
                
                
                <div id="contraseñaFields" style="display: none;">
                    <label for="contraseñaAntigua">Contraseña Antigua:</label>
                    <input type="password" id="viejaPwd" value="" name="oldPassword" autocomplete="off">
                    <label for="contraseñaNueva">Contraseña Nueva:</label>
                    <input type="password" value="" name="newPassword" autocomplete="off">
                </div>

                
                <button id="cambiarContraseña" style="display: none;" class='btn' type="button">Cambiar Contraseña</button>
                <button id="editarPerfil" class='btn' type="button">Editar Perfil</button>
                <button id="guardarPerfil" class='enviarBtn' type="submit" style="display: none;">Guardar Perfil</button>
            </h1>
        HTML;
        break;
        }
    } else {
        registrosAsignados($bdd, $_SESSION['paciente']->getId(), false);
    }
    ?>
    </main>
    <script src="../controller/JS/comunes.js"></script>
    <script src="../controller/JS/modals.js"></script>
    <script src="../controller/JS/paciente.js"></script>
</body>

</html>