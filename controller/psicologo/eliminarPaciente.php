<?php
require '../../model/conexion.php';
require '../../model/paciente.php';
$bdd = new BD();
//funcion para borrar de la bd
if (isset($_GET['id']) && $_GET['id'] != null) {
    $paciente = new Paciente ($_GET['id'], "", "", "", "", "", "");
    if(!$paciente->buscarRegistro($bdd->link)) {
        $paciente->borrar($bdd->link);
        header("Location: ../../view/vistaPsicologo.php");
    } else {
        header("Location: ../../view/vistaPsicologo.php?error=1");
    }
}