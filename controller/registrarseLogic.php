<?php
require '../model/conexion.php';
require '../model/psicologo.php';
$bdd = new BD();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $cop_num = $_POST["cop_num"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $psicologo = new Psicologo("", $nombre, $apellidos, $cop_num, $email, $hashedPwd); // Utilizar la contraseña hasheada
    if(!$psicologo->buscar($bdd->link)){
        $psicologo->insertar($bdd->link);
        
        $sentencia = "SELECT * FROM psicologo WHERE email = :email";
        $consulta = $bdd->link->prepare($sentencia);
        $consulta->bindParam(':email', $email);
        $consulta->execute();
        $psicologoObj = $consulta->fetch(PDO::FETCH_OBJ);
        session_start();
            $psicologo = new Psicologo(
                $psicologoObj->id,
                $psicologoObj->nombre,
                $psicologoObj->apellidos,
                $psicologoObj->cop_num,
                $psicologoObj->email,
                $psicologoObj->pwd,
                $psicologoObj->rol
            );
            $_SESSION['psicologo'] = $psicologo;
            header("Location:../view/vistaPsicologo.php");
            exit();
    } else {
        header("Location: ../view/registrarse.php?error=1");
    }
}