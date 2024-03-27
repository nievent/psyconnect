<?php
require '../../model/conexion.php';
require '../../model/registro.php';
$bdd = new BD();
if(isset($_GET['id']) && $_GET['id']!=null) {
    $registro = new Registro($_GET['id'], $_GET["id_tipo_reg"], "", "");
    $resultado = $registro->buscarLinea($bdd->link);
    if($resultado == null || $resultado->rowCount() == 0) {
        $registro->borrarPacienteRegistro($bdd->link);
        $registro->borrar($bdd->link);
        header('Location: ../../view/vistaPsicologo.php');
    } else {
        header('Location: ../../view/vistaPsicologo.php?error=3');
    }
}