<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'autoload.php';

function sendMail($email, $nombre, $apellidos, $subject, $body)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'nieves.98.nvv@gmail.com';                //SMTP username
        $mail->Password   = 'rvhv bcsn oblj byyr';                      //SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('nieves.98.nvv@gmail.com', 'PsyConnect');
        $mail->addAddress($email, $nombre . ' ' . $apellidos);     //Add a recipient
        $mail->isHTML(true);
        $mail->Subject = utf8_decode($subject);
        $mail->Body    = utf8_decode($body);
        $mail->send();
        echo 'Message has been sent';
        return true;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}
