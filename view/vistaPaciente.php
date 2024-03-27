<?php
require '../model/conexion.php';
require '../controller/paciente/controllerPaciente.php';

$bdd = new BD();
session_start();
if(!isset($_SESSION['paciente'])) {
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
    <script src="../controller/JS/modals.js"></script>
</head>
<body>
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

<script src="../controller/JS/comunes.js"></script>
</body>
</html>