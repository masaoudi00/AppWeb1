<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

//use logger
Logger::configure('email.xml');
$logger = Logger::getLogger("default");


// Carga la configuración

$config = parse_ini_file('configuracion.ini');


$mail = new PHPMailer;

$mail->isSMTP();

// SMTPDebug = 0 -> desactivado (para uso en producción)

// SMTPDebug = 1 -> mensajes del cliente

// SMTPDebug = 2 -> mensajes del cliente y servidor

$mail->SMTPDebug = $config['SMTPDebug'];

$mail->Host = $config['host'];

$mail->Port = $config['port'];

$mail->SMTPAuth = $config['SMTPAuth'];

$mail->Username = $config['username'];

$mail->Password = $config['password'];

$mail->setFrom('biduncopyright@gmail.com', 'MODULO DAW');

$mail->addAddress($config['email'], $config['remitente']);

$mail->Subject = $config['asunto'];

$mail->Body = 'Este mensaje es un texto de prueba del cuerpo';

//$mail->addAttachment('test.txt');


if (!$mail->send()) {

//use Logger;

   $logger->error("Error en el envío:");

} else {

    $logger->info('El email ha sido enviado correctamente A '.$config['email']);


}


?>