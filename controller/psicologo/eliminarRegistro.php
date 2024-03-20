<?php
require '../../model/conexion.php';
require '../../model/registro.php';
$bdd = new BD();
if(isset($_GET['id']) && $_GET['id']!=null) {
    $registro = new Registro($_GET['id'], "", "", "");
    $registro->borrarPacienteRegistro($bdd->link);
    $registro->borrar($bdd->link);
    header('Location: ../../view/vistaPsicologo.php');
}