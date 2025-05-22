<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;      // 0 para no mostrar ningún mensaje               //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';  // Tu servidor SMTP                   //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'tu_cuenta_de_gmail@gmail.com';  // Tu cuenta de Gmail                   //SMTP username
    $mail->Password   = 'contraseña_de_aplicacion';     // De tu cuenta de Gmail                          //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;  // Necesario para GMail              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('remitente', 'nombre_del_remitente');           // Remitente
    $mail->addAddress('receptor', 'nombre_del_receptor');     // Receptor
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Prueba de envío con PHP, PHPMailer y GMail'; // Asunto del mensaje
    $mail->Body    = '<h1>Hola Jo</h1> <p>Què tal? Correu de prova amb PHPMailer.</p> This is the HTML message body <b>in bold!</b>'; // Cuerpo del mensaje
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; // Cuerpo alternativo (sin HTML)

    $mail->send();
    echo 'Message has been sent'; // Cuando todo ha ido bien
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; // Cuando no ha ido bien
}