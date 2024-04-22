<?php
require '../../model/psicologo.php';
require '../../model/conexion.php';
$bdd = new BD();
session_start(); // Iniciar o reanudar la sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];

    if (isset($_POST['oldPassword']) && $_POST['oldPassword'] != '') {
        // Comprobar si la contraseña antigua coincide con la contraseña almacenada en la base de datos
        $oldPassword = $_POST['oldPassword'];
        $psicologoAntiguo = Psicologo::buscarPorId($bdd->link, $id);

        if (password_verify($oldPassword, $psicologoAntiguo->getPwd())) {
            // Si la contraseña antigua coincide, crear un nuevo objeto Psicologo con la nueva contraseña y el resto de datos
            $newPassword = $_POST['newPassword'];
            $psicologo = new Psicologo($id, $nombre, $apellidos, "", $email, password_hash($newPassword, PASSWORD_DEFAULT), 0);
            // Después de editar el psicólogo en la base de datos
            $psicologo->editarConPwd($bdd->link);

            // Destruir la sesión vieja
            session_unset();
            session_destroy();
            // Iniciar una nueva sesión
            session_start();
            // Asignar el psicólogo actualizado a $_SESSION['psicologo']
            $_SESSION['psicologo'] = $psicologo;
            // Redirigir a la página de vista del psicólogo
            header("Location:../../view/vistaPsicologo.php");
            exit();
        } else {
            // Si la contraseña antigua no coincide, redirigir de vuelta a la página de edición con un mensaje de error
            header("Location:../../view/vistaPsicologo.php?error=4");
            exit();
        }
    } else {
        $psicologo = new Psicologo($id, $nombre, $apellidos, "", $email, "", 0);
        // Después de editar el psicólogo en la base de datos
        $psicologo->editar($bdd->link);

        // Recargar los datos del psicólogo desde la base de datos
        $psicologoActualizado = Psicologo::buscarPorId($bdd->link, $psicologo->getId());

        // Destruir la sesión vieja
        session_unset();
        session_destroy();
        // Iniciar una nueva sesión
        session_start();

        // Asignar el psicólogo actualizado a $_SESSION['psicologo']
        $_SESSION['psicologo'] = $psicologoActualizado;

        // Redirigir a la página de vista del psicólogo
        header("Location:../../view/vistaPsicologo.php");
        exit(); 
    }
}
