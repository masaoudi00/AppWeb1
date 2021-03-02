<?php

/**

* Mandar un correo vía SMTP con autentificación

*/



require '../composer/vendor/autoload.php';

//use logger
Logger::configure('email.xml');
$logger = Logger::getLogger("default");

//Importar la clase PHPMailer deltro del namespace global

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\SMTP;


//SMTP necesita horas precisas, y se DEBE configurar la zona horaria de PHP

// Esto debe hacerse en su php.ini, pero así es como se hace si no tiene acceso a eso

date_default_timezone_set('Etc/UTC');


//Crear nueva instancia de PHPMailer

require '../composer/vendor/phpmailer/phpmailer/src/Exception.php';

require '../composer/vendor/phpmailer/phpmailer/src/PHPMailer.php';

require '../composer/vendor/phpmailer/phpmailer/src/SMTP.php';

$mail = new PHPMailer();

//Decirmos a PHPMailer que use SMTP

$mail->isSMTP();

//Se habilita el debbug de SMTP

// SMTP::DEBUG_OFF = desactivado (para uso en producción)

// SMTP::DEBUG_CLIENT = mensajes del cliente

// SMTP::DEBUG_SERVER = mensajes del cliente y servidor

$mail->SMTPDebug = SMTP::DEBUG_OFF;

//Indicamos el  hostname del servidor de email

$mail->Host = 'smtp.gmail.com';

//Indicamos el puerto SMTP  - puede ser 25, 465 o  587

$mail->Port = 25;

//Indicamos si usamos autentificación SMTP

$mail->SMTPAuth = true;

//Nombre de usaurio para la autentificación SMTP

$mail->Username = 'biduncopyright@gmail.com';

//Password para la autentificación SMTP

$mail->Password = 'Lahsen2000';

//La dirección y nombre del emisor

$mail->setFrom('biduncopyright@gmail.com', 'Enviando Emails 2021');

//La dirección y nombre del receptor
$receptor='biduncopyright@gmail.com';
$mail->addAddress($receptor, 'Pichu-Basa');

//Asunto

$mail->Subject = 'Información del registro';

$mail->Body = "Esto es un mensaje con el email1"; // Mensaje a enviar


//Adjuntar una imagen

//$mail->addAttachment('images/una_imagen.png');


//ENVIAR EL EMAIL, compronbando si hay errores.

if (!$mail->send()) {

   $logger->info('Error en el envío: Correo ');

} else {

   $logger->warn('El email ha sido enviado correctamente A '.$receptor);

}