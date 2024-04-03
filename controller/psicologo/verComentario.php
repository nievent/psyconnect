<?php
require '../../model/conexion.php';
require '../../model/comentario.php';
$bdd = new BD();

$comentario = new Comentario($_GET['id'], "", "", "");
$comentario->verRegistro($bdd->link);
header('location:  ../../view/vistaPsicologo.php');