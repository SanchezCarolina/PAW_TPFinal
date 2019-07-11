<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
$email = isset($_POST['email']) ? $_POST['email'] : false;
$mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : false;

$sms = "Nombre: ". $nombre;
$sms.= "<br>Apellido: ". $apellido;
$sms.= "<br>Email: ".$email;
$sms.= "<br>Mensaje: <br>".$mensaje;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


try {
    //Server settings
    $mail = new \PHPMailer\PHPMailer\PHPMailer();
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'libreriadracarys@gmail.com';           // SMTP username
    $mail->Password   = 'Dracarys_19';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 25;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('libreriadracarys@gmail.com', $nombre);
    $mail->addAddress('caro17sanchez@gmail.com');     // Add a recipient
    
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Formulario de contacto Libreria Dracarys';
    $mail->Body    = $sms;
    $mail->CharSet = 'UTF-8';
    
    $mail->send();
    $_SESSION['correoEnviado'] = 'complete';
    require_once 'views/usuario/contacto.php';
} catch (Exception $e) {
    $_SESSION['correoEnviado'] = 'failed';
}

