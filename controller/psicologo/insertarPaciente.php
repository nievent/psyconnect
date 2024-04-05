<?php
require '../../model/conexion.php';
require '../../model/paciente.php';
require '../../vendor/mail.php';

$bdd = new BD();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_psicologo = $_POST['id_psicologo'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $dni = $_POST['dni'];

    // Generar contraseña aleatoria
    function generarContrasena($longitud = 10) {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ?!@#$%&';
        $contrasena = '';
        $maxCaracteres = strlen($caracteres) - 1;
        for ($i = 0; $i < $longitud; $i++) {
            $contrasena .= $caracteres[mt_rand(0, $maxCaracteres)];
        }
        return $contrasena;
    }
    $pwd = generarContrasena(); 

    // Hash de la contraseña
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $paciente = new Paciente("", $id_psicologo, $nombre, $apellidos, $dni, $email, $hashedPwd);
    if(!$paciente->buscar($bdd->link)){
        $paciente->insertar($bdd->link);
        $subject = 'Contraseña generada para su cuenta';

        $body    = '<p>Te damos la bienvenida a PsyConnect, ' . $nombre . '! Gracias por confiar en nosotros</p>
        <p>Se ha generado una contraseña aleatoria para tu cuenta: ' . $pwd . '</p>';
        if(!sendMail($email, $nombre, $apellidos, $subject, $body)) {
            echo 'El correo electrónico no pudo ser enviado.';
            echo 'Error: ' . $mail->ErrorInfo;
        } else {
            header('location: ../../view/vistaPsicologo.php');
            exit(); // Detener la ejecución del script después de la redirección
        }
    } else {
        header('location: ../../view/vistaPsicologo.php?error=2');
        exit(); // Detener la ejecución del script después de la redirección
    }
}
