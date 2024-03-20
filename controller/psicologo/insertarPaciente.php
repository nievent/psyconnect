<?php
require '../../model/conexion.php';
require '../../model/paciente.php';
$bdd = new BD();
echo "hola";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_psicologo = $_POST['id_psicologo'] ;
    $nombre = $_POST['nombre'] ;
    $apellidos = $_POST['apellidos'] ;
    $email = $_POST['email'] ;
    $pwd = $_POST['pwd'];
    $dni = $_POST['dni'] ;

    $paciente = new Paciente("", $id_psicologo, $nombre, $apellidos, $dni, $email, $pwd);
    if(!$paciente->buscar($bdd->link)){
        echo "insertar";
        $paciente->insertar($bdd->link);
        echo "insertar2";
        header('location:  ../../view/vistaPsicologo.php');
    } else {
        echo "error";
        header('location:  ../../view/vistaPsicologo.php?error=2');
    }
}