<?php
require '../model/conexion.php';
require '../controller/psicologo/controllerPsicologo.php';

$bdd = new BD();
session_start();
if (!isset($_SESSION["psicologo"])) {
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
    <link rel="stylesheet" href="./styles/psicologo/psicologo.css">
    <link rel="stylesheet" href="./styles/modals/modals.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossOrigin="true" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&family=Madimi+One&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <title>Area Psicólogo</title>
    <script src="../controller/JS/modals.js"></script>
</head>

<body>
    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 1) {
            echo "<script>alert('No se puede eliminar a un paciente con registros asignados.');</script>";
        } else if ($_GET['error'] == 2) {
            echo "<script>alert('El paciente ya existe');</script>";
        }
    }
    ?>

    <div id="backdrop" onclick="ocultarOverlay()"></div>

    <div class="modal" id="detalles">
        <h2>Detalles del Cliente:</h2>
        <div class="form-control">
            <div class="detalles-text">Nombre: <span id="detallesNombre"></span></div>
            <div class="detalles-text">Apellidos: <span id="detallesApellidos"></span></div>
            <div class="detalles-text">Email: <span id="detallesEmail"></span></div>
            <div class="detalles-text">DNI: <span id="detallesDni"></span></div>
            <button type="reset" class="btn" onclick="ocultarOverlay()">Salir</button>
        </div>
    </div>

    <div class="modal" id="detallesRegistros">
        <article><strong>Descripcion: </strong><span id="descripcionRegistro"></span></article>
        <article><strong>Campos: </strong></article>
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

    <div class="modal" id="asignarRegistro">
        <form action="../controller/psicologo/asignarRegistro.php" method="POST">
            <input type="text" name="id_paciente" id="idPacienteAR" hidden>
            <label for="tipo_reg">Selecciona el registro que quieres asignar:</label>
            <select name="tipo_reg" id="tipo_reg">
                <?php
                selectTiposRegistros($bdd);
                ?>
            </select>
            <button class="btn" type="submit" name="asignarReg">Asignar registro</button>
            <button class="cancelBtn" type="reset" onclick="ocultarOverlay()">Cancelar</button>
        </form>
    </div>


    <header>
        <div class="welcome">
            <img src="../view/img/logo-sin-fondo.png" alt="logo PsyConnect">
            <h1>Hola, <?php echo $_SESSION['psicologo']->getNombre() ?>.</h1>
        </div>
        <div class="tooltip">
            <a href="../controller/logout.php" class="logout-button"><i class="fas fa-sign-out-alt"></i></a>
            <span class="tooltiptext">Cerrar sesión</span>
        </div>
        </div>
    </header>
    <nav class="menu">
    <div class="seccion">
        <a id="limpiarParametro" href="#" <?php echo ($mainValue == 0) ? 'class="active"' : ''; ?>>Inicio</a>
    </div>
    <div class="seccion">
        <a href="?main=1" <?php echo ($mainValue == 1) ? 'class="active"' : ''; ?>>Pacientes</a>
    </div>
    <div class="seccion">
        <a href="?main=2" <?php echo ($mainValue == 2) ? 'class="active"' : ''; ?>>Registros</a>
    </div>
    <div class="seccion">
        <a href="?main=3" <?php echo ($mainValue == 3) ? 'class="active"' : ''; ?>>Dar de alta</a>
    </div>
</nav>


        <?php
        if (isset($_GET['main'])) {
            $mainValue = $_GET['main'];
            switch ($mainValue) {
                case 1:
                    echo <<<HTML
            <section class='lista-pacientes'>
                <h1>Pacientes:</h1>
            HTML;
                    listarPacientes($bdd, $_SESSION['psicologo']->getId());
                    break;
                case 2:
                    listarRegistros($bdd);
                    break;
                    case 3:
                        echo <<<HTML
                            <form method='post' action='../controller/psicologo/insertarPaciente.php'>
                                <label for="nombre">Nombre del paciente:</label>
                                <input type="text" name="nombre" required>
                                <input type="text" name="id_psicologo" value="{$_SESSION['psicologo']->getID()}" hidden> 
                                <label for="apellidos">Apellidos del paciente:</label>
                                <input type="text" name="apellidos" required>
                                <label for="dni">DNI del paciente:</label>
                                <input type="text" name="dni">
                                <label for="mail">Correo electrónico:</label>
                                <input type="email" name="email" required>
                                <label for="pwd">Contraseña:</label>
                                <input type="password" name="pwd" id="pwd" required>
                                <button type="submit" class="btn">Dar de alta</button>
                            </form>
                        HTML;
                        break;
                    
                case 4:
                    introPaciente($bdd, $_GET["id"]);
                    registrosAsignados($bdd, $_GET["id"]);
                    break;
                default:
                    header("Location:./vistaPsicologo.php");
                    break;
            }
        } else {
        ?>
            <section class="inicio">
                <article class="articulo-inicio">
                    <h1>Registros sin ver</h1>
                </article>
                <article class="articulo-inicio">
                    <h1>Registros pendientes</h1>
                </article>
                <article class="articulo-inicio">
                    <h1>Notificaciones</h1>
                </article>
                <article class="articulo-inicio">
                    <h1>Avisar</h1>
                </article>
            <?php } ?>
            </section>


    </main>
    <script src="../controller/JS/psicologo.js"></script>
</body>

</html>