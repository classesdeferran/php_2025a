<?php

var_dump(openssl_get_cert_locations());

/*
// ENVIAMENT D'EMAIL AMB GMAIL I PHPMail

// Cargar las clases necesarias
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP de Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'cuenta_gmail_remitente';           // ✉️ Tu cuenta Gmail
    $mail->Password = 'clave';           // 🔐 Clave de aplicación, no tu contraseña normal
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Remitente y destinatario
    $mail->setFrom('cuenta_gmail_remitente', 'Remitente'); // Remitente
    $mail->addAddress('cuenta_gmail_destinatario', 'Destinatario'); // Añadir un destinatario

    // Contenido del mensaje
    $mail->isHTML(true);
    $mail->Subject = 'Prueba de envío con Gmail y PHPMailer';
    $mail->Body    = '¡Hola! Este correo fue enviado usando <strong>PHPMailer</strong> con Gmail.';
    $mail->AltBody = '¡Hola! Este correo fue enviado usando PHPMailer con Gmail.';

    $mail->send();
    echo 'Correo enviado correctamente.';
} catch (Exception $e) {
    echo "No se pudo enviar el correo. Error: {$mail->ErrorInfo}";
}
*/