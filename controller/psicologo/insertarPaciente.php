<?php
require '../../model/conexion.php';
require '../../model/paciente.php';
require '../../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$bdd = new BD();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_psicologo = $_POST['id_psicologo'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $dni = $_POST['dni'];

    // Generar contraseña aleatoria
    function generarContrasena($longitud = 10) {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
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
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'nieves.98.nvv@gmail.com';                //SMTP username
        $mail->Password   = 'rvhv bcsn oblj byyr';                      //SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;                               

        $mail->setFrom('nieves.98.nvv@gmail.com', 'PsyConnect');
        $mail->addAddress($email, $nombre.' '.$apellidos);     //Add a recipient
        $mail->isHTML(true);
        $mail->Subject = utf8_decode('Contraseña generada para su cuenta');
        $mail->Body    = 'Se ha generado una contraseña aleatoria para tu cuenta: ' . $pwd;

        if(!$mail->send()) {
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
