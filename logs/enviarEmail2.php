<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';


$mail = new PHPMailer;

$mail->isSMTP();


// SMTPDebug = 0 -> desactivado (para uso en producción)

// SMTPDebug = 1 -> mensajes del cliente

// SMTPDebug = 2 -> mensajes del cliente y servidor

$mail->SMTPDebug = 0;

$mail->Host = 'smtp.gmail.com';

$mail->Port = 587;

$mail->SMTPAuth = true;

$mail->Username = 'biduncopyright@gmail.com';

$mail->Password = 'Lahsen2000';

$mail->setFrom('biduncopyright@gmail.com', 'Prueba correo2');

$mail->addAddress('biduncopyright@gmail.com', 'Prueba');

$mail->Subject = 'Mensaje de bienvenida';

$mail->msgHTML(file_get_contents('mensaje.html'), __DIR__);

$mail->Body = 'Este mensaje es un texto de prueba del cuerpo';

$mail->addAttachment('ff.jpeg');


if (!$mail->send()) {

   echo 'Error en el envío: ' . $mail->ErrorInfo;

} else {

   echo 'El email ha sido enviado correctamente.';

}


?>