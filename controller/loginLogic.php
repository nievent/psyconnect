<?php
require '../model/conexion.php';
require '../model/psicologo.php';
require '../model/paciente.php';

$bdd = new BD();
session_start();

if (isset($_POST['submit'])) {
    if (isset($_POST['user']) && isset($_POST['password']) && $_POST['user'] != "" && $_POST['password'] != "") {
        $email = $_POST['user'];
        $password = $_POST['password'];

        // Buscar en la tabla de psicologos
        $sentencia = "SELECT * FROM psicologo WHERE email = :email";
        $consulta = $bdd->link->prepare($sentencia);
        $consulta->bindParam(':email', $email);
        $consulta->execute();
        $psicologoObj = $consulta->fetch(PDO::FETCH_OBJ);

        // Si el psicólogo existe y la contraseña coincide
        if ($psicologoObj && password_verify($password, $psicologoObj->pwd)) {
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
        }

        // Buscar en la tabla de pacientes
        $sentencia2 = "SELECT * FROM paciente WHERE email = :email";
        $consulta2 = $bdd->link->prepare($sentencia2);
        $consulta2->bindParam(':email', $email);
        $consulta2->execute();
        $pacienteObj = $consulta2->fetch(PDO::FETCH_OBJ);

        // Si el paciente existe y la contraseña coincide
        if ($pacienteObj && password_verify($password, $pacienteObj->pwd)) {
            $paciente = new Paciente(
                $pacienteObj->id,
                $pacienteObj->id_psicologo,
                $pacienteObj->nombre,
                $pacienteObj->apellidos,
                $pacienteObj->dni,
                $pacienteObj->email,
                $pacienteObj->pwd
            );
            $_SESSION['paciente'] = $paciente;
            header("Location:../view/vistaPaciente.php");
            exit();
        }
    }
}

// Si no se encontró un psicólogo ni un paciente con el correo y contraseña proporcionados
header("Location:../view/login.php?error=1");
exit();
?>
