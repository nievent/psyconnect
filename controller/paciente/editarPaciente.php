<?php
require '../../model/paciente.php';
require '../../model/conexion.php';
$bdd = new BD();
session_start(); // Iniciar o reanudar la sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $dni = $_POST['dni'];


    if (isset($_POST['oldPassword']) && $_POST['oldPassword'] != '') {
        // Comprobar si la contraseña antigua coincide con la contraseña almacenada en la base de datos
        $oldPassword = $_POST['oldPassword'];
        $pacienteAntiguo = Paciente::buscarPorId($bdd->link, $id);

        if ($pacienteAntiguo && password_verify($oldPassword, $pacienteAntiguo->getPwd())) {
            echo "si pwd";
            $newPassword = $_POST['newPassword'];
            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $paciente = new Paciente($id, "", $nombre, $apellidos, $dni, $email, $hashedNewPassword);
            // Después de editar el paciente en la base de datos
            $paciente->editarConPwd($bdd->link);
            echo "edita";

            // Destruir la sesión vieja
            session_unset();
            session_destroy();
            // Iniciar una nueva sesión
            session_start();
            $_SESSION['paciente'] = $paciente;
            // Redirigir a la página de vista del paciente
            header("Location:../../view/vistapaciente.php");
            exit();
        } else {
            // Si la contraseña antigua no coincide, redirigir de vuelta a la página de edición con un mensaje de error
            header("Location:../../view/vistapaciente.php?error=2");
            exit();
        }
    } else {
        $paciente = new Paciente($id, "", $nombre, $apellidos, $dni, $email, "");
        // Después de editar el paciente en la base de datos
        $paciente->editar($bdd->link);

        // Recargar los datos del paciente desde la base de datos
        $pacienteActualizado = Paciente::buscarPorId($bdd->link, $paciente->getId());

        // Destruir la sesión vieja
        session_unset();
        session_destroy();
        // Iniciar una nueva sesión
        session_start();

        // Asignar el paciente actualizado a $_SESSION['paciente']
        $_SESSION['paciente'] = $pacienteActualizado;

        // Redirigir a la página de vista del paciente
        header("Location:../../view/vistapaciente.php");
        exit(); 
    }
}
?>
