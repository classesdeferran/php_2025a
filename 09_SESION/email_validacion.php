<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
// require 'vendor/autoload.php';
require_once __DIR__ . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;      // 0 para no mostrar ningún mensaje               //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $_ENV['HOST'];  // Tu servidor SMTP                   //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $_ENV['USERNAME'];  // Tu cuenta de Gmail                   //SMTP username
    $mail->Password   = $_ENV['PASSWORD'];     // De tu cuenta de Gmail                          //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = $_ENV['PORT'];  // Necesario para GMail              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($_ENV['USERNAME'], 'APP COLORES');           // Remitente
    $mail->addAddress($email, $usuario);     // Receptor
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
    $mail->Subject = 'Validación de contraseña APP COLORES'; // Asunto del mensaje
    $mail->Body    = $body; // Cuerpo del mensaje
    $mail->AltBody = 'Necesitamos un navegador que pueda utilizar código HTML. ¿Puedes probas con otro? Gracias.'; // Cuerpo alternativo (sin HTML)

    $mail->send();
    echo 'Message has been sent'; // Cuando todo ha ido bien
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; // Cuando no ha ido bien
}