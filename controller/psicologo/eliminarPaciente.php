<?php
require '../../model/conexion.php';
require '../../model/paciente.php';
$bdd = new BD();

if (isset($_GET['id']) && $_GET['id'] != null) {
    $paciente = new Paciente ($_GET['id'], "", "", "", "", "", "");
    if($paciente->buscarRegistro($bdd->link)==null) {
        header("Location: ../../view/vistaPsicologo.php?error=1");
    } else {
        $paciente->borrar($bdd->link);
        header("Location: ../../view/vistaPsicologo.php");
    }
}