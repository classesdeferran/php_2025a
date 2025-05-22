<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
/*
$mail = new PHPMailer(true);

try {
    // Configuración SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp-relay.brevo.com';  // O smtp.mailjet.com
    $mail->SMTPAuth   = true;
    $mail->Username   = 'ferran.docencia@gmail.com';        // Ej: [email protected]
    $mail->Password   = 'mV8fDA6hz9MgFHQZ';                 // API Key SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Remitente y destinatario
    $mail->setFrom('ferran.docencia@gmail.com', 'Jo mateix');
    $mail->addAddress('ferran.docencia@gmail.com', 'Súper Ferran'); // Añadir un destinatario

    // Contenido del mensaje
    $mail->isHTML(true);
    $mail->Subject = 'Prueba desde PHPMailer';
    $mail->Body    = 'Este es un <b>correo de prueba</b> usando PHPMailer y SMTP per Brevo.';

    $mail->send();
    echo 'Correo enviado correctamente.';
} catch (Exception $e) {
    echo "Error al enviar correo: {$mail->ErrorInfo}";
}
*/

$mail = new PHPMailer(true);

try {
    // Configuración SMTP para Brevo
    $mail->isSMTP();
    $mail->Host       = 'smtp-relay.sendinblue.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'ferran.docencia@gmail.com';       // Tu correo de Brevo (el remitente)
    $mail->Password   = 'mV8fDA6hz9MgFHQZ';     // La API Key SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Remitente y destinatario
    $mail->setFrom('ferran.docencia@gmail.com', 'JO MATEIX'); // Remitente
    $mail->addAddress('ferran.docencia@gmail.com', 'Ferran'); // Puedes poner otro correo tuyo de prueba

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Correo de prueba con Brevo';
    $mail->Body    = '¡Hola! Este es un <b>correo de prueba</b> enviado desde PHPMailer usando Brevo.';

    // Enviar
    $mail->send();
    echo '✅ Correo enviado correctamente.';
} catch (Exception $e) {
    echo "❌ Error al enviar el correo: {$mail->ErrorInfo}";
}