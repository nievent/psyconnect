<?php
require '../../model/conexion.php';
require '../../model/comentario.php';

$bdd = new BD();

// Insertar el comentario en la BD
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_psicologo = $_POST['id_psicologo'];
    $id_paciente = $_POST['id_paciente'];
    // Escapar las comillas simples y dobles, y las etiquetas HTML
    $comentario = htmlspecialchars(addslashes($_POST['comentario']));
    $coment = new Comentario("", $id_psicologo, $id_paciente, $comentario);
    $coment->insertar($bdd->link);
    header('location:  ../../view/vistaPaciente.php');   
}
